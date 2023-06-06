<?php

namespace App\Models;

use App\Traits\SecureDelete;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DonneesMedical extends Model
{
    use HasFactory, SecureDelete;

    protected $fillable = [
        'sexe',
        'hypertension',
        'probleme_cardiaque',
        'bmi',
        'glucose',
        'fumeur',
        'hbaic',
        'patient_id'
    ];

    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }

    public function predictions()
    {
        return $this->hasMany(ResultatsPrediction::class, 'id');
    }
}
