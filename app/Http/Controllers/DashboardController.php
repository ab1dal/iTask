<?php

namespace App\Http\Controllers;

use App\Models\Task;

class DashboardController extends Controller
{
    public function __invoke()
    {
        $tasks = Task::where('User_id', auth()->user()->id)->whereDate('deadline', today())->get();

        return view('my-day', [
            'tasks' => $tasks,
        ]);
    }
}
