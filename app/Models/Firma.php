<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Firma extends Model
{
    use HasFactory;

    protected $table = 'firma';
    protected $primaryKey = 'id_firma';
    protected $fillable = array('descripcion');

    protected $hidden = ['created_at', 'updated_at'];

    public function hojaResumenFinal()
    {
        return $this->hasOne(HojaResumenFinal::class, 'id_firma', 'id_firma');
    }
}