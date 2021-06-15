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
        return $this->hasOne(HojaResumen::class);
    }

    public function estados()
    {
        return $this->hasMany(Estado::class,'id_estado');
    }
    public function ultimoEstado()
    {
        return $this->hasOne(Estado::class,'id_estado')->latest();
    }
    public function carrera()
    {
        return $this->hasOne(Carrera::class,'id_carrera');
    }

    public function usuarioEstudiante()
    {
        return $this->belongsTo(Usuario::class,'id_usuario_estudiante');
    }
    public function usuarioAdministrativo()
    {
        return $this->belongsTo(Usuario::class,'id_user_a');
    }


    public function comentario()
    {
        return $this->hasMany(Comentario::class);
    }
}