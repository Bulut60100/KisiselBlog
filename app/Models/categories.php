<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class categories extends Model
{
    public function articleCount(){
        return $this->hasMany('App\Models\article','categoryid','id')->count();
    }
}
