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

class TasksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tasks = Task::all();
        return view('admin.tasks.index')->with(['tasks' => $tasks]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tasks = Task::with('users')->get();
        $taskenum = TaskStatusEnum::cases();
        $project = Project::all();
        $users = User::with('getTask')->get();
        $data = ['tasks' => $tasks, 'taskenum' => $taskenum, 'project' => $project, 'users' => $users];
        return view('admin.tasks.create')->with($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string
     */
    public function store(Request $request)
    {
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

        $tasks->users()->attach($request->task_id);

        return redirect()->back()->with('success');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit($id)
    {
        $task = Task::with('users')->get();
        $tasks = Task::FindOrFail($id);
        $users = User::all();
        $projects = Project::all();
        $taskenum = TaskStatusEnum::cases();
        $data = ['users' => $users, 'tasks' => $tasks, 'projects' => $projects, 'taskenum' => $taskenum];
        return view('admin.tasks.edit', compact('task'))->with($data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $task = Task::FindOrFail($id);
        $task->fill($request->all())->save();
        $task->users()->sync($request->task_id);
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $task = Task::FindOrFail($id);
        $task->delete();
        return redirect()->back();
    }
}
