<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class estado extends Model
{
    use HasFactory;

    protected $table = 'estado';
    protected $primaryKey = 'id_estado';
    protected $fillable = array('descripcion', 'id_solicitud');

    protected $hidden = ['created_at', 'updated_at'];

    public function solicitud_cert_prog()
    {
        return $this->belongsTo(solicitud_cert_prog::class);
    }
}