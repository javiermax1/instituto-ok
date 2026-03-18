<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class crudController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(string $resource)
    {
        return "<h1>Gestionar $resource</h1>";
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(string $resource, Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $resource, string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(string $resource, Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $resource, string $id)
    {
        //
    }
}
