<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class regisseur extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'Voornaam', 'Achternaam'
    ];
}
