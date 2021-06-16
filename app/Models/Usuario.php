<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    use HasFactory;

    protected $table = 'usuario';
    protected $primaryKey = 'id_usuario';
    protected $fillable = array('nombre', 'apellido', 'dni', 'email');

    protected $hidden = ['created_at', 'updated_at'];

    public function solicitudesCertProgEstudiante()
    {
        return $this->hasMany(SolicitudCertProg::class, 'id_usuario_estudiante', 'id_usuario');
    }
    public function solicitudesCertProgAdministrativo()
    {
        return $this->hasMany(SolicitudCertProg::class, 'id_user_u', 'id_usuario');
    }

    public function comentarios()
    {
        return $this->hasMany(Comentario::class, 'id_usuario', 'id_usuario');
    }

    public function roles()
    {
        return $this->belongsToMany(Rol::class, 'usuario_rol', 'id_usuario', 'id_rol');
    }

    public function estado()
    {
        return $this->belongsTo(Estado::class, 'id_usuario', 'id_usuario');
    }
}