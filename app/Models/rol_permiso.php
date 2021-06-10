<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class rol_permiso extends Model
{
    use HasFactory;

    protected $table = 'rol_permiso';
    protected $fillable = array('id_rol', 'id_permiso');

    protected $hidden = ['created_at', 'updated_at'];
}