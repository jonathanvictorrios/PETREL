<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class programa extends Model
{
    use HasFactory;

    protected $table = 'programa';
    protected $primaryKey = 'id_programa';
    protected $fillable = array(
        'nombre_materia',
        'numero_materia',
        'carrera',
        'anio',
        'url',
        'firma_dig_sec_acad_ua',
        'id_hoja_resumen'
    );

    protected $hidden = ['created_at', 'updated_at'];

    public function hoja_resumen()
    {
        return $this->belongsTo(hoja_resumen::class);
    }
}