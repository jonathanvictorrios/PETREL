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
<<<<<<< HEAD
        return $this->hasMany(Carrera::class,'id_unidad_academica'); 
=======
        return $this->hasMany(Carrera::class, 'id_unidad_academica', 'id_unidad_academica');
>>>>>>> 0e93fd442ac3c2eba9a5755f6f1b8f7cb951e251
    }
}