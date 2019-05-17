<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tugas extends Model
{
    public function tugas(){
    	return $this->belongsTo('App\Kelas');
    }

    public function user(){
    	return $this->hasMany('App\User');
    }
    public function murid(){
    	return $this->hasMany('App\Murid');
    }
    public function upload(){
        return $this->hasMany('App\Upload');
    }
}
