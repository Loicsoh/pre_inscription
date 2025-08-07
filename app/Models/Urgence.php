<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Urgence extends Model
{
    protected $table = 'urgence';

    protected $fillable = ([
        'nom_urg',
        'tel_urg',
        'user_id',
    ]); 
    public  function user()
    {
        return $this->belongsTo(User::class);
    }
}
