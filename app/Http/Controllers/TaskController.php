<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    

    public function index(){

        $userCheck = auth()->user();

        $get_tasks = Task::where('user_id', $userCheck->id)->latest()->get();
        return view('dashboard.tasks.index', compact('get_tasks'));

    }


    public function loadTaskForm(){

        $userId = auth()->user()->id;

        
        return view('dashboard.tasks.create');

    }

    public function create(Request $request){

        $checkUser = auth()->user()->id;

        $formData = $request->validate([

            'title' => ['required', 'string', 'max:32'],
            'details' => ['required', 'string', 'max:128'],
            'due_date' => 'required',
            'priority' => 'required',

        ]);

        $formData['title'] = strip_tags($formData['title']);
        $formData['description'] = strip_tags($formData['details']);
        $formData['due_date'] = strip_tags($formData['due_date']);
        $formData['priority'] = strip_tags($formData['priority']);
        $formData['user_id'] = $checkUser;
        
        $saveData = Task::create($formData);

        if($saveData){

            return redirect()->route('tasks.index')->with('success', 'The task has been activated successfully');

        }else{

            return back()->with('error', 'Something went wrong, please try again');
            
        }

    }

    public function show(Task $task){

        $isLogged = auth()->user();

        if($isLogged->id != $task->user_id){

            return redirect()->route('tasks.index');

        }else{
            
            return  view('dashboard.tasks.show', ['task' => $task]);

        }

    }

    public function loadEditForm(Task $task){

        $isLogged = auth()->user();

        if($isLogged->id != $task->user_id){

            return redirect()->route('tasks.index');

        }else{
            
            return  view('dashboard.tasks.edit', ['task' => $task]);

        }

    }


    public function update(Task $task, Request $request){

        $isLogged = auth()->user();

        if($isLogged->id != $task->user_id){

            return redirect()->route('tasks.index');

        }else{
            
            $formData = $request->validate([

                'status' => 'required',
    
            ]);
    
            $formData['status'] = strip_tags($formData['status']);

            $saveData = $task->update($formData);
            if($saveData){

                
                return redirect()->route('tasks.index')->with('success', "Task has been checked-out successfully");

            }else{

                return redirect()>back()->with('error', "Something went wrong, please try again later");

            }

        }

    }

    public function delete(Request $request, Task $task){

        $isLogged = auth()->user();

        if($isLogged->id != $task->user_id){

            return redirect()->route('tasks.index');

        }else{

            $proOut = $task->delete();

            if($proOut){

                return redirect()->route('tasks.index')->with('success', 'Task has been deleted successfully');


            }else{

                return redirect()->back()->with('error', 'Something went wrong, please try again later');

            }
        }

    }


}
