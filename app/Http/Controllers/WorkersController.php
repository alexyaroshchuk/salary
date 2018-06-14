<?php

namespace App\Http\Controllers;

use App;
use App\Workers;
use App\SettlementSheets;
use App\WPosition;
use App\Role;
use Illuminate\Http\Request;
use Input;
use Carbon\Carbon;

class WorkersController extends Controller
{
    public function __construct()
	{
		$this->middleware('auth');
    }
    
    public function showWorkers(Request $request){
            
            $workers = SettlementSheets::where(function($query){

            $fromDate = Input::get('from_date', '2000-01-01');
            $toDate = Input::get('to_date', '3000-01-01');  

            $MinSL =  Input::get('MinSL', 0);
            $MaxSL = Input::get('MaxSL', 100);

            $MinAL = Input::get('MinAL', 0);
            $MaxAL = Input::get('MaxAL', 100);  

            $MinAF = Input::get('MinAF', 0);
            $MaxAF = Input::get('MaxAF',10000);  

            $MinHours = Input::get('MinHours',0);
            $MaxHours = Input::get('MaxHours', 10000);  
                        $query  -> whereBetween('pay_date', [$fromDate, $toDate])
                        -> whereBetween('sick_leave', [$MinSL, $MaxSL])
                        -> whereBetween('annual_leave', [$MinAL, $MaxAL])
                        -> whereBetween('awards_fine', [$MinAF, $MaxAF])
                        -> whereBetween('hours', [$MinHours, $MaxHours]);
                
        })->get();
        return view('workers', compact('workers', 'settlementsheet'));
    }
}
