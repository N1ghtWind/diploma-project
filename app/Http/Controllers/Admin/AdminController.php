<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Carbon\Carbon;
use Carbon\CarbonPeriod;
use DateInterval;
use DatePeriod;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Inertia\Inertia;

class AdminController extends Controller
{

    public function __construct()
    {
    }

    public function index()
    {

        $get_daily_created_orders_last_week =
            Order::select(DB::raw('DATE(created_at) as date'), DB::raw('COUNT(*) as count'))
            ->where('created_at', '>=', Carbon::now()->subDays(7))
            ->groupBy('date')
            ->get();


        $get_every_day_string_last_week = function () {
            $dates = [];
            $start = Carbon::now()->subDays(6);
            $end = Carbon::now();

            $period = CarbonPeriod::create($start, $end);
            foreach ($period as $date) {
                $dates[] = $date->format('Y-m-d');
            }
            return $dates;
        };


        foreach ($get_every_day_string_last_week() as $date) {
            if ($get_daily_created_orders_last_week->where('date', $date)->count() == 0) {
                $get_daily_created_orders_last_week->push(['date' => $date, 'count' => 0]);
            }
        }
        $get_daily_created_orders_last_week = $get_daily_created_orders_last_week->sortBy('date')->values();


        $count_user = User::count();
        $count_order = Order::count();
        $count_product = Product::count();



        Inertia::setRootView('admin');
        return Inertia::render('Admin/Admin', [
            'get_daily_created_orders_last_week' => $get_daily_created_orders_last_week,
            'count_user' => $count_user,
            'count_order' => $count_order,
            'count_product' => $count_product,
        ]);
    }

    public function logout()
    {
        Auth::logout();
        session()->flush();
        return Inertia::location(url('/login'));
    }

    public function markNotificationsAsRead()
    {
        foreach (auth()->user()->unreadNotifications as $notification) {
            $notification->markAsRead();
        }
    }
}
