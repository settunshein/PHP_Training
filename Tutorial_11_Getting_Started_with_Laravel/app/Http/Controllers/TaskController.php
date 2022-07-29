<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function __invoke()
    {
        return redirect()->action('TaskController@index');
    }



    public function index()
    {
        $tasks = Task::orderBy('created_at', 'DESC')->get();
        $completed_tasks = Task::complete();
        return view('task.index', compact('tasks', 'completed_tasks'));
    }



    public function store()
    {
        Task::create($this->validateTaskRequest());
        return back()->with('success', 'New Task Created Successfully');
    }



    public function update(Task $task)
    {
        $task->update($this->validateTaskRequest());
        return back()->with('success', 'Task Updated Successfully');
    }


    
    public function destroy(Task $task)
    {
        $task->delete();
        return back()->with('success', 'Task Deleted Successfully');
    }

    
    
    public function updateTaskStatus($task_id)
    {
        $task = Task::find($task_id);
        if( $task->status == 0){
            $task->update([
                'status' => 1,
            ]);
        }else{
            $task->update([
                'status' => 0,
            ]);
        }
        return back();
    }



    private function validateTaskRequest()
    {
        return request()->validate([
            'title' => 'required',
        ]);
    }
}
