<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Absence extends Model
{
    use HasFactory;
    protected $table = 'absences';

    protected $fillable = ['name','start_date','end_date', 'detail', 'added_by'];
    public function addedByabsence()
    {
        return $this->belongsTo(User::class, 'added_by');
    }

    // Définir la relation avec les utilisateurs
    public function users()
    {
        return $this->hasMany(User::class);
    }
}
