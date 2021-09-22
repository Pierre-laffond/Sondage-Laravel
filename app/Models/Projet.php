<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Projet extends Model
{
    use HasFactory;
    protected $fillable = [

        'description',
        'passage',
        'file'
    ];

    public function survey(){

        return $this->hasOne(Survey::class);
    }
}
