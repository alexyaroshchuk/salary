<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SettlementSheets;
use App\Role;

class SettlementSheetsController extends Controller
{
    public function __construct()
	{
		$this->middleware('auth');
    }
    
    public function addSS(){
            return view('addSS');
    }

    public function storeSS(Request $request) {
        $id_settlement_sheet = $request ->id_settlement_sheet;
        $id_worker = $request->id_worker;
        $annual_leave = $request->annual_leave;
        $sick_leave = $request->sick_leave;
        $awards_fine = $request->awards_fine;
        $hours = $request->hours;
        $pay_date = $request->pay_date;
        $id_taxes = $request->id_taxes;

        SettlementSheets::create([
        'id_settlement_sheet'=>$id_settlement_sheet,
        'id_worker'=>$id_worker,
        'annual_leave'=>$annual_leave,
        'sick_leave' => $sick_leave,   
        'awards_fine' => $awards_fine,   
        'hours' => $hours,   
        'pay_date' => $pay_date,   
        'id_taxes' => $id_taxes     
        ]);      
      return redirect()->back()->with('message', 'Settlement sheet added');                                                
    }

    public function refreshSS(){
        return view('refreshSS');
    }

    public function updateSS(Request $request) {
        $id_settlement_sheet = $request ->id_settlement_sheet;
        $id_worker = $request->id_worker;
        $annual_leave = $request->annual_leave;
        $sick_leave = $request->sick_leave;
        $awards_fine = $request->awards_fine;
        $hours = $request->hours;
        $pay_date = $request->pay_date;
        $id_taxes = $request->id_taxes;

        SettlementSheets::where('id_settlement_sheet', $id_settlement_sheet)->update([
            'annual_leave'=>$annual_leave,
            'sick_leave' => $sick_leave,   
            'awards_fine' => $awards_fine,   
            'hours' => $hours,   
            'pay_date' => $pay_date,   
            'id_taxes' => $id_taxes  
        ]);
        return redirect()->back()->with('message', 'Settlement sheet changed'); 
    }  

    public function destroySS(Request $request) {
        $id_settlement_sheet = $request->id_settlement_sheet;
        SettlementSheeets::destroy($id_settlement_sheet);
        return redirect()->back();                                           
    }
}

