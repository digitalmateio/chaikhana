<?php

namespace App\Http\Controllers;

use App\User;
use Validator;
use App\Role;
use Eloquent;
use App\Models\Employee;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
       // dd('kiii');
        // $this->middleware('guest');
    }

    public function showRegistrationForm()
    {   
				return view('auth.user.register');	
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    { 
        return Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        // TODO: This is Not Standard. Need to find alternative
        Eloquent::unguard();
        // dd($data);
        
        // $employee = Employee::create([
        //     'name' => $data['name'],
        //     'designation' => "Super Admin",
        //     'email' => $data['email'],
        //     'gender' => 'Male',
        //     'dept' => "1",
        // ]);
        
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'context_id' => 0,
            'type' => "",
        ]);
        // $role = Role::where('name', 'SUPER_ADMIN')->first();
        // $user->attachRole($role);
    
        return $user;
    }

      protected function registered($request, $user)
    {
        return redirect()->route('userLogin')->with('success', 'your are succesfuly registred');   
    }
}
