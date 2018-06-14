<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TypeTaxes extends Model
{
    protected $table = 'type_taxes';
    protected $primaryKey = 'id_taxes';

    public function settlementsheet(){
        return $this ->  hasMany('App\SettlementSheets', 'id_taxes', 'id_taxes');
    } 
}
