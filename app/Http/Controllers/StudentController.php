<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreStudentRequest;
use App\Http\Requests\UpdateStudentRequest;
use App\Models\Student;


class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $campos = Student::getLabels();
        $students = Student::Paginate(6);
        //$students = Student::all();
        /*$campos=[
            "name"=>"Nombre",
            "age"=>"Edad",
            "email"=>"Email",
            "dni"=>"DNI",
        ];*/
        //return view('projects.index', compact('projects', 'campos'));
        return view('students.index', ['students' => $students, 'campos'=>$campos]);
        // mostrar: display and die
        //dd($projects);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('students.create');
        /*$student = new Student(); // objeto vacío
        return view('students.create', compact('student'));
        */
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreStudentRequest $request)
    {
        $datos = $request->input();
        Student::create($datos);
        $page = Student::paginate(6)->lastPage();
        return redirect()->route('students.index',['page'=>$page]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Student $student)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Student $student)
    {
        $page = request()->get('page', 1);

        return view('students.edit', ['student' => $student]);
        //return view('students.edit', compact('student', 'page'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateStudentRequest $request, Student $student)
    {
        $page= request()->get('page', 1);
        $datos = $request->input();
        $student->update($datos);
        return redirect()->route('students.index',['page'=>$page]);
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $student)
    {
        $student->delete();
        $page = request()->get('page');
        $lastPage = Student::paginate(6)->lastPage();
        if ($page > $lastPage) {
            $page --;
        }
        //dd($student);
        return redirect()->route('students.index',['page'=>$page]);
        return redirect()->back();
        //dd($page);
    }
}
