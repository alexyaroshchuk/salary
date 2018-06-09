<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WPosition extends Model
{
    protected $table = 'w_positions';
    protected $primaryKey = 'id_position';
    public $timestamps = false;
    
    public function worker(){
        return $this -> belongTo('App\Workers');
    } 
}
