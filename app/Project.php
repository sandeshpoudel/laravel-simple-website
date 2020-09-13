<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Project extends Model
{
    public function user(){
        return $this->belongsTo(User::class);
    }
}


//hasOne
//hasMany
//belongsTo
//belongToMany

//morphMany
//morphToMany

