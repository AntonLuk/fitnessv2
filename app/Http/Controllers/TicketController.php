<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ticket;
use App\Client;
use App\TypeTicket;
use App\JournalTicket;
class TicketController extends Controller
{
    public function addForm(){
        $clients=Client::all();
        $type_tickets=TypeTicket::all();
        return view('tickets.add',compact('clients','type_tickets'));
    }
    public function index(){
        $tickets=Ticket::all();
        return view('tickets.data',compact('tickets'));
    }

}
