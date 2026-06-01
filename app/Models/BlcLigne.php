<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BlcLigne extends Model
{
    protected $fillable = ['blc_id','repas_id','quantite','prix_unitaire','total'];

    public function blc()
    {
        return $this->belongsTo(Blc::class);
    }

    public function repas()
    {
        return $this->belongsTo(Repas::class);
    }
}

