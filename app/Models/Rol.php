<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rol extends Model
{
    use HasFactory;

    protected $table = 'rol';
    protected $primaryKey = 'id_rol';
    protected $fillable = array('descripcion');

    protected $hidden = ['created_at', 'updated_at'];

    public function usuarios()
    {
        return $this->belongsToMany(Usuario::class);
    }

    public function permisos()
    {
        return $this->belongsToMany(Permiso::class);
    }
}