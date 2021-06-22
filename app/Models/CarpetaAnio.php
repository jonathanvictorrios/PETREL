<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CarpetaAnio extends Model
{
    use HasFactory;
    protected $table='carpeta_anio';
    protected $primaryKey='id_carpeta_anio';
    protected $fillable=array('numero_anio','url_anio');
    protected $hidden = ['created_at', 'updated_at'];

    public function carpeta_carrera(){
        return $this->hasMany(CarpetaCarrera::class , 'id_carpeta_anio' , 'id_carpeta_anio');
    }
    
}
