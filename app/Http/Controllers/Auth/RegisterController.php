<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;

class RegisterController extends Controller
{


    protected $redirectTo = '/';
    public function __construct(){

        $this->middleware('guest');

    }


    public function loadRegisterForm(){

        return view('register');

    }

    public function register(Request $request){

        $formData = $request->validate([

            'name' => ['required', 'string', 'min:7', 'max:72'],
            'email' => ['required', 'min:5', 'string', 'max:72', Rule::unique('users', 'email')],
            'password' => ['required', 'min:8', 'max:25', 'confirmed'],
            'password_confirmation' => 'required'

        ]);

        $formData['name'] = strip_tags(strtolower($formData['name']));
        $formData['email'] = strip_tags($formData['email']);
        $formData['password'] = bcrypt($formData['password']);

        $goSave = User::create($formData);

        if($goSave){
            
            return redirect('login')->with('success', 'Account creation was successful');

        }

        return back()->with('error', 'Something went wrong, try again later');

    }
}
