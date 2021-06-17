<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Estado;

class EstadoDescripcion extends Model
{
    use HasFactory;
    
    protected $table='estado_descripcion';
    protected $primaryKey = 'id_estado_descripcion';
    protected $fillable = array('descripcion');
    protected $hidden = ['created_at','updated_at'];

    
    public function solicitudEstado()
    {
        return $this->belongsTo(Estado::class);
    }
    
}