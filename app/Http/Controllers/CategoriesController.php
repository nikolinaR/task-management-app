<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categories;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class CategoriesController extends Controller
{

    public $allTree = [];
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $categories = Categories::getTree();
        $data = ["categories" => $categories];
        return view('admin.categories.index')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        $categories = Categories::getTree();
        $data = ["categories" => $categories];
        return view('admin.categories.create')->with($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $slug = Str::slug($request->get('name'), '_');
        $name = $request->name;
        $data = ["name" => $name, "slug" => $slug];
        $parent_id = $request->parent_id;

        if($parent_id)
        {
            $parent_id = $request->parent_id;

            $category = Categories::FindOrFail($parent_id);
            $newCategory = Categories::create($data, $category);
            Session::flash('flash_message', 'Category successfully created!');
            return redirect()->back();
        }
        $category =  Categories::create($data);

        Session::flash('flash_message', 'Category successfully created!');
        return redirect()->back();

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
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $category = Categories::FindOrFail($id);
        $categories = Categories::getTree();
        $data = ["category" => $category, "categories" => $categories];
        return view('admin.categories.edit')->with($data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $category = Categories::FindOrFail($id);
        $name = $request->name;
        $data = ["name" => $name];

        if($request->has('parent_id') && $request->parent_id != null)
        {
            $parent_id = $request->parent_id;
            $parentCategory = Categories::FindOrFail($parent_id);
            $category->fill($request->all())->save();

            return redirect()->back();
        }
        $input = $request->all();
        $input['parent_id'] = null;
        $category->fill($input)->save();
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $category = Categories::FindOrFail($id);
        $category->delete();
        return redirect()->route('categories.index');
    }
}
