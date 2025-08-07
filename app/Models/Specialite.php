<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Specialite extends Model
{
    
    protected $table = 'specialite';

    protected $fillable = [
        'name',
        'code',
        'description',
        'image',
        'filiere_id',
        'niveau',
        'user_id',
    ];

    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function filiere()
    {
        return $this->belongsTo(Filiere::class, 'filiere_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    
}
