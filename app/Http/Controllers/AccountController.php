<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;


class AccountController extends Controller
{
    public function create(){
        return view("Pages.register");
    }

    public function messages(){
        return [
            'user-name.unique' => 'Username already exist',
            'email.required' => 'Your email is required',
        ];
    }

    public function store (Request $request){
        $this->validate($request, [
            'username' => 'required|min:4|unique:users,username',
            'email' => 'required|min:14|unique:users,email',
            'countries' => 'required',
            'address' => 'required',
            'city' => 'required',
            'password' => 'required|min:5',
            'con-password' => 'required'
        ]);

        $user = new User();

        if($request['password'] === $request['con-password']){
            $user->username = request('username');
            $user->email = request('email');
            $user->password =  md5(request('password'));
            $user->country = request('countries');
            $user->city = request('city');
            $user->address = request('address');
            $user->save();

            return redirect('/account/login');
        }else{
            return back()->with('password' , "Password does not match");
        }
    }

    public function show(){
        return view("Pages.login");
    }

    public function login(Request $request){
        $this->validate($request, [
            'email' => 'required|min:14',
            'password' => 'required|min:5',
        ]);

        $user = DB::table('users')
                ->where('email','=',$request['email'])
                ->where('password','=', md5($request['password']))
                ->first();
        
        if($user){
            session(['user-name' => $user->username]);
            session(['user-email' => $user->email]);
            session(['user-country' => $user->country]);
            session(['user-city' => $user->city]);
            session(['user-address' => $user->address]);
            
            session()->put('user_logged', true);
            return redirect('/star');
        }else{
            return back()->with('error', "Invalid Email and Password"); 
        }
    }

    public function logout(){
        session()->remove('user-name');
        session()->remove('user-email');
        session()->remove('user-country');
        session()->remove('user-city');
        session()->remove('user-address');
        return redirect('/star');
    }
}
