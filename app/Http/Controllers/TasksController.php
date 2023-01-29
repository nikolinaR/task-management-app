<?php

namespace App\Http\Controllers;

use App\Enums\TaskStatusEnum;
use App\Models\Project;
use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Enum;
use Symfony\Component\Console\Input\Input;

class TasksController extends Controller
{
    public function index(Task $task)
    {
        $tasks = Task::with('users')->get();
        $taskenum = TaskStatusEnum::cases();
        // $user = User::all()->first();
        $user = Auth::user();
        return view('tasks.index')->with(['tasks' => $tasks, 'taskenum' => $taskenum, 'user' => $user, 'task' => $task]);
    }

    public function create()
    {
        $this->authorize('create', Task::class);
        $tasks = Task::with('users')->get();
        $taskenum = TaskStatusEnum::cases();
        $project = Project::all();
        $users = User::with('getTask')->get();
        $data = ['tasks' => $tasks, 'taskenum' => $taskenum, 'project' => $project, 'users' => $users];
        return view('tasks.create')->with($data);
    }

    public function store(Request $request)
    {
        $this->authorize('create', Task::class);
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'description' => 'required|min:10',
            'start_date' => 'required',
            'due_date' => 'required|after:start_date',
            'status' => 'required',
            'project_id' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect('/tasks/create')->withErrors($validator)->withInput();
        }

        $tasks = new Task();
        $tasks->title = $request->title;
        $tasks->description = $request->description;
        $tasks->start_date = $request->start_date;
        $tasks->due_date = $request->due_date;
        $tasks->status = $request->status;
        $tasks->project_id = $request->project_id;
        $tasks->user_id = $request->user_id;

        //dd($request->all());

        $tasks->save();

//        $tasks->users()->attach($request->task_id);

        return redirect()->back()->with('success');
    }

    public function edit(Task $task)
    {
        $this->authorize('update', $task);
        $users = User::all();
        $projects = Project::all();
        $taskenum = TaskStatusEnum::cases();
        $data = ['users' => $users, 'projects' => $projects, 'taskenum' => $taskenum];
        return view('tasks.edit', compact('task'))->with($data);
    }

    public function update(Request $request,Task $task)
    {
        $this->authorize('update', $task);
    //  $task = Task::FindOrFail($id);
        $task->fill($request->all())->save();
//        $task->users()->sync($request->task_id);
        return redirect()->back();
    }

    public function updateStatus(Request $request , $id)
    {
        $data = Task::find($id);
        $data->status = $request->status;
        $data->save();
        return redirect()->back();
    }


    public function destroy(Task $task)
    {
        $this->authorize('delete', $task);
        $task->delete();
        return redirect()->back();
    }

}
