<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Client;
class Contract extends Model
{
    public function client(){
        return $this->belongsTo(Client::class);
    }
    public function ticket(){
        return $this->hasMany(Ticket::class,'contract_id');
    }
}
