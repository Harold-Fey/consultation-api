<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ResultatsPrediction extends Model
{
    use HasFactory;

    protected $fillable = [
        'probabilite_positive',
        'probabilite_negative',
        'resultat_prediction',
        'valide',
        'patient_id',
        'medecin_id',
        'donnees_id'
    ];

    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }

    public function medecin()
    {
        return $this->belongsTo(User::class);
    }

    public function donnees()
    {
        return $this->belongsTo(DonneesMedical::class, 'donnees_id');
    }
}
