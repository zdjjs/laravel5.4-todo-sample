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

    public function destroy(Request $request, \App\Task $task){
        $task->delete();
        return redirect('/tasks');
    }

    public function edit(\App\Task $task)
    {
        return view('edit', ['task' => $task]);
    }

    public function update(Request $request, \App\Task  $task)
    {
        $this->validate($request, [
            'task' => 'required|max:255',
        ]);

        $task->fill($request->all())->save();
        return redirect('/tasks');
    }
}
