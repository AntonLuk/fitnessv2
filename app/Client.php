<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Visit;
use App\JournalTicket;
use App\Ticket;
use App\Contract;
class Client extends Model
{
    public function visits(){
        return $this->hasMany(Visit::class);
    }
    public function ticket(){
        return $this->belongsToMany(Ticket::class,'journal_tickets');
    }
    public function contract(){
        return $this->hasOne(Contract::class,'client_id');
    }
    public function gender(){
        return $this->belongsTo(Gender::class);
    }
}
