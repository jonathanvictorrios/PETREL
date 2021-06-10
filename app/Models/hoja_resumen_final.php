<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class hoja_resumen_final extends Model
{
    use HasFactory;

    protected $table = 'hoja_resumen_final';
    protected $primaryKey = 'id_hoja_resumen';
    protected $fillable = array('url_pdf_hija_unida_sinfirmar', 'url_pdf_hija_unida_final', 'id_hoja_resumen_final', 'id_firma');

    protected $hidden = ['created_at', 'updated_at'];
}