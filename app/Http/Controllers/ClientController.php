<?php

namespace App\Http\Controllers;

use App\Contract;
use App\Ticket;
use App\TypeTicket;
use Illuminate\Http\Request;
use App\Client;
use App\Visit;
use Carbon\Carbon;
use App\JournalTicket;

class ClientController extends Controller
{
    public function anyData(){
        $clients=Client::all();
        return view('clients.index',compact('clients'));
    }
    public function addForm(){
        return view('clients.add');
    }
    public function addFormWithClient($id){
        $client=Client::find($id);
        $type_tickets=TypeTicket::all();
        return view('journal.addWithClient',compact('client','type_tickets'));
       // return(dd($id));
    }
    public function create(Request $request){
        $client=new Client();
        $client->fio=$request->fio;
        $client->number=$request->number;
        $client->date_of_birth=$request->date_of_birth;
        $client->passport_series=$request->passport_series;
        $client->passport_number=$request->passport_number;
        $client->passport_date=$request->passport_date;
        $client->passport_who=$request->passport_who;
        $client->passport_address=$request->passport_address;
        $client->save();
        return(redirect(route('clients.addFormWithClient',['id'=>$client->id])));
    }
    public function visits($id){
        //$client=Client::where('id',$id)->with('visits')->first();
        $contract=Contract::where('client_id',$id)->with('client')->first();
        $tickets=Ticket::where('contract_id',$contract->id)->with('visits')->first();
       return view('clients.visits',compact('contract','tickets'));
       // return(dd($contract,$ticket));
      // return(dd($tickets));
    }
    public function show($id){
        $client=Client::find($id)->first();
        return view('clients.show',compact('client'));
    }
    public function addVisit(Request $request){
       // $journalTick=JournalTicket::with('ticket')->where('client_id',$request->client_id)->first();
        $ticket=Ticket::find($request->ticket_id);
        $created_at=Carbon::createFromFormat('Y-m-d\TH:i', $request->date_start);
        $updated_at=Carbon::createFromFormat('Y-m-d\TH:i', $request->date_end);
        if($ticket->type_ticket_id==2){
            if($ticket->amount>0){
               // $ticket=Ticket::find($journalTick->ticket->id)->first();
                $ticket->amount=$ticket->amount-1;
                $ticket->save();
               //$ticket->save();
                $visit=new Visit();
                $visit->ticket_id=$ticket->id;
                $visit->created_at=$created_at;
                $visit->updated_at=$updated_at;
                $visit->save();
            }

            //$journalTick->ticket->amount=$journalTick->ticket->amount-1;
        }
        if($ticket->type_ticket_id==1){
            $visit=new Visit();
            $visit->ticket_id=$ticket->id;
            $visit->created_at=$created_at;
            $visit->updated_at=$updated_at;
            $visit->save();
        }


       // return(dd($journalTick->ticket->amount));
        return(redirect(route('clients.visits',['id'=>$request->client_id])));
    }
    public function destroy($id){
        $client=Client::find($id);
        $client->delete();
        return(redirect(route('clients.data')));
    }
}
