<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class hoja_resumen extends Model
{
    use HasFactory;

    protected $table = 'hoja_resumen';
    protected $primaryKey = 'id_hoja_resumen';
    protected $fillable = array(
        'url_pdf_rendimiento_acad',
        'url_pdf_plan_estudio',
        'url_pdf_programas',
        'url_pdf_nota_dpto_alum',
        'firma_dig_dpto_alum',
        'firma_dig_sec_acad_ua',
        'id_solicitud',
        'id_historico',
        'id_plan_estudio',
        'id_nota_dpto',
        'id_nota_central'
    );

    protected $hidden = ['created_at', 'updated_at'];
}