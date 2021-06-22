<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NotaDptoAlum extends Model
{
    use HasFactory;

    protected $table = 'nota_dpto_alum';
    protected $primaryKey = 'id_nota_dto_alumno';
    protected $fillable = array('url_nota_dpto_alum');

    protected $hidden = ['created_at', 'updated_at'];

    public function hoja_resumen()
    {
        return $this->hasOne(HojaResumen::class,'id_nota_dto_alumno','id_nota_dto_alumno');
    }
}