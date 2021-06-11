<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class usuario extends Model
{
    use HasFactory;

    protected $table = 'usuario';
    protected $primaryKey = 'id_usuario';
    protected $fillable = array('nombre', 'apellido', 'legajo', 'email');

    protected $hidden = ['created_at', 'updated_at'];

    public function solicitudes_cert_prog()
    {
        return $this->hasMany(solicitud_cert_prog::class);
    }

    public function comentarios()
    {
        return $this->hasMany(comentario::class);
    }

    public function roles()
    {
        return $this->belongsToMany(rol::class);
    }
}