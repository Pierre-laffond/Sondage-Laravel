<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Partie extends Model
{
    use HasFactory;
    protected $fillable = [

        'name'
    ];

    public function vouters(){

        return $this->hasMany(Vouter::class);
    }
}
