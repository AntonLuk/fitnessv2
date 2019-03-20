<?php

namespace App\Http\Controllers;

use App\Contract;
use Illuminate\Http\Request;

class ContractController extends Controller
{
        public function anyData(){
            $contracts=Contract::with('client')->get();
            return view('contracts.index',compact('contracts'));
        }
        public function show($id){
            $contract=Contract::find($id)->with('client')->first();
           // return(dd($contract));
            return view('contracts.show',compact('contract'));
        }
}
