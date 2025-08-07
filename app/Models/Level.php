<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Level extends Model
{
    protected $table = 'level';
    protected $fillable = [
        'obtention',
        'serie',
        'mention',
        'etablissement',
        'chxspecialite',
        'fonction',
        'hebergement',
        'quartier',
        'user_id',
        'specialite_id',
    ];

    // Relations optionnelles
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function specialite()
    {
        return $this->belongsTo(Specialite::class);
    }
}