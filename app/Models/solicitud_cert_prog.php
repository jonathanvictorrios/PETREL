<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class solicitud_cert_prog extends Model
{
    use HasFactory;

    protected $table = 'solicitud_cert_prog';
    protected $primaryKey = 'id_solicitud';
    protected $fillable = array('id_usuario_estudiante', 'id_user_u');

    protected $hidden = ['created_at', 'updated_at'];

    public function hoja_resumen()
    {
        return $this->hasOne(hoja_resumen::class);
    }

    public function estados()
    {
        return $this->hasMany(estado::class);
    }

    public function usuario()
    {
        return $this->belongsTo(usuario::class);
    }

    public function comentario()
    {
        return $this->hasMany(comentario::class);
    }
}