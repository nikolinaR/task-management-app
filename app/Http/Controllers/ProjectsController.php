<?php

namespace App\Http\Controllers;

use App\Enums\ProjectStatusEnum;
use App\Models\Categories;
use App\Models\Project;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Enum;
class ProjectsController extends Controller
{

    public function index(Project $project)
    {
        $projects = Project::orderBy('end_date', 'DESC')->paginate(5);
        $categories = Categories::all();
        $data = ['projects' => $projects, 'categories' => $categories, 'project' => $project];
        return view('admin.projects.index', compact('projects'))->with($data);
    }

    public function create()
    {
        $projects = Project::all();
        $users = User::all();
        $categories = Categories::all();
        $enums = ProjectStatusEnum::cases();
        $data = ['projects' => $projects, 'users' => $users, 'categories' => $categories, 'enums' => $enums];
        return view('admin.projects.create')->with($data);

    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'description' => 'required|min:10',
            'start_date' => 'required',
            'end_date' => 'required|after:start_date',
            'user_id' => 'required',
            'category_id' => 'required',
            'status' => ['required', new Enum(ProjectStatusEnum::class)]
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $project = new Project();
        $project->title = $request->title;
        $project->description = $request->description;
        $project->start_date = $request->start_date;
        $project->end_date = $request->end_date;
        $project->user_id = $request->user_id;
        $project->category_id = $request->category_id;
        $project->status = $request->status;
        $project->save();
        return redirect('/projects');
    }


    public function edit($id)
    {
        $project = Project::FindOrFail($id);
        $users = User::all();
        $categories = Categories::all();
        $enums = ProjectStatusEnum::cases();
        $data = ['project' => $project, 'users' => $users, 'categories' => $categories, 'enums' => $enums];
        return view('admin.projects.edit')->with($data);
    }

    public function update(Request $request, $id)
    {
        $project = Project::FindOrFail($id);
        $project->fill($request->all())->save();
        return redirect()->back()->withInput();
    }

    public function destroy($id)
    {
        $project = Project::FindOrFail($id);
        $project->delete();
        return redirect()->back();
    }
}
