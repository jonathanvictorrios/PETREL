<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comentario;
use App\Models\Usuario;

class ComentarioController extends Controller
{
    // Crea un nuevo comentario
    
    public function store(Request $request)
    {
        $comentarioNuevo = new Comentario;
        $comentarioNuevo->descripcion = $request->mensaje;
        $comentarioNuevo->id_usuario = $request->usuario;
        $comentarioNuevo->id_solicitud = $request->idSolicitud;
    }

    // Retorna una arreglo con la información del mensaje

    public function show($id)
    {
        $Comentarios = Comentario::findOrFail($id);
        return (compact('Comentarios'));
    }

    // Permite al usuario editar el mensaje

/*    public function update(Request $request, $id)
    {
        $Comentarios = Comentario::findOrFail($id);
        $Comentarios        
    }*/
}
