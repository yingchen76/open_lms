<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Murid extends Model
{
    //
    public $timestamps = false;
    public function tugas(){
    	return $this->hasMany('App\Tugas');
    }
    public function kelas(){
    	return $this->hasMany('App\Kelas');
    }
}
