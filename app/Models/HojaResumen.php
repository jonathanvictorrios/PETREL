<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HojaResumen extends Model
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

    public function solicitudCertProf()
    {
        return $this->belongsTo(SolicitudCertProf::class, 'id_solicitud', 'id_solicitud');
    }

    public function historicoAcademico()
    {
        return $this->belongsTo(HistoricoAcademico::class, 'id_historico', 'id_historico');
    }

    public function planEstudio()
    {
        return $this->belongsTo(PlanEstudio::class, 'id_plan_estudio', 'id_plan_estudio');
    }

    public function notaDptoAlum()
    {
        return $this->belongsTo(NotaDptoAlum::class, 'id_nota_dpto', 'id_nota_dpto');
    }

    public function programas()
    {
        return $this->hasMany(Programa::class, 'id_hoja_resumen', 'id_hoja_resumen');
    }
}