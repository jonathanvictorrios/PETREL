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
    protected $fillable = array('id_solicitud', 'id_estado_descripcion', 'id_usuario','created_at', 'updated_at');

   // protected $hidden = ['created_at', 'updated_at'];

    public function solicitudCertProg()
    {
<<<<<<< HEAD
        return $this->belongsTo(SolicitudCertProg::class,'id_solicitud');
=======
        return $this->belongsTo(SolicitudCertProg::class, 'id_solicitud', 'id_solicitud');
>>>>>>> 0e93fd442ac3c2eba9a5755f6f1b8f7cb951e251
    }

    public function estado_descripcion()
    {
<<<<<<< HEAD
        return $this->hasOne(EstadoDescripcion::class,'id_estado_descripcion');
=======
        return $this->hasOne(EstadoDescripcion::class, 'id_estado_descripcion', 'id_estado_descripcion');
>>>>>>> 0e93fd442ac3c2eba9a5755f6f1b8f7cb951e251
    }

    public function usuario()
    {
<<<<<<< HEAD
        return $this->hasOne(Usuario::class,'id_usuario');
=======
        return $this->hasOne(Usuario::class, 'id_usuario', 'id_usuario');
>>>>>>> 0e93fd442ac3c2eba9a5755f6f1b8f7cb951e251
    }
}