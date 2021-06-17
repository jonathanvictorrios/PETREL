<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Carrera;

class UnidadAcademica extends Model
{
    use HasFactory;
    protected $table = 'unidad_academica';
    protected $primaryKey = 'id_unidad_academica';
    protected $fillable = array('unidad_academica');

    protected $hidden = ['created_at', 'updated_at'];

    public function carrera()
    {
        return $this->hasMany(Carrera::class, 'id_unidad_academica', 'id_unidad_academica');
    }
}