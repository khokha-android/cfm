<?php


namespace App\Http\Controllers;


use App\Models\Ticket;
use Illuminate\Http\Request;
use Validator;
use Auth;
use App\User;
use Illuminate\Support\Facades\Mail;

class TicketController
{
    public function getTickets(){
        $tickets =  Ticket::select('id','title', 'description','due_date','status')->get();
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
            'status'=>'Aufgabe',
            'user_id'=> Auth::user()->id,
        ]);
        return redirect('/tickets/list');
    }

    public function deleteTicket($id) {
        $ticket = ticket::find($id);
        if(!$ticket) {
            return redirect()->back();
        }
        $ticket->delete();
        return redirect('/tickets/list');
    }
    public function editTicket($ticket_id) {
        $ticket = Ticket::find($ticket_id);
        if(!$ticket) {
            return redirect()->back();
        }
        $ticket = Ticket::select('id','title', 'description','due_date','status')->get()->first();
        return view('tickets.edit', compact('ticket'));
    }
    public function editStore(Request $request,$ticket_id) {
        //die($request);
        $ticket = Ticket::find($ticket_id);
        if(!$ticket) {
            return redirect()->back();
        }
        $ticket->update($request->all());
        return redirect('/tickets/list');
    }

    public function assignedTicket($id) {
        $users = UserController::getUsers();
        $ticket = ticket::find($id);
        if(!$ticket) {
            return redirect()->back();
        }
        $user_id = $ticket->id;
        $user = User::find($user_id);
        return view('tickets.assigned', compact('users', 'ticket', 'user'));
    }
    public function storeAssigned(Request $request){
        $user = $request->selectOption;
        Mail::To($user->email)->send();

        return redirect('/tickets/list');
    }

}
