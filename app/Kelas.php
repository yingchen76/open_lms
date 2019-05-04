<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    //
    public $timestamps = false;

    public function user(){
    	return $this->belongsTo('App\User');
    }
    public function tugas(){
    	return $this->hasMany('App\Tugas');
    }
    public function murid(){
    	return $this->hasMany('App\Murid');
    }
}
