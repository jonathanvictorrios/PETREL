<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NotaAdminCentral extends Model
{
    use HasFactory;

    protected $table = 'nota_admin_central';
    protected $primaryKey = 'id_nota_admin_central';
    protected $fillable = array('url_pdf_nota_admin_central');

    protected $hidden = ['created_at', 'updated_at'];

    public function hoja_resumen_final()
    {
        return $this->hasOne(HojaResumenFinal::class,'id_nota_admin_central','id_nota_admin_central');
    }
}