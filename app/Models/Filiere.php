<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Specialite;

class Filiere extends Model
{
    protected $table = 'filieres';

    protected $fillable = [
        'name',
        'code',
        'description',
    ];
    public function specialites()
    {
        return $this->hasMany(Specialite::class, 'filiere_id');
    }
    
}
