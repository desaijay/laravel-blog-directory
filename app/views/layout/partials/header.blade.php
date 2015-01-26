<!DOCTYPE html>
<html>
	<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="@yield('description')">
    <meta name="author" content="jay desai, BeingJayDesai, Programmer, Hacker, Coding, Decoding,PHP,Software Engineer">
    <meta name="keyword" content="Web Developer, Designer, Magento, Php, Laravel, Coding, Web Development, Development Freelancer, Freelancing">
    <title>@yield('title')</title>
	{{HTML::style('css/bootstrap.min.css')}}
	{{HTML::style('css/signin.css')}}
	{{HTML::style('css/signup.css')}}
	<nav class="navbar navbar-default navbar-static-top navbar-inverse">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="{{URL::route('home')}}">9dzine app</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="#">Home</a></li>
            <li><a href="#about">About</a></li>
            <li><a href="{{URL::route('contact-me')}}">Contact</a></li>
            @if(Auth::check())
            <li class="dropdown">
            <a href="" class="dropdown-toggle" data-toggle="dropdown" role="button" >Blog <span class="caret"></span></a>
            <ul class="dropdown-menu" role="menu">
            <li><a href="{{URL::route('getblog')}}">All Blogs</a></li>
            <li><a href="{{URL::route('manage-your-blogs')}}">Manage your blogs</a></li>
            </ul>
            </ul>
            <ul class="nav navbar-nav navbar-right">
             <li><a href="{{URL::route('logout')}}">Sign Out</a></li>
            </ul>
          
          @else
          <ul class="nav navbar-nav navbar-right">
            <li class="active"><a href="{{URL::route('account-register')}}">Register<span class="sr-only">(current)</span></a></li>
            <li><a href="{{URL::route('account-login')}}">Login</a></li>
            <li><a href="#">Forgot Password</a></li>
          </ul>
          @endif
        </div>
      </div>
    </nav>
	</head>