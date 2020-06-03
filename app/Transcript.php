<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transcript extends Model
{
    protected $table='transcripts';
    protected $fillable=['ten_mon_hoc','id_class'];
    public function class (){
        return $this->belongsTo('App\Clases');
    }
}
