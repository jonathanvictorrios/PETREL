<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class comentario extends Model
{
    use HasFactory;

    protected $table = 'comentario';
    protected $primaryKey = 'id_comentario';
    protected $fillable = array('descripcion', 'id_solicitud', 'id_usuario');

    protected $hidden = ['created_at', 'updated_at'];

    public function solicitud_cert_prog()
    {
        return $this->belongsTo(solicitud_cert_prog::class);
    }

    public function usuario()
    {
        return $this->belongsTo(usuario::class);
    }
}