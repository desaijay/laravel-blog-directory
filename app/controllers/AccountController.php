<?php

class AccountController extends BaseController
{
	public function getHomePage()
	{
		return View::make('layout.main');
	}
	public function getSignin()
	{
		return View::make('account.signin');
	}

	public function getSignup()
	{
		return View::make('account.signup');
	}

	public function getContact()
	{
		return View::make('account.contact');
	}

	public function postRegister()
	{
		Input::merge(array_map('trim', Input::all()));

		$validator = Validator::make(Input::all(), array('username'=>'sometimes|required|min:3|max:20|alpha_num|unique:users',
	 'email'=>'sometimes|required|unique:users', 
	 'password'=>'required|alpha_num',
	 'confirmpassword'=>'required|same:password'));

		

		if($validator->fails())
		{
			return Redirect::route('account-register')->withErrors($validator)->withInput();
		}

		else
		{

			$username = e(Input::get('username'));
			$email = e(Input::get('email'));
			$password = Input::get('password');
			
			$code = str_random(60);

			$user = User::create(array(
				'username' => $username,
				'email' => $email,
				'password'=> Hash::make($password),
				'code' => $code,
				'active' =>0
				));

			if($user)
				{
			Mail::send('emails.auth.signup',
			 array('link'=>URL::route('account-activate', $code),
			  'username'=>$username),
			   function($message) use ($user)
			    {
	 			$message->to($user->email, $user->username)->subject('Activate Your account');
	 	 });	
				}
			return Redirect::route('home')->with('global','Your account has been created, We have send you and email');

		}
	}

	public function getActivate($code)
	{
		$user = User::whereCode($code)->whereActive(0);

		if($user->count()){
			$user = $user->first();

		//update user to active state

			$user->active= 1;
			$user->code = '';

			if($user->save())
			{
				return Redirect::route('home')
								->withGlobal('Activate!You can now sign now');

			}

		}

		return Redirect::route('home')
						->withGlobal('Sorry, We could not activate your account,Please retry again later');
	}


	
	public function postLogin()
	{
		$validator = Validator::make(Input::all(), 
			array(
				'email'=>'required|email',
				'password' =>'required'
				)
			);

		if($validator->fails())
		{
			return Redirect::route('account-login')
							->withErrors($validator)
							->withInput();
		}
		else
		{
			$remember =(Input::has('remember')) ? true : false;
			//attempts sign in by user
			$auth = Auth::attempt(
				array(
				'email' => Input::get('email'),
				'password'=>Input::get('password'),
				'active' =>1,

				), $remember);
			if($auth)
			{
				//redirect to the intended url 
				return Redirect::intended('home')
								->withGlobal('You are logged in');
			}

		}
		
		return Redirect::route('account-login')
						->withGlobal('There was a problem signing you');
	}


	public function postcontact()
	{
		$validator = Validator::make(Input::all(), array('name'=>'required|max:20',
			'email'=>'required|email',
			'message'=>'required'));
		if($validator->fails())
		{
			return Redirect::route('contact-me')->withErrors($validator)->withInput();
		}
		else
		{
			$name = Input::get('name');
			$email = Input::get('email');
			$message = Input::get('message');

			$user =Contact::create(array(
				'name' => $name,
				'email'=> $email,
				'message'=> $message
				));
			if($user->save())
			{
				return Redirect::route('contact-me')->withGlobal('Thank you for contacting us');
			}

		}

		return Redirect::route('contact-me')->withGlobal('Failed');
	}


	public function logout()
	{
			Auth::logout();
			return Redirect::route('account-login');
	}
	









}