<?php

namespace App\Http\Controllers;

use App\Estudiante;
use Illuminate\Http\Request;

class EstudianteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $list_estudiantes = Estudiante::all();
        return view('estudiantes.index', compact('list_estudiantes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('estudiantes.nuevo');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'name' => 'required|max: 100',
            'last_name' => 'required|max: 100'
        ]);
        $estudiante = new Estudiante();
        $estudiante->name = $request->input('name');
        $estudiante->last_name = $request->input('last_name');
        $estudiante->save();
        return redirect('/estudiantes'); 
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
        $est = Estudiante::find($id);
        #clave valor clave 'categoria' valor $categoria
        return view('estudiantes.edit', ['est' => $est]);
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
        $estudiante=Estudiante::where('id', $id)->first();
        $estudiante->name = $request->input('name');
        $estudiante->last_name = $request->input('last_name');
        $estudiante->save();

        return redirect('/estudiantes');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Estudiante::destroy($id);
        return redirect('/estudiantes');
    }
}
