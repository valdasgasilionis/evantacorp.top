<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Histology extends Model
{
    protected $guarded = [];
    public function requisition(){
        return $this->belongsTo(Requisition::class);
    }
}
