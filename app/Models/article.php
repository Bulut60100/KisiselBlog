<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class article extends Model
{
    use SoftDeletes;

    public function getcategory(){
    return $this->hasOne('App\Models\categories','id','categoryid');
    }
}
