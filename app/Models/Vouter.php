<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vouter extends Model
{
    use HasFactory;
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'password',
        'birthdate',
        'phone_number',
        'partie_id'
    ];

    public function partie(){

        return $this->belongsTo(Partie::class);
    }
    public function surveys(){
        return $this->belongsToMany(Survey::class)->withPivot('vote', 'created_At')->withTimestamps();

    }
}
