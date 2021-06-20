<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NotificacionEmail extends Model
{
    use HasFactory;
    
    protected $table='notificaciones_email';
    protected $primaryKey = 'id_notif_email';
    protected $fillable = array('de', 'para', 'mensaje');
    protected $hidden = ['created_at','updated_at'];

}
