<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProgramaLocal extends Model
{
    use HasFactory;
    protected $table='programa_local';
    protected $primaryKey='id_programa_local';
    protected $fillable=array('url_programas');
    protected $hidden = ['created_at', 'updated_at'];

    public function hoja_resumen()
    {
        return $this->hasOne(HojaResumen::class,'id_programa_local','id_programa_local');
    }
}


