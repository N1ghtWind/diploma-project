<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{


    public function index()
    {

        $latest = Order::all()->sortBy('created_at')->take(5);
        return view('welcome');
    }

}
