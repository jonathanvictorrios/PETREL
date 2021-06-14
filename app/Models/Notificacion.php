<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Estado;

class Notificacion extends Model
{
    use HasFactory;

    protected $table='notificaciones';
    protected $primaryKey = 'idNotificacion';
    protected $fillable = array('idEstado', 'mensaje', 'leida', 'descripcion');
    protected $hidden = ['created_at','updated_at'];

    public function solicitudEstado()
    {
        return $this->belongsTo(Estado::class);
    }
}
