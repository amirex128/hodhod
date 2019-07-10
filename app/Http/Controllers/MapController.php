<?php

namespace App\Http\Controllers;

use App\model\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MapController extends Controller
{
    public function index()
    {

        return view('Map.index',['orders'=> Order::where("payment_status",3)->oldest()->paginate(15)]);
    }
}
