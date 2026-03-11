<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTeacherRequest;
use App\Http\Requests\UpdateTeacherRequest;
use App\Models\Teacher;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $teachers = Teacher::all();
        // traducción:
        $campos = Teacher::getLabels();
        /*$campos=[
            "name"=>"Nombre",
            "Department"=>"Departamento",
            "email"=>"Email",
            "phone"=>"Teléfono",
        ];*/
        //return view('projects.index', compact('projects', 'campos'));
        return view('teachers.index', ['teachers' => $teachers, 'campos'=>$campos]);
        // mostrar: display and die
        //dd($projects);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('teachers.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTeacherRequest $request)
    {
        $datos = $request->input();
        Teacher::create($datos);
        return redirect()->route('teachers.index');
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Teacher $teacher)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Teacher $teacher)
    {
        return view('teachers.edit', ['teacher' => $teacher]);
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTeacherRequest $request, Teacher $teacher)
    {
        $datos = $request->input();
        $teacher->update($datos);
        return redirect()->route('teachers.index');

        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Teacher $teacher)
    {
        $teacher->delete();
        return redirect()->route('teachers.index');
        //
    }
}
