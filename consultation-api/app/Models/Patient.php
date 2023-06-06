<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;

    protected $fillable = [

        'nom',
        'prenoms',
        'date_de_naissance',
        'numero_de_telephone',
        'email',
        'adresse'
    ];

    public function donnees()
    {
        return $this->hasMany(DonneesMedical::class);
    }

    public function predictions()
    {
        return $this->hasMany(ResultatsPrediction::class);
    }
}
