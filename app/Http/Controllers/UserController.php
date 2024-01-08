<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Symfony\Component\CssSelector\Node\FunctionNode;

class UserController extends Controller
{

    public function create()
    {
        return view('users.register');
    }

    //create new users
    public function store(Request $request){

        $formFields = $request->validate([
            'name' => ['required', 'min:3'],
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'password' => 'required|confirmed|min:6'

        ]);
        //hash the password
        $formFields['password'] = bcrypt($formFields['password']);
        //create user
        $user = User::create($formFields);


        auth()->login($user);
        return redirect('/')->with('message', 'User created and logged in successfully!');
    }

    public function logout(Request $request){
        auth()->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/')->with('message','logged out  successfully!');
    }
    public Function login(){
        return view('users.login');
    }
    public function authenticate(Request $request){
        $formFields = $request->validate([
             'email' => ['required', 'email'],
            'password' => 'required'

        ]);
        if(auth()->attempt($formFields)){
            $request->session()->regenerate();
            return redirect('/')->with('message','You are now Logged in');
        }
        return back()->withErrors(['email'=>'Invalid Credentials'])->onlyInput('email');
    }
}
