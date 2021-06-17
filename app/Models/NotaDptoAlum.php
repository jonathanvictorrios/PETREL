<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NotaDptoAlum extends Model
{
    use HasFactory;

    protected $table = 'nota_dpto_alum';
    protected $primaryKey = 'id_nota_dpto';
    protected $fillable = array('descripcion_dto_alum', 'url_pdf_nota_dpto_alum');

    protected $hidden = ['created_at', 'updated_at'];

    public function hojaResumen()
    {
        return $this->hasOne(HojaResumen::class, 'id_nota_dpto', 'id_nota_dpto');
    }
}