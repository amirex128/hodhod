<?php


namespace App\Http\Controllers\Api;

use App\Event\Event\newTicketEvent;
use App\Http\Controllers\Controller;
use App\model\Ticket;
use App\User;

class CommentController extends Controller
{
    public function create(Ticket $ticket)
    {
        $comment=$ticket->comments()->create([
            "comment" => request()->comment,
            "user_id" => request()->user_id,
            "type" => "user"

        ]);

        event(new newTicketEvent($ticket->title,request()->comment,User::find(request()->user_id)));

        return response($comment, 201);
    }

    public function getComment(Ticket $ticket)
    {
        return $ticket->comments()->latest()->get();
    }
}
