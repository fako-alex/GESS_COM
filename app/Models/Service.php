<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $fillable = ['name', 'detail', 'added_by'];
    public function addedByservice()
    {
        return $this->belongsTo(User::class, 'added_by');
    }
}
