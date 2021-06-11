<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class rol extends Model
{
    use HasFactory;

    protected $table = 'rol';
    protected $primaryKey = 'id_rol';
    protected $fillable = array('descripcion');

    protected $hidden = ['created_at', 'updated_at'];

    public function usuarios()
    {
        return $this->belongsToMany(usuario::class);
    }

    public function permisos()
    {
        return $this->belongsToMany(permiso::class);
    }
}