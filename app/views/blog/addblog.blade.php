@extends('layout.main')
@section('title', 'Add a Blog')
@section('content')
<div class="container">
<form class="form-signin" method="post" action="{{URL::route('post-blog')}}">
<h2 class="form-signin-heading">Add your Blog here</h2>
<label for="title" class="sr-only">Title</label>
<input type="text" name="title" id="title" class="form-control" placeholder="Title" autofocus>
@if($errors->has('title'))
{{$errors->first('title')}}
@endif
<label for="content" class="sr-only">Content</label>
<textarea class="form-control" type="text" name="content" id="content" class="form-control" placeholder="Your Content..."></textarea>
@if($errors->has('content'))
{{$errors->first('content')}}
@endif
<input class="btn btn-lg btn-primary btn-block" type="submit" name="submit" value="Post Blog"/>
        {{ Form::token() }}
      </form>
</div>
@stop

























@stop