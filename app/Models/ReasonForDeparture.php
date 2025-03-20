<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ReasonForDeparture extends Model
{

    use HasFactory;
    protected $table = 'reason_for_departures';

    protected $fillable = ['name', 'detail', 'added_by'];
    public function addedBydeparture()
    {
        return $this->belongsTo(User::class, 'added_by');
    }

    // Définir la relation avec les utilisateurs
    public function users()
    {
        return $this->hasMany(User::class);
    }

}
