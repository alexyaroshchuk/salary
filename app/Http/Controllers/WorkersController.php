<?php

namespace App\Http\Controllers;

use App;
use App\Workers;
use App\SettlementSheets;
use App\WPosition;
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

            $fromDate = Input::has('from_date') ? Input::get('from_date') : null;
            $toDate = Input::has('to_date') ? Input::get('to_date') : null;  

            $MinSL =  Input::has('MinSL') ? Input::get('MinSL'): null;
            $MaxSL = Input::has('MaxSL') ? Input::get('MaxSL') : null;

            $MinAL = Input::has('MinAL') ? Input::get('MinAL') : null;
            $MaxAL = Input::has('MaxAL') ? Input::get('MaxAL') : null;  

            $MinAF = Input::has('MinAF') ? Input::get('MinAF') : null;
            $MaxAF = Input::has('MaxAF') ? Input::get('MaxAF') : null;  

            $MinHours = Input::has('MinHours') ? Input::get('MinHours') : null;
            $MaxHours = Input::has('MaxHours') ? Input::get('MaxHours') : null;  
            if(isset($fromDate) && isset($toDate)){
                        $query  -> whereBetween('pay_date', [$fromDate, $toDate])
                        -> whereBetween('sick_leave', [$MinSL, $MaxSL])
                        -> whereBetween('annual_leave', [$MinAL, $MaxAL])
                        -> whereBetween('awards_fine', [$MinAF, $MaxAF])
                        -> whereBetween('hours', [$MinHours, $MaxHours]);
                }
        })->get();
        return view('workers', compact('workers', 'settlementsheet'));
    }
}
