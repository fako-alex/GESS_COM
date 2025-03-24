<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'first_name',
        'gender',
        'phone',
        'email',
        'service_id',
        'absence_id',
        'departure_id',
        'matricule',
        'birth_date',
        'birth_place',
        'country',
        'city',
        'neighborhood',
        'hiring_date',
        'departure_date',
        'role',
        'status',
        'profile_picture',
        'added_by',
        'password',
    ];

    // Recuperer le nom de la personne
    public function addedByUser()
    {
        return $this->belongsTo(User::class, 'added_by');
    }

    public function service()
    {
        return $this->belongsTo(Service::class);
    }
    public function absence()
    {
        return $this->belongsTo(Absence::class);
    }
    public function departure()
    {
        return $this->belongsTo(ReasonForDeparture::class);
    }

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
}
