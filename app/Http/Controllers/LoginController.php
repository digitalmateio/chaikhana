<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    use AuthenticatesUsers;

	public function __construct()
	{ 
	 	// $this->middleware('guest')->except('logout');
	}

	protected function validateLogin( $request)
	{
		
		$this->validate($request, [
			// $this->username() => 'required|string',
			// 'password' => 'required|string', 
		]);
	}

	protected function authenticated($request, $user)
    {
        //
        return redirect()->route('account');
        // dd('you ar now authorized');
    }

	protected function credentials( $request)
	{

		// return $request->only('trip_unic_id');
		return $request->only($this->username(), 'password');
	}

	public function username()
    {
        return 'email';
    }


	public function showLoginForm()
	{ 
		return view('auth.user.login');
	}

	public function guard()
	{
		return Auth::guard('web');
	}


}
