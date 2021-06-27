<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\solicitud_cert_prog;
use App\Models\EstadoDescripcion;
use App\Models\usuario;

class Estado extends Model
{
    use HasFactory;

    protected $table = 'estado';
    protected $primaryKey = 'id_estado';
    protected $fillable = array('id_solicitud', 'id_estado_descripcion', 'id_usuario', 'created_at', 'updated_at');

    // protected $hidden = ['created_at', 'updated_at'];

    public function solicitudCertProg()
    {
        return $this->belongsTo(SolicitudCertProg::class, 'id_solicitud', 'id_solicitud');
    }

    public function estado_descripcion()
    {
        return $this->hasOne(EstadoDescripcion::class, 'id_estado_descripcion', 'id_estado_descripcion');
    }

    public function usuario()
    {
        return $this->hasOne(Usuario::class, 'id_usuario', 'id_usuario');
    }
}