<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use App\Models\Project;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = Project::all();
        $campos=[
            "name"=>"Título",
            "description"=>"Descripcion",
            "hours"=>"Horas",
            "start_date"=>"Fecha de inicio",
        ];
        //return view('projects.index', compact('projects','campos));
        return view('projects.index', ['projects' => $projects,'campos'=>$campos]);
        // mostrar: display and die
        //dd($projects);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('projects.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProjectRequest $request)
    {
//        $datos['name'] = $_POST['name'];
//        $datos['description'] = $_POST['description'];
//        $datos['hours'] = $_POST['status'];
        $datos = $request->input('project');
        Project::create($datos);
        return redirect()->route('projects.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProjectRequest $request, Project $project)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        //dd($project);
        $project->delete();
        return redirect()->route('projects.index');
    }
}
