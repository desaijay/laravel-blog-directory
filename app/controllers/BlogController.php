<?php



class BlogController extends BaseController
{
	public function getBlog()
	{
		$posts = Post::with('users','comments')->orderby('updated_at','desc')->paginate(2);
		
		return View::make('blog.blogpost')->with('posts',$posts);
	}

	public function getaddblog()
	{
		return View::make('blog.addblog');
	}

	public function postBlog()
	{
		$validator = Validator::make(Input::all(), array(
			'title' => 'required|min:10|max:50',
			'content'=>'required|min:30|max:200'
			));

		if($validator->fails())
		{
			return Redirect::route('post-blog')->withErrors($validator)->withInput();
		}
		else
		{
			$post = new Post();
			$post->user_id = Auth::user()->id;
			$post->title = Input::get('title');
			$post->content = Input::get('content');
			$post->save();

			return Redirect::route('post-blog')->withGlobal('Blog successfully added');
		}
	}

	public function yourBlog()
	{
		$posts = Post::with('comments')->where('user_id','=', Auth::user()->id)->paginate(10);
		
		return View::make('blog.managepersonalblog')->with(array('posts'=> $posts));
	}

	public function commentdelete($id)
	{
		$deletecomment = Comment::find($id);
		if($deletecomment)
		{
			$deletecomment->delete();
			return Redirect::route('manage-your-blogs');
		}
		}

	public function postdelete($id)
	{
		$deletepost = Post::find($id);
		$deletepost->comments()->delete();
		$deletepost->delete();
		return Redirect::route('manage-your-blogs');

	}

	public function postcomments()
	{
		$validator = Validator::make(Input::all(), 
			array('name'=>'required',
				'comments'=>'required'));

		if($validator->fails())
		{
			return Redirect::route('getblog')->withErrors($validator)->withInput();
		} 
		else
		{
			$comments = new Comment();
		    $comments->user_id = Auth::user()->id;
		    $comments->post_id = Input::get("post_id");
			$comments->name=Input::get("name");
			$comments->comments= Input::get("comments");

			if($comments->save())
			{
				return Redirect::route('getblog')->withGlobal('Comments added to post successfully');
			}
		}
	}

}