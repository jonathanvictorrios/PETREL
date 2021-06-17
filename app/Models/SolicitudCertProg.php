<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SolicitudCertProg extends Model
{
    use HasFactory;

    protected $table = 'solicitud_cert_prog';
    protected $primaryKey = 'id_solicitud';
    protected $fillable = array('id_usuario_estudiante', 'id_user_u','id_carrera', 'legajo', 'universidad_destino');

    protected $hidden = ['created_at', 'updated_at'];

    public function hojaResumen()
    {
        return $this->hasOne(HojaResumen::class, 'id_solicitud', 'id_solicitud');
    }

    public function estados()
    {
<<<<<<< HEAD
        return $this->hasMany(Estado::class,'id_estado');
    }
    public function ultimoEstado()
    {
        return $this->hasOne(Estado::class,'id_estado')->latest();
    }
    public function carrera()
    {
        return $this->hasOne(Carrera::class,'id_carrera','id_carrera');
=======
        return $this->hasMany(Estado::class, 'id_solicitud', 'id_solicitud');
>>>>>>> 0e93fd442ac3c2eba9a5755f6f1b8f7cb951e251
    }

    public function usuarioEstudiante()
    {
<<<<<<< HEAD
        return $this->belongsTo(Usuario::class,'id_usuario_estudiante');
=======
        return $this->belongsTo(Usuario::class, 'id_usuario_estudiante', 'id_usuario');
>>>>>>> 0e93fd442ac3c2eba9a5755f6f1b8f7cb951e251
    }

    public function usuarioAdministrativo()
    {
<<<<<<< HEAD
        return $this->belongsTo(Usuario::class,'id_user_a');
=======
        return $this->belongsTo(Usuario::class, 'id_user_u', 'id_usuario');
>>>>>>> 0e93fd442ac3c2eba9a5755f6f1b8f7cb951e251
    }

    public function comentarios()
    {
        return $this->hasMany(Comentario::class, 'id_solicitud', 'id_solicitud');
    }
}