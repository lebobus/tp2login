<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;

class Etudiants extends Model
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'id',
        'etudiant_nom',
        'etudiant_adresse',
        'etudiant_phone',
        'etudiant_email',
        'etudiant_dateNaissance',
        'ville_id'
    ];
}
