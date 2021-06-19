<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SolicitudCertProg extends Model
{
    use HasFactory;

    protected $table = 'solicitud_cert_prog';
    protected $primaryKey = 'id_solicitud';
    protected $fillable = array('id_usuario_estudiante', 'id_user_u', 'legajo', 'universidad_destino');

    protected $hidden = ['created_at', 'updated_at'];

    public function hojaResumen()
    {
        return $this->hasOne(HojaResumen::class, 'id_solicitud', 'id_solicitud');
    }

    public function estados()
    {
        return $this->hasMany(Estado::class, 'id_solicitud', 'id_solicitud');
    }

    public function usuarioEstudiante()
    {
        return $this->belongsTo(Usuario::class, 'id_usuario_estudiante', 'id_usuario');
    }

    public function usuarioAdministrativo()
    {
        return $this->belongsTo(Usuario::class, 'id_user_u', 'id_usuario');
    }

    public function comentarios()
    {
        return $this->hasMany(Comentario::class, 'id_solicitud', 'id_solicitud');
    }
}