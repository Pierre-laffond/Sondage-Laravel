<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Survey extends Model
{
    use HasFactory;
    protected $fillable = [
        'date_debut',
        'date_fin',
        'status',
        'resultat',
        'projet_id'
    ];

    public function projet(){

        return $this->belongsTo(Projet::class);
    }

    public function vouters(){
     return    $this->belongsToMany(Vouter::class)->withPivot('vote', 'created_At');

    }
}
