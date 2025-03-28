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

        'name_model_planning',
        'type_model_planning',
        'duree_calculer_model_planning',
        'status',
        'heure_arriver_un_model_planning',
        'heure_depart_un_model_planning',
        'av_dep_un',
        'ap_dep_un',
        'debut_ap_un',
        'fin_ap_un',
        'heure_arriver_deux_model_planning',
        'heure_depart_deux_model_planning',
        'av_dep_deux',
        'ap_dep_deux',
        'debut_ap_deux',
        'fin_ap_deux',
        'created_by',
    ];

    protected $casts = [
        'duree_calculer_model_planning' => 'string',
        'heure_arriver_un_model_planning' => 'string',
        'heure_depart_un_model_planning' => 'string',
        'debut_ap_un' => 'string',
        'fin_ap_un' => 'string',
        'heure_arriver_deux_model_planning' => 'string',
        'heure_depart_deux_model_planning' => 'string',
        'debut_ap_deux' => 'string',
        'fin_ap_deux' => 'string',
    ];

    // Relation avec l'utilisateur qui a créé le planning
    public function addedByplanning()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

}