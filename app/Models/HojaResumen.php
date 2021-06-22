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
        'id_rendimiento_academico',
        'id_programa_local',
        'id_plan_estudio',
        'id_nota_dto_alumno',
        'url_hoja_unida',
        'id_solicitud'
    );

    protected $hidden = ['created_at', 'updated_at'];

    public function solicitud_cert_prog()
    {
        return $this->belongsTo(SolicitudCertProg::class, 'id_solicitud', 'id_solicitud');
    }

    public function rendimiento_academico()
    {
        return $this->belongsTo(RendimientoAcademico::class,'id_rendimiento_academico','id_rendimiento_academico');
    }

    public function plan_estudio()
    {
        return $this->belongsTo(PlanEstudio::class, 'id_plan_estudio', 'id_plan_estudio');
    }

    public function nota_dpto_alum()
    {
        return $this->belongsTo(NotaDptoAlum::class , 'id_nota_dto_alumno' , 'id_nota_dto_alumno');
    }

    public function programa_local(){
        return $this->belongsTo(ProgramaLocal::class,'id_programa_local','id_programa_local');
    }

    public function programas()
    {
        return $this->hasMany(Programa::class, 'id_hoja_resumen', 'id_hoja_resumen');
    }
}