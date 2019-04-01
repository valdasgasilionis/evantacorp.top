<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Immuno extends Model
{
    protected $guarded = [
        'id'
    ];
    public function requisition(){
        return $this->belongsTo(Requisition::class);
    }
}
