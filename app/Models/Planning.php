<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Planning extends Model
{

    use HasFactory;
    protected $table = 'plannings';

    protected $fillable = [
        'service_id',
        'user_id',
        'planning_type',
        'start_date',
        'start_time',
        'end_date',
        'end_time',
        'event_location',
        'status',
        'detail_planning',
        'created_by',
    ];

    // Relation avec l'utilisateur qui a créé le planning
    public function addedByplanning()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    // Relation avec le service
    public function service(): BelongsTo
    {
        return $this->belongsTo(Service::class, 'service_id');
    }

    // Relation avec l'utilisateur concerné
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
