<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Photo;

class Gallary extends Model
{
    public function photo(){
    	return $this->hasMany(Photo::class)->paginate(4);
    }
}
