<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProgramaDrive extends Model
{
    use HasFactory;
    protected $table='programa_drive';
    protected $primaryKey='id_programa';
    protected $fillable=array('id_carpeta_carrera','nombre_programa','numero_programa','url_programa');
    protected $hidden = ['created_at', 'updated_at'];

    public function carpeta_carrera()
    {
        return $this->belongsTo(CarpetaCarrera::class,'id_carpeta_carrera','id_carpeta_carrera');
    }
}
