<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HojaResumenFinal extends Model
{
    use HasFactory;

    protected $table = 'hoja_resumen_final';
    protected $primaryKey = 'id_hoja_resumen';
    protected $fillable = array(
        'url_pdf_hoja_unida_sinfirmar',
        'url_pdf_hoja_unida_final',
        'id_hoja_resumen_final',
        'id_firma',
        'id_nota_central'
    );

    protected $hidden = ['created_at', 'updated_at'];

    public function notaAdminCentral()
    {
        return $this->belongsTo(NotaAdminCentral::class, 'id_nota_central', 'id_nota_central');
    }

    public function firma()
    {
        return $this->belongsTo(Firma::class, 'id_firma', 'id_firma');
    }
}