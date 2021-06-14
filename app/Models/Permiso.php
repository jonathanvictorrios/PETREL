<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permiso extends Model
{
    use HasFactory;

    protected $table = 'permiso';
    protected $primaryKey = 'id_permiso';
    protected $fillable = array('descripcion');

    protected $hidden = ['created_at', 'updated_at'];

    public function roles()
    {
        return $this->belongsToMany(Rol::class);
    }
}