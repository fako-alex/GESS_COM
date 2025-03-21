<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Service extends Model
{
    use HasFactory;
    protected $table = 'services';

    protected $fillable = ['name', 'detail', 'added_by'];
    public function addedByservice()
    {
        return $this->belongsTo(User::class, 'added_by');
    }

    // Définir la relation avec les utilisateurs
    public function users()
    {
        return $this->hasMany(User::class);
    }
}