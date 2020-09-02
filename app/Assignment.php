<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Assignment extends Model
{
    public function complete(){
        $this->completed = true; //complete is table column
        $this->save();
    }
}
