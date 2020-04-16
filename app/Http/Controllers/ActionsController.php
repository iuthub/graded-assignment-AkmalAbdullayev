<?php

namespace App\Http\Controllers;

use App\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ActionsController extends Controller
{
    public function index()
    {
        return view("layouts.index");
    }

    public function store()
    {
        $task = new Task();

        $task->user_id = auth()->user()->id;
        $task->task_name = request("Task");

        $this->validateInput();

        $task->save();

        return redirect("/")->with("success", "created");
    }

    public function edit($id)
    {
        $task = Task::findOrFail($id);

        return view("layouts.edit", [
            'task' => $task
        ]);
    }

    public function update(Request $request, $id)
    {
        $this->validateInput();

        $task = Task::findOrFail($id);

        $task->user_id = auth()->user()->id;
        $task->task_name = $request->input("Task");

        $task->save();

        return redirect("/")->with("success", "updated");
    }

    public function destroy($id)
    {
        $task = Task::findOrFail($id);

        $task->delete();

        return redirect("/")->with("success", "Successfully deleted");
    }

    public function validateInput()
    {
        request()->validate([
            'Task' => 'required|min:2|max:255',
        ]);
    }
}
