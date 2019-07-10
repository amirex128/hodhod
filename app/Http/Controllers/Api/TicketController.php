<?php

namespace App\Http\Controllers\Api;
use App\Event\Event\newTicketEvent;
use App\Http\Controllers\Controller;
use App\Mail\TicketMail;
use App\model\Ticket;
use App\User;
use Illuminate\Support\Facades\Mail;


class TicketController extends Controller
{
    public function create()
    {
        Ticket::create([
           "user_id"=>auth()->id(),
           "category_id"=>1,
           "title"=>request()->title,
           "message"=>"",
           "status"=>1
        ]);
       $user= User::find(auth()->id());
       event(new newTicketEvent(request()->title,request()->message,$user));

        return response(["ticket created"],201);
    }


    public function allUser()
    {
        return auth()->user()->ticket()->latest()->get();
    }

    public function all()
    {
        return Ticket::latest()->get();
    }
}
