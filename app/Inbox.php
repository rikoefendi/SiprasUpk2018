<?php

namespace App;

use App\Disposisi;
use Illuminate\Database\Eloquent\Model;

class Inbox extends Model
{
    public function disposisi(){
        return $this->belongsTo('App\Disposisi');
    }
}
