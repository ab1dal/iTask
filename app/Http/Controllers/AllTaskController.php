<?php

namespace App\Http\Controllers;

use App\Models\Task;

class AllTaskController extends Controller
{
    public function __invoke()
    {
        $tasks = Task::all()->where('user_id', auth()->user()->id);

        return view('all-task', [
            'tasks' => $tasks,
        ]);
    }
}
