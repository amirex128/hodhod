<?php

namespace App\Http\Controllers;

use App\model\Ticket;
use Illuminate\Http\Request;

class TicketController extends Controller
{


    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('Tickets.index',['tickets'=>Ticket::latest()->paginate(15)]);

    }


    /**
     * @param  Request  $request
     * @param  Ticket  $ticket
     * @return {fdsfsdfsdfsdfsdf}
     */
    public function update(Request $request, Ticket $ticket)
    {

            $ticket->update([
               'status'=>0
            ]);
            return redirect()->back();


    }


}
