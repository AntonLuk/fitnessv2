<?php

namespace App\Http\Controllers;

use App\Contract;
use App\Gender;
use App\Ticket;
use App\TypeTicket;
use Illuminate\Http\Request;
use App\Client;
use App\Visit;
use Carbon\Carbon;
use App\JournalTicket;
use Illuminate\Support\Facades\Storage;
use PhpOffice\PhpWord\PhpWord;
use Illuminate\Support\Str;


class ClientController extends Controller
{
    public function print($id){
        $contract=Contract::where('client_id',$id)->with('client')->first();
        $phpWord = new \PhpOffice\PhpWord\PhpWord();
        $tpl = $phpWord->loadTemplate(public_path('Appdividend.docx'));
        $tpl->setValue('fio',$contract->client->FIO);
        $tpl->setValue('passport',$contract->client->passport_series.' '.$contract->client->passport_number.' Выдан'.$contract->client->passport_date.' '.$contract->client->passport_who);
        $tpl->setValue('passport_addres',$contract->client->passport_address);
        $tpl->setValue('number',$contract->client->number);
        $tpl->setValue('d_num',$contract->number);
        $tpl->setValue('d_date',$contract->date);
//        $section = $phpWord->addSection();
//        $text = $section->addText('111');
//        $text = $section->addText("222");
//        $text = $section->addText('333',array('name'=>'Arial','size' => 20,'bold' => true));
        //$section->addImage("./images/Krunal.jpg");
       // $tpl->save(public_path('tpl.docx'));
//        $objWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'Word2007');
//        $objWriter->save(public_path('tpl.docx'));

        $tpl->saveAs(public_path('tpl111__'.$id.'.docx'));
        return response()->download(public_path('tpl111__'.$id.'.docx'));
        //return(dd($contract));
    }
//$phpWord = new \PhpOffice\PhpWord\PhpWord();
//$section = $phpWord->addSection();
//$text = $section->addText($request->get('name'));
//$text = $section->addText($request->get('email'));
//$text = $section->addText($request->get('number'),array('name'=>'Arial','size' => 20,'bold' => true));
//$section->addImage("./images/Krunal.jpg");
//$objWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'Word2007');
//$objWriter->save('Appdividend.docx');
//return response()->download(public_path('Appdividend.docx'));
    public function anyData(){
        $clients=Client::all();
        return view('clients.index',compact('clients'));
    }
    public function addForm(){
        $genders=Gender::all();
        return view('clients.add',compact('genders'));
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
        $client->gender_id=$request->gender_id;
        $client->save();
        $contract=new Contract();
        $contract->number=round(microtime(true) * 1000);;
        $contract->client_id=$client->id;
        $contract->date= Carbon::today();
        $contract->save();
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
        $genders=Gender::all();
        $client=Client::find($id)->with('gender')->first();
        return view('clients.show',compact('client','genders'));
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
