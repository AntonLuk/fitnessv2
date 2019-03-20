<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Client;
use App\Ticket;
use App\JournalTicket;
use Carbon\Carbon;
use App\TypeTicket;
class JournalTicketController extends Controller
{
    public function addForm(){
        $clients=Client::all();
        $type_tickets=TypeTicket::all();
        return view('journal.add',compact('clients','type_tickets'));
    }
    public function create(Request $request){
        $ticket=new Ticket();
        $ticket->type_ticket_id=$request->type_ticket_id;
        $ticket->amount=$request->amount;
        $date=Carbon::createFromFormat('Y-m-d', $request->date);
        $ticket->date_delivery=$date;
        $ticket->cost=$request->cost;
        $client=Client::where('id',$request->client_id)->with('contract')->first();
        //return(dd($client));
        $ticket->contract_id=$client->contract->id;
        $ticket->save();
        return(redirect(route('contracts.show',['id'=>$client->contract->id])));
      //  return (dd(111));
    }
    public function anyData(){
        //$client=Client::with('tickets')->get();
        //return (dd($client));
        $tickets=Ticket::with(['contract','typeTicket'])->get();

        //return(dd($tickets));
        return view('journal.index',compact('tickets'));
    }

}
