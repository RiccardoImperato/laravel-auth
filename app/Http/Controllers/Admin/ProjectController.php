<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = Project::all();
        return view('admin.projects.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.projects.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Project $project)
    {
        $data = $this->validation($request->all());
        $project->fill($data);
        $project->slug = Str::slug($data['title']);
        $project->save();
        return redirect()->route('admin.projects.index', $project->id);
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        return view('admin.projects.show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        return view('admin.projects.edit', compact('project'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Project $project)
    {
        $data = $this->validation($request->all());
        $project->update($data);
        $project->slug = Str::slug($data['title']);
        $project->save();
        return redirect()->route('admin.projects.show', $project->id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        $project->delete();

        return redirect()->route('admin.projects.index');
    }

    public function validation($data)
    {
        $validator = Validator::make(
            $data,
            [
                'title' => 'required|max:50',
                'description' => 'nullable|max:500'
            ],
            [
                'title.required' => 'Titolo richiesto: inserisci un titolo per proseguire',
            ]
        )->validate();

        return $validator;
    }
}
