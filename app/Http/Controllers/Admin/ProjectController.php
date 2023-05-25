<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use App\Models\Project;
use App\Models\Technology;
use App\Models\Type;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects = Project::all();
        return view('admin.project.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $types = Type::all();
        $technologies = Technology::all();
        return view('admin.project.create', compact('types', 'technologies'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreProjectRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProjectRequest $request)
    {

        $newProject = new Project();
        $newProject->fill($request->validated());
        if(isset($request['cover-upload'])){
            $newProject->cover = Storage::put('uploads', $request['cover-upload']);
        }
        $newProject->private = isset($request['private']);
        $newProject->slug = Str::slug($newProject->title);
        $newProject->save();
        $newProject->technologies()->sync($request['technologies']);
        return to_route('admin.projects.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        
        return view('admin.project.show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        $types = Type::all();
        $technologies = Technology::all();

        return view('admin.project.edit', compact('project', 'types', 'technologies'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProjectRequest  $request
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProjectRequest $request, Project $project)
    {
        $data = $request->validated();

        if(!isset($request['cover-upload']) AND Str::startsWith($project->cover, 'uploads')){
            Storage::delete($project->cover);
        }

        if(isset($request['cover-upload'])){
            if(Str::startsWith($project->cover, 'uploads')){
                Storage::delete($project->cover);
            }
            $data['cover'] = Storage::put('uploads', $request['cover-upload']);
        }

        $project->technologies()->sync($request['technologies'] ?: []);

        $project->update($data);
        $project->private = isset($request['private']);
        $project->slug = Str::slug($project->title);
        $project->save();

        return view('admin.project.show', compact('project'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        if(Str::startsWith($project->cover, 'uploads')){
            Storage::delete($project->cover);
        }
        $project->delete();

        return to_route('admin.projects.index');
    }
}
