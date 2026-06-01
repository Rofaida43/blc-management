<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    // Autorise le mass assignment pour ces champs
    protected $fillable = [
        'nom',
        'adresse',
        'telephone',
        'email',
        'type_client',
    ];
}

