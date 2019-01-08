<?php

namespace App\Http\Controllers;
use App\Project;
use App\Category;
use App\User;
use \Auth;
use Illuminate\Http\Request;

use App\Http\Requests\ProjectCreateRequest;

class AdminProjectsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    $projects = Project::all();
    

    return view('admin.projects.allprojects', compact('projects'));
    // foreach($projects as $p){
    //     return $p->images[0]['path'];
    // }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.projects.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProjectCreateRequest $request)
    {
        
        $input = $request->all();

        $user = Auth::user();

        $user->projects = Project::create(
            $input
        );

        if($cats = $request->categories){
            foreach($cats as $catname){
                $category = Category::where('name', $catname)->first();
                $user->projects->categories()->attach($category);
            }
        }

 

    	if($request->file('images')){

        foreach($request->file('images') as $image){
           $filename = time() . '_' . $image->getClientOriginalName();
           $path = 'user_uploads/projects';
           $user->projects->images()->create(['path'=> $path . '/' . kebab_case($filename)]);
           $image->move($path, kebab_case($filename) );
        }

        }
    
        session()->flash('success','Project Created Successfully');
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
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $project = Project::findOrFail($id);
        $project['allcats'] = Category::all();

        return view('admin.projects.edit', compact('project'));
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
