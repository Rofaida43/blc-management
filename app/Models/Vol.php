<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vol extends Model
{
    protected $fillable = ['numero','date','heure','passagers','classe'];

    public function repas()
    {
        return $this->belongsToMany(Repas::class, 'repas_vol');
    }
}


