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
    protected $primaryKey = 'idEstado';
    protected $fillable = array('descripcion', 'idSolicitud', 'idEstadoDescripcion', 'idUsuario');

    protected $hidden = ['created_at', 'updated_at'];

    public function solicitudCertProg()
    {
        return $this->belongsTo(SolicitudCertProg::class);
    }

    public function estado_descripcion()
    {
        return $this->hasOne(EstadoDescripcion::class);
    }

    public function usuario()
    {
        return $this->hasOne(Usuario::class);
    }
}