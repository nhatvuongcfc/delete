<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Clases extends Model
{
    protected $table='class';
    protected $fillable=['name_class','id_class'];
    public function transcript (){
        return $this->hasMany('App\Transcript');
    }   
}
