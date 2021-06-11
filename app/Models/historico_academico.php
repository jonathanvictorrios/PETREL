<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class historico_academico extends Model
{
    use HasFactory;

    protected $table = 'historico_academico';
    protected $primaryKey = 'id_historico';
    protected $fillable = array('archivo', 'url_pdf_rendimiento_acad');

    protected $hidden = ['created_at', 'updated_at'];

    public function hoja_resumen()
    {
        return $this->hasOne(hoja_resumen::class);
    }
}