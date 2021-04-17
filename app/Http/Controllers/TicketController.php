<?php


namespace App\Http\Controllers;


use App\Models\Ticket;
use Illuminate\Http\Request;
use Validator;
use Auth;

class TicketController
{
    public function getTickets(){
        $tickets =  Ticket::select('title', 'description','date','status')->get();
        return view('tickets.list', compact('tickets'));
    }
    public function createTicket(){
        return view('tickets.create');
    }
    public function storeTicket(Request $request){
        $rules = [
            'title'=>'required|unique:tickets,title',
        ];
        $messages = [
           'title.required' => 'Geben Sie ein Title ein.',
            'title.unique'=>'Title ist schon vergeben.'
        ];
        $validate = Validator::make($request->all(),$rules, $messages);
        if($validate->fails()){
            return redirect()->back()->withErrors($validate)->withInputs($request->all());
        }
        Ticket::create([
            'title'=>$request->title,
            'description'=>$request->description,
            'status'=>$request->status,
            'user_id'=> Auth::user()->id,
        ]);
        return view('tickets.list');
    }

}
