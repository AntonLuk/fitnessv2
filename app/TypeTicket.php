<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\JournalTicket;
class TypeTicket extends Model
{
    public function tickets(){
        return $this->hasMany(Ticket::class,'type_ticket_id');
    }
}
