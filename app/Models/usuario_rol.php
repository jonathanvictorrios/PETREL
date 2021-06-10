<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class usuario_rol extends Model
{
    use HasFactory;

    protected $table = 'usuario_rol';
    protected $fillable = array('id_usuario', 'id_rol');

    protected $hidden = ['created_at', 'updated_at'];
}