<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Parcour extends Model
{
    protected $table = 'parcour';
    protected $fillable = [
        'premiere',
        'deuxieme',
        'troisieme',
        'quatrieme',
        'user_id',
    ];
    
     public function user()
    {
        return $this->belongsTo(User::class);
    }
}