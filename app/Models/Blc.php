<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Blc extends Model
{
    protected $fillable = ['client_id','vol_id','date','total', 'numero_blc'];

    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function vol()
    {
        return $this->belongsTo(Vol::class);
    }

    public function lignes()
    {
        return $this->hasMany(BlcLigne::class);
    }
}

