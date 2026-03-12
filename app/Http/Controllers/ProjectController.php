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
    public function index(int $page = 1)
    {
        $campos = Project::getLabels();
        $projects = Project::Paginate(6);
        //$projects = Project::all();

        //return view('projects.index', compact('projects','campos));
        return view('projects.index', ['projects' => $projects,'campos'=>$campos]);
        //mostrar: display and die
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
        $datos = $request->input();
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
        $page = request()->get("page", 1);
        //return view('projects.edit', ['project' => $project]);
        return view('projects.edit', compact('project', 'page'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProjectRequest $request, Project $project)
    {
        $page = request()->get("page",1);
        $datos = $request->input();
        $project->update($datos);
        return redirect()->route('projects.index',['page' => $page]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        $page = request()->get("page", 1);
        $lastpage = Project::paginate()->lastPage();
        if ($page > $lastpage) {
            $page--;
        }
        //dd($project);
        $project->delete();
        return redirect()->route('projects.index',['page' => $page]);
        return redirect()->back();
    }
}
