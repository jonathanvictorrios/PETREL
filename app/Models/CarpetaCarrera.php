<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CarpetaCarrera extends Model
{
    use HasFactory;
    protected $table = 'carpeta_carrera';
    protected $primaryKey = 'id_carpeta_carrera';
    protected $fillable=array('id_carrera','id_carpeta_anio','url_carrera');
    protected $hidden = ['created_at', 'updated_at'];

    public function programa_drive(){
        return $this->hasMany(ProgramaDrive::class , 'id_carpeta_carrera' , 'id_carpeta_carrera');
    }
    public function carpeta_anio(){
        return $this->belongsTo(CarpetaAnio::class , 'id_carpeta_anio' , 'id_carpeta_anio');
    }
    public function carrera(){
        return $this->belongsTo(Carrera::class , 'id_carrera' , 'id_carrera');
    }
}
