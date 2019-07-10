<?php

namespace App\Http\Controllers;

use App\model\Ticket;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function getTicket(Ticket $ticket)
    {
        return view('Tickets.create',['ticket'=>$ticket]);
}

    public function sendComment(Ticket $ticket)
    {
        \request()->validate([
            "editordata"=>'required'
        ]);

        $ticket->comments()->create([
            "user_id" => auth()->user()->id,
            "type" => 'admin',
            "comment"=>\request()->editordata
        ]);

        return back()->with("success","تیکت شما با موفقیت ارسال گردید");
    }
}
