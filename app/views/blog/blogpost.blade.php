@extends('layout.main')
@section('title', 'All Blog')
@section('content')

<div class="container">
<div class "col-md-4">
@if(Auth::check())
<a href="{{URL::route('add-blog')}}" class="glyphicon glyphicon-pencil" style="font-size:50px" title="Write a Blog"></a>
@endif
</div>
<div class="col-md-12">
@foreach($posts as $post)

<h1> {{$post->id}}| Title: {{ $post->title }} </h1>
    <h3>Content:</h3><p>{{ $post->content }}</p>
<span class="badge">Posted on {{$post->created_at}}</span><div class="pull-right"><span class="label label-default">alice</span> <span class="label label-primary">story</span> <span class="label label-success">blog</span> <span class="label label-info">personal</span> <span class="label label-warning">Warning</span>
	</div>
<div><br />
<span class="badge">This article is Posted By {{ $post->users->username }}</span>

     </div><br />
     <div id="comments"><h4>Comments:</h4>
     @foreach($post->comments as $comment)
     <h3>{{$comment->name}} Says....</h3>
     {{$comment->comments}}
	@endforeach
	</div>
    <form class="form-horizontal" method="post" action="{{URL::route('post-comments')}}">
     <div class="form-group">
    <label for="name" class="control-label">Name</label>
      <input type="name" id="name" name="name" placeholder="Name..">
      @if($errors->has('name'))
      {{$errors->first('name')}}
      @endif
      </div>
     <div class="form-group">
    <label for="name" class="control-label">Comment:</label>
      <textarea id="comments" name="comments" placeholder="Comments.."></textarea>
       @if($errors->has('comments'))
      {{$errors->first('comments')}}
      @endif
    </div>
    {{ Form::hidden('post_id', $post->id) }}

    <input type="submit" name="submit" id="submit" value="Submit Your Comment" class="btn btn-default">
        {{Form::token()}}
    </form>
@endforeach
{{$posts->links()}}
         
    <hr>
</div>
</div>
@stop