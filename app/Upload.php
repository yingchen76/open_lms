<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Upload extends Model
{
    //
    public $timestamps = false;
    
    public function tugas(){
    	return $this->belongsTo('App\Tugas');
    }
    public function user(){
    	return $this->belongsTo('App\User');
    }
    public function murid(){
    	return $this->belongsTo('App\Murid');
    }
    public function kelas(){
        return $this->belongsTo('App\Kelas');
    }

}
