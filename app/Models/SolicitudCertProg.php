<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SolicitudCertProg extends Model
{
    use HasFactory;

    protected $table = 'solicitud_cert_prog';
    protected $primaryKey = 'id_solicitud';
    protected $fillable = array('id_usuario_estudiante', 'id_user_u', 'legajo');

    protected $hidden = ['created_at', 'updated_at'];

    public function hojaResumen()
    {
        return $this->hasOne(HojaResumen::class);
    }

    public function estados()
    {
        return $this->hasMany(Estado::class);
    }

    public function usuarioEstudiante()
    {
        return $this->belongsTo(Usuario::class);
    }
    public function usuarioAdministrativo()
    {
        return $this->belongsTo(Usuario::class);
    }


    public function comentario()
    {
        return $this->hasMany(Comentario::class);
    }
}