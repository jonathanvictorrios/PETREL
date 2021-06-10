<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class historico_academico extends Model
{
    use HasFactory;

    protected $table = 'historico_academico';
    protected $primaryKey = 'id_historico';
    protected $fillable = array('archivo');

    protected $hidden = ['created_at', 'updated_at'];
}