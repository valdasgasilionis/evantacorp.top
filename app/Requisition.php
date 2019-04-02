<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Requisition extends Model
{
    protected $guarded = [];
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function report(){
        return $this->hasOne(Report::class);
    }
    public function macro(){
        return $this->hasOne(Macro::class);
    }
    public function histology(){
        return $this->hasOne(Histology::class);
    }
    public function immuno(){
        return $this->hasOne(Immuno::class);
    }
}
