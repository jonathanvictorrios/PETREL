<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class plan_estudio extends Model
{
    use HasFactory;

    protected $table = 'plan_estudio';
    protected $primaryKey = 'id_plan_estudio';
    protected $fillable = array('anio', 'nro_ordenanza', 'nro_libro');

    protected $hidden = ['created_at', 'updated_at'];
}