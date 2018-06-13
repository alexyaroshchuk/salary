<?php

namespace App\Http\Controllers;
use App;
use App\Workers;
use App\SettlementSheets;
use App\Role;

use Illuminate\Http\Request;

class WorkerInfoController extends Controller
{
    public function __construct()
	{
		$this->middleware('auth');
    }
    
    public function workerShow($id_worker){
        $worker = Workers::where('id_worker', $id_worker)->first();
        $workerAll = Workers::all();
        $settlementsheet = $worker -> settlementsheet-> sortBy('pay_date');
        $worker_id=$worker->id_worker;
        $worker_fullname = $worker->fullname;
        $position = $worker -> position;
        return view('workerinfo', compact('worker_id', 'worker_fullname',
                                        'settlementsheet', 'position', 'worker')); 
    }
}