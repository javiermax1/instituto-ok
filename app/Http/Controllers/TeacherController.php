<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTeacherRequest;
use App\Http\Requests\UpdateTeacherRequest;
use App\Models\Student;
use App\Models\Teacher;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $teachers = Teacher::Paginate(6);
        //$teachers = Teacher::simplePaginate();
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
        $page = Teacher::paginate(6)->lastPage();
        return redirect()->route('teachers.index', ['page'=>$page]);

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
        $page = request()->get('page');
        return view('teachers.edit', ['teacher' => $teacher]);
        //return view('teachers.edit', compact('teacher', 'page'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTeacherRequest $request, Teacher $teacher)
    {
        $page= request()->get('page', 1);
        $datos = $request->input();
        $teacher->update($datos);
        return redirect()->route('teachers.index', ['page'=>$page]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Teacher $teacher)
    {
        $teacher->delete();
        //return redirect()->route('teachers.index', ['page' => $page]);
        $page = request()->get('page');
        $lastpage = teacher::paginate(6)->lastPage();
        if ($page > $lastpage) {
            $page --;
        }
        //dd($teacher);
        return redirect()->route('teachers.index', ['page'=>$page]);
        return redirect()->back();
        //dd($page);
    }
}
