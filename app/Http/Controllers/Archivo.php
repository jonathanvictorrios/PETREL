<?php

namespace App\Http\Controllers;

use App\Models\usuario;
use Illuminate\Http\Request;

class Archivo extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $archivos = usuario::all();
        return view('archivos.index', compact('archivos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('archivos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $archivo = $request->all();
        $archivo['nombre'] = 'Prueba';
        $archivo['apellido'] = 'Prueba';
        $archivo['legajo'] = 'Prueba';

        if ($request->hasFile('archivo')) {
            $archivo['email'] = $request->file('archivo')->store('archivos', 'public');
        }

        usuario::create($archivo);
        return redirect()->route('archivos.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $archivo = usuario::where('id_usuario', $id)->firstOrFail();
        $pathFile = storage_path('app/public/' . $archivo->email);
        $headers = ['Content-Type: application/pdf'];
        return response()->file($pathFile, $headers);
    }

    public function download($id)
    {
        $archivo = usuario::where('id_usuario', $id)->firstOrFail();
        $pathFile = storage_path('app/public/' . $archivo->email);
        return response()->download($pathFile);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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