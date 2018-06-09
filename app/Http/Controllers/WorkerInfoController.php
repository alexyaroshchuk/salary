<?php

namespace App\Http\Controllers;
use App;
use App\Workers;
use App\SettlementSheets;
use Illuminate\Http\Request;

class WorkerInfoController extends Controller
{
    public function workerShow($id_worker){
        $worker = Workers::where('id_worker', $id_worker)->first();
        $workerAll = Workers::all();
        $settlementsheet = $worker -> settlementsheet;
        $worker_id=$worker->id_worker;
        $worker_fullname = $worker->fullname;
        $position = $worker -> position;
        //dump($position);
        return view('workerinfo', compact('worker_id', 'worker_fullname',
                                        'settlementsheet', 'position', 'worker')); 
    }


    public function storeWorker(Request $request) {
        
        $fullname = $request->fullname;
        $date_of_birth = $request->date_of_birth;
        $id_poistion = $request->id_poistion;
        

        Workers::create([
        'fullname'=>$fullname,
        'date_of_birth'=>$date_of_birth,
        'id_poistion' => $id_poistion,   
        ]);     
        
      return redirect()->back()->with('message', 'Сотрудник добавлен');                                                
    }
}