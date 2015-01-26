@extends('layout.main')
@section('title', 'my personal blog')
@section('content')

<div class="container">
<div class "col-md-4">
@if(Auth::check())
<a href="{{URL::route('add-blog')}}" class="glyphicon glyphicon-pencil" style="font-size:50px" title="Write a Blog"></a>

</div>
<div class="col-md-12">
@foreach($posts as $p)
<h1>{{ $p->title }}</h1>
    <p>{{ $p->content }}</p>
<span class="badge">Posted {{$p->created_at}}</span><div class="pull-right"><span class="label label-default">alice</span> <span class="label label-primary">story</span> <span class="label label-success">blog</span> <span class="label label-info">personal</span> <span class="label label-warning">Warning</span>
<span class="badge"><a href="{{URL::route('post-delete', $p->id)}}">Delete Post</a></span>

	</div> 
	<div id="comments"><h4>Comments:</h4>    
	@foreach($p->comments as $comment)
		<h3>{{$comment->name}} Says...</h3>
		<h5>{{$comment->comments}}</h5>
		<span class="badge"><a href="{{URL::route('comment-delete', $comment->id)}}">Delete</a></span>
	@endforeach

	</div>
    @endforeach

         
    <hr>
</div>
</div>
@endif
@stop

























@stop