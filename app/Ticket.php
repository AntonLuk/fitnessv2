<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Client;
use App\TypeTicket;
use App\JournalTicket;
class Ticket extends Model
{
    public function contract(){
        return $this->belongsTo(Contract::class,'contract_id');
    }
    public function typeTicket(){
        return $this->belongsTo(TypeTicket::class);
    }
    public function visits(){
        return $this->hasMany(Visit::class);
    }
}
