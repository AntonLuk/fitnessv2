<?php

namespace App\Http\Controllers;

use App\Ticket;
use Illuminate\Http\Request;

class OtchetsController extends Controller
{
    public function ticketDate(Request $request){
//        $journal = DB::table('tickets')
//
//            ->select('users.name', DB::raw('count(subs_id) as count'))
//
//            ->leftJoin('users', 'tickets.user_id', '=', 'users.id')
//
//            ->groupBy('user_id')
//
//            ->orderBy('subs_id')
//            ->get();
        $tickets=Ticket::whereBetween('date_delivery',[$request->start,$request->end])->groupBy('type_ticket_id')->orderBy('contract_id')->count('type_ticket_id')->get();
        return(dd($tickets));
    }
    public function ticketsDateForm(){
        return view('otchets.ticketsDateForm');
    }

}
