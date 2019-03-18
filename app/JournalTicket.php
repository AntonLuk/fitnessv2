<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Client;
use App\Ticket;

class JournalTicket extends Model
{
//    public function client(){
//        return $this->hasOne(Client::class,'id');
//    }
    public function ticket(){
        return $this->belongsTo(Ticket::class,'ticket_id');
    }
}
