<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlanEstudio extends Model
{
    use HasFactory;

    protected $table = 'plan_estudio';
    protected $primaryKey = 'id_plan_estudio';
    protected $fillable = array('url_pdf_plan_estudio');
    protected $hidden = ['created_at', 'updated_at'];

    public function hoja_resumen()
    {
        return $this->belongsToMany(HojaResumen::class, 'hoja_resumen_plan_estudio', 'id_plan', 'id_hoja');
    }
}