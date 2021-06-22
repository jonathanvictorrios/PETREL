<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RendimientoAcademico extends Model
{
    use HasFactory;
    protected $table='rendimiento_academico';
    protected $primaryKey='id_rendimiento_academico';
    protected $fillable=array('url_rendimiento_academico');
    protected $hidden = ['created_at', 'updated_at'];

    public function hoja_resumen()
    {
        return $this->hasOne(HojaResumen::class,'id_rendimiento_academico','id_rendimiento_academico');
    }
}
