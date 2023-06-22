<?php

namespace App\Http\Controllers\Auth;

use App\Models\Task;
use App\Models\Project;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LoginController extends Controller
{
    
    public function loadLoginForm(){

        return view('login');
        
    }

    public function login(Request $request){

        $formData = $request->validate([

            'email' => ['required', 'max:72'],
            'password' => 'required'

        ]);

        $formData['email'] = strip_tags($formData['email']);
        $formData['password'] = $formData['password'];

        $goLogin = auth()->attempt($formData);

        if($goLogin){

            

            return redirect()->route('dashboard.index');

        }else{

            return back()->with('error', 'Incorrect login credentials, try again later');

        }

    }

    public function toDashboard(){

        $userCheck = auth()->user();
        $isStatus = "Pending";
        $isComp = "Completed";

        $get_completed_tasks = Task::where(['user_id' => $userCheck->id, 'status' => $isComp])->count();
        $get_tasks = Task::where(['user_id' => $userCheck->id])->count();
        $get_pending_tasks = Task::where(['user_id' => $userCheck->id, 'status' => $isStatus])->count();

        return view('dashboard.index', compact('get_completed_tasks', 'get_tasks', 'get_pending_tasks'));

    }

    

}
