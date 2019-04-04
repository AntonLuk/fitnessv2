<?php

namespace App\Http\Controllers;

use App\Ticket;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use PhpOffice\PhpWord\PhpWord;
use App\Visit;
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
        //$tickets=Ticket::whereBetween('date_delivery',[$request->start,$request->end])->groupBy('type_ticket_id')->orderBy('contract_id')->get();
        $ticketsTimeCount=Ticket::where('type_ticket_id',1)->whereBetween('date_delivery',[$request->start,$request->end])->count();
        $ticketsCount=Ticket::where('type_ticket_id',2)->whereBetween('date_delivery',[$request->start,$request->end])->count();
        $ticketsProbCount=Ticket::where('type_ticket_id',3)->whereBetween('date_delivery',[$request->start,$request->end])->count();
        $user=Auth::user()->name;
        $date=Carbon::now();
        $phpWord = new \PhpOffice\PhpWord\PhpWord();
        $tpl = $phpWord->loadTemplate(public_path('ticket_ot.docx'));
        $tpl->setValue('ticketsTimeCount',$ticketsTimeCount);
        $tpl->setValue('ticketsCount',$ticketsCount);
        $tpl->setValue('ticketsProbCount',$ticketsProbCount);
        $tpl->setValue('user',$user);
        $tpl->setValue('date',$date);
        $tpl->setValue('date_start',$request->start);
        $tpl->setValue('date_end',$request->end);
        $tpl->saveAs(public_path('tpl111.docx'));
        return response()->download(public_path('tpl111.docx'));
       // return(dd($date));
    }
    public function clientsVisits(Request $request){
        $user=Auth::user()->name;
        $date=Carbon::now();
        $countMan=Visit::where('gender_id',1)->whereBetween('created_at',[$request->start,$request->end])->count();
        $countWoman=Visit::where('gender_id',2)->whereBetween('created_at',[$request->start,$request->end])->count();
        $phpWord = new \PhpOffice\PhpWord\PhpWord();
        $tpl = $phpWord->loadTemplate(public_path('visits.docx'));
        $tpl->setValue('countMan',$countMan);
        $tpl->setValue('countWoman',$countWoman);
        $tpl->setValue('user',$user);
        $tpl->setValue('date',$date);
        $tpl->setValue('date_start',$request->start);
        $tpl->setValue('date_end',$request->end);
        $tpl->saveAs(public_path('vis.docx'));
        return response()->download(public_path('vis.docx'));
    }
    public function usersDate(Request $request){
        $user=Auth::user()->name;
        $date=Carbon::now();
        $users=User::all();
        $phpWord = new \PhpOffice\PhpWord\PhpWord();
        $tpl = $phpWord->loadTemplate(public_path('usersDate.docx'));
        $tpl->setValue('user',$user);
        $tpl->setValue('date',$date);
        $tpl->setValue('date_start',$request->start);
        $tpl->setValue('date_end',$request->end);
        $i = 0;
        $total_count=0;
        $tpl->cloneRow('num', $users->count() + 1);
        foreach($users as $user)
        {
            $i++;
            $tpl->setValue('num#'.$i, $i);
            $tpl->setValue('name#'.$i, $user->name);
            $tickets=Ticket::where('user_id',$user->id)->count();
            $tpl->setValue('count#'.$i, $tickets);
            $total_count += $tickets;
        }
        $i++;
        $tpl->setValue('num#'.$i,"");
        $tpl->setValue('name#'.$i, "Итого");
        $tpl->setValue('count#'.$i, $total_count);
        $tpl->saveAs(public_path('users.docx'));
        return response()->download(public_path('users.docx'));
    }
public function visitsDateForm(){
        return view('otchets.visitsDateForm');
}
    public function ticketsDateForm(){
        return view('otchets.ticketsDateForm');
    }
    public function usersDateForm(){
        return view('otchets.usersDateForm');
    }

}
