<?php

class AdminController extends BaseController
{
	public function postTables()
	{
			$posts = Post::all();

			return View::make('admin.posttable')->with('posts', $posts);
	}

	public function deletepost($id)
	{
		$deletepost = Post::find($id);
		$deletepost->comments()->delete();
		$deletepost->delete();
		return Redirect::route('admin-dashboard'); 

	}

	public function geteditpost($id)
	{
		$editpost = Post::findOrFail($id);

		if($editpost)
		{

			
			$validator = Validator::make(Input::all(), array(
				'title' =>'required',
				'content'=>'required'));

			if($validator->fails())
			{
				return Redirect::route('geteditpost')->withErrors($validator)->withInput();
			}
			else
			{
				$title =old(Input::get('title'));
				$content=old(Input::get('content'));

				$post = Post::update(array(
					'title'=>$title,
					'content'=>$content
					));

				if($post->save())
				{
					return Redirect::route('admin-dashboard')->withGlobal('post updated succeffully');
				}
			}

			return Redirect::route('admin-dashboard')->withGlobal('cant update the post');
	
	}
	}


	

	}
