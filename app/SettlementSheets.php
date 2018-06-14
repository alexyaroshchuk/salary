<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SettlementSheets extends Model
{
    protected $table = 'settlement_sheets';
    protected $primaryKey = 'id_settlement_sheet';
    protected $fillable = ['id_worker', 'annual_leave', 'sick_leave',
                            'awards_fine', 'hours', 'pay_date', 'id_taxes'];
                            
    public $timestamps = false;

    public function worker(){
        return $this ->  hasOne('App\Workers', 'id_worker', 'id_worker');
    } 

    public function taxe(){
        return $this ->  hasOne('App\TypeTaxes', 'id_taxes', 'id_taxes');
    } 
}
