<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LogoutController extends Controller
{
    
    public function logout(Request $request){

        auth()->logout(); // Logs out the currently authenticated user
        
        $request->session()->invalidate(); // Invalidates the session
        
        $request->session()->regenerateToken();

        return redirect('/de-authorized');

    }

    public function showLogin(){

        return redirect()->route('login.show')->with('success', "You successfully signed-out..come back soon 🤝");

    }

}
