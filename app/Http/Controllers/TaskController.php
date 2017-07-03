<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index(Request $request)
    {
        $tasks = \App\Task::orderBy('created_at', 'asc')->get();
        return view('index', [
            'tasks' => $tasks,
        ]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'task' => 'required|max:255',
        ]);

        $task = new \App\Task();
        $task->fill($request->all())->save();

        return redirect('/tasks');
    }
}
