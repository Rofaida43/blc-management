<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Repas extends Model
{
    protected $fillable = ['categorie','nom','prix','unite'];
}

