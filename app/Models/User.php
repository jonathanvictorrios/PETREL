<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Jetstream\HasTeams;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles; //agregado

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use HasTeams;
    use Notifiable;
    use TwoFactorAuthenticatable;
    use HasRoles;//agregado

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'lastname',
        'dni',
        'email',
        'password',
        'legajo',
        'puesto'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'profile_photo_url',
    ];

    /*
    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        self::created(function (User $user) {
            if (!$user->roles()->get()->contains(6)) {
                $user->roles()->attach(6);
            }
        });
    }

    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }
    public function solicitudesCertProgEstudiante()
    {
        return $this->hasMany(SolicitudCertProg::class, 'id_usuario_estudiante', 'id_usuario');
    }
    public function solicitudesCertProgAdministrativo()
    {
        return $this->hasMany(SolicitudCertProg::class, 'id_user_u', 'id_usuario');
    }
    public function comentarios()
    {
        return $this->hasMany(Comentario::class, 'id_usuario', 'id_usuario');
    }
    public function estado()
    {
        return $this->belongsTo(Estado::class, 'id_usuario', 'id_usuario');
    }
    */
}//clase