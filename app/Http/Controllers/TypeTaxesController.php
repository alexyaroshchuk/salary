<?php

namespace App\Http\Controllers;

use App\TypeTaxes;
use Illuminate\Http\Request;

class TypeTaxesController extends Controller
{
    public function __construct()
	{
		$this->middleware('auth');
    }
    
    public function taxesShow(Request $request){
        $taxes = TypeTaxes::all();
        return view('typeTaxes', compact('taxes')); 
    }

    public function addTT(){
        return view('addTT');
    }

    public function createTT(Request $request){
        $data = $request->all();

        $medical_funds = $data['medical_funds'];
        $military_funds = $data['military_funds'];
        $pension_funds = $data['pension_funds'];
        $social_security_funds = $data['social_security_funds'];

        TypeTaxes::create([
            'medical_funds' => $medical_funds,
            'military_funds' => $military_funds,
            'pension_funds' => $pension_funds,
            'social_security_funds' => $social_security_funds
        ]);  

        return redirect('/typeTaxes')->with('message', 'Тип налогов добавлен');;
    }
}
