<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\Project;
use App\Models\Task;
use App\Models\User;
use Spatie\Activitylog\Models\Activity;

class HomeController extends Controller
{
    public function index()
    {
        $projects = Project::all();
        $users = User::all();
        $tasks = Task::all();
        $categories = Categories::all();
        $activities =Activity::all();

        $data = ['projects' => $projects, 'users' => $users, 'tasks' => $tasks, 'categories' => $categories, 'activities' => $activities];
        return view('dashboard', compact('tasks', 'activities'))->with($data);
    }
}

