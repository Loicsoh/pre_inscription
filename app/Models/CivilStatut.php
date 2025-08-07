<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CivilStatut extends Model
{
    protected $table = 'civilstatut';
    protected $fillable = [
        'nom', 
        'prenom', 
        'date_naissance', 
        'ville', 
        'Departement', 
        'pays',
        'sexe', 
        'nationalite',
        'situation_familiale',
        'handicape',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}