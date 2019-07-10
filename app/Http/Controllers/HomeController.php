<?php

namespace App\Http\Controllers;

use App\model\Order;
use App\model\Product;
use App\User;
use Morilog\Jalali\Jalalian;

class HomeController extends Controller
{


    public function index()
    {

        $i = 1;
        $months = Order::selectRaw("count(*) as count,monthname(created_at) as month")->groupBy('month')->get()->sortBy('month')->map(function (
            $item,
            $key
        ) {

            return ["month" => Jalalian::forge($item['month'])->format("M"), "count" => $item['count']];

        });

        $array = [];
        foreach ($months as $month) {

            $array[$month['month']] = $month['count'];
            $i++;
        }


        $i1 = 1;
        $months1 = User::selectRaw("count(*) as count,monthname(created_at) as month")->groupBy('month')->get()->sortBy('month')->map(function (
            $item,
            $key
        ) {

            return ["month" => Jalalian::forge($item['month'])->format("M"), "count" => $item['count']];

        });

        $array1 = [];
        foreach ($months1 as $month1) {
            $array1[$month1['month']] = $month1['count'];
            $i1++;
        }


        $i2 = 1;
        $months2 = Product::selectRaw("count(*) as count,monthname(created_at) as month")->groupBy('month')->get()->sortBy('month')->map(function (
            $item,
            $key
        ) {

            return ["month" => Jalalian::forge($item['month'])->format("M"), "count" => $item['count']];

        });

        $array2 = [];
        foreach ($months2 as $month2) {
            $array2[$month2['month']] = $month2['count'];
            $i2++;
        }
        return view('dashboard',
            ['months' => $array, 'users' => $array1, 'products' => $array2, 'orders' => Order::take(7)->get()]);
    }

    public function home()
    {
        $name="amirex";
        $age=23;

        return view('welcome');

    }
}
