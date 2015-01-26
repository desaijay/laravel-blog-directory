@extends('layout.main')
@section('title', 'Contact')
@section('description','Contact us for web development, Developer, PHP, programming')
@section('content')
<div class="container">
	<div class="row-fluid">
        <div class="span8">
        	<iframe width="100%" height="450" frameborder="0" style="border:0"
src="https://www.google.com/maps/embed/v1/place?q=9Dzine,+Santacruz,+Mumbai,+Maharashtra,+India&key=AIzaSyBV1RK6kv-r__ACM3Pz3y6k_aBorx0jNWI"></iframe>
    	</div>
        <div class="row">
        <div class="col-md-6 col-md-offset-3">
        <div class="well well-sm">
     <form class="form-horizontal" method="post" action="{{URL::route('post-contact-us')}}">
          <fieldset>
            <legend class="text-center">Contact us</legend>
    
            <!-- Name input-->
            <div class="form-group">
              <label class="col-md-3 control-label" for="name">Name</label>
              <div class="col-md-9">
                <input id="name" name="name"{{e(Input::old('name')) ? 'value="'.e(Input::old('name')).'"':''}} type="text" placeholder="Your name" class="form-control">
                @if($errors->has('name'))
                {{$errors->first('name')}}
                @endif
              </div>
            </div>
    
            <!-- Email input-->
            <div class="form-group">
              <label class="col-md-3 control-label" for="email">Your E-mail</label>
              <div class="col-md-9">
                <input id="email" name="email"{{e(Input::old('email')) ? 'value="'.e(Input::old('email')).'"':''}} type="text" placeholder="Your email" class="form-control">
               @if($errors->has('email'))
                {{$errors->first('email')}}
                @endif
              </div>
            </div>
    
            <!-- Message body -->
            <div class="form-group">
              <label class="col-md-3 control-label" for="message">Your message</label>
              <div class="col-md-9">
                <textarea class="form-control" id="message" name="message"{{(Input::old('message')) ? 'value="'.e(Input::old('message')).'"':''}} placeholder="Please enter your message here..." rows="5"></textarea>
               @if($errors->has('message'))
                {{$errors->first('message')}}
                @endif
              </div>
            </div>
    
            <!-- Form actions -->
            <div class="form-group">
              <div class="col-md-12 text-right">
                <input type="submit" value="Submit" name="Submit" class="btn btn-primary btn-lg" />
              </div>
            </div>
          </fieldset>
          {{Form::token()}}
          </form>
           </div>
      </div>
</div>
@stop