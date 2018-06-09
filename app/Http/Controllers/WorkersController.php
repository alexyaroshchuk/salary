<?php

namespace App\Http\Controllers;

use App;
use App\Workers;
use App\SettlementSheets;
use App\WPosition;
use Illuminate\Http\Request;
use Input;

class WorkersController extends Controller
{
    public function showWorkers(){
        $workers = Workers::all();
            //$min_P = $request->input('min_P');
        //     $workers = Workers::where(function($query){
        //         $min_P =  Input::has('min_P') ? Input::get('min_P'): null;
        //         dump($min_P); 
        //         //$min_position =  Input::has('min_P') ? Input::get('min_P'): null; 
        //         //$min_position = Request::Input('min_P','0');
        //         //dump($min_position);
        //         $max_position = Input::has('max_position') ? Input::get('max_position') : null;
        //         dump($max_position);
        //         $sick_leave = Input::has('sick_leave') ? Input::get('sick_leave') : [];
        //         if(isset($min_position) && isset($max_position)){
        //                 $query -> where('id_position', '>=', $min_position)
        //                         -> where('id_position', '<=', $max_position);
        //         }
        //         //dump($min_position);
        //         dump($max_position);
        // })->get();

        return view('workers', compact('workers'));
    }
}
