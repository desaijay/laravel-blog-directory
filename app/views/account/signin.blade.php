@extends('layout.main')
@section('title', 'Login')
@section('content')
<div class="container">
      <form class="form-signin" method="post" action="{{URL::route('account-post-login')}}">
        <h2 class="form-signin-heading">Please sign in</h2>
        <label for="inputEmail" class="sr-only">Email address</label>
        <input type="email" id="email" name="email"{{ (Input::old('email')) ? 'value="'. Input::old('email').'"':''}} class="form-control" placeholder="Email address" autofocus>
        @if($errors->has('email'))
        {{$errors->first('email')}}
        @endif
        <label for="password" class="sr-only">Password</label>
        <input type="password" id="password" name="password" class="form-control" placeholder="Password">
        @if($errors->has('password'))
          {{$errors->first('password')}}
          @endif
        <div class="checkbox">
          <label>
            <input type="checkbox" value="rememberme" name="rememberme" id="rememberme"> Remember me
          </label>
        </div>
        <input class="btn btn-lg btn-primary btn-block" type="submit" name="submit" value="Sign in"/>
        {{ Form::token() }}
      </form>

    </div> <!-- /container -->
@stop