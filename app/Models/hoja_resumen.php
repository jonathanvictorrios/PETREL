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
        'firma_dig_dpto_alum',
        'firma_dig_sec_acad_ua',
        'id_solicitud',
        'id_historico',
        'id_plan_estudio',
        'id_nota_dpto',
        'id_nota_central'
    );

    protected $hidden = ['created_at', 'updated_at'];

    public function solicitud_cert_prof()
    {
        return $this->belongsTo(solicitud_cert_prog::class);
    }

    public function historico_academico()
    {
        return $this->belongsTo(historico_academico::class);
    }

    public function plan_estudio()
    {
        return $this->belongsTo(plan_estudio::class);
    }

    public function nota_dpto_alum()
    {
        return $this->belongsTo(nota_dpto_alum::class);
    }

    public function programas()
    {
        return $this->hasMany(programa::class);
    }
}