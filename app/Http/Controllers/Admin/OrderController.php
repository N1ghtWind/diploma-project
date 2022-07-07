<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ActiveDelivery;
use App\Models\Carrier;
use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;
use Inertia\Inertia;

class OrderController extends Controller
{
    public function index()
    {


        Inertia::setRootView('admin');
        $css = asset('css/custom-2.css');

        $carriers = Carrier::with('media', 'user')->paginate(3, ['*'], 'carriers')->withQueryString();
        $orders = Order::with('products_with_trashed.media', 'user')->paginate(5, ['*'], 'orders')->withQueryString();
        $orders_count = Order::count();
        return Inertia::render('Admin/Orders', [
            'orders' => $orders,
            'css' => $css,
            'orders_count' => $orders_count,
            'carriers' =>  $carriers
        ]);
    }

    public function assign(Request $request)
    {
        $carrier = Carrier::findOrFail($request->carrier_id);
        $order = Order::findOrFail($request->order_id);

        if ($carrier && $order && $order->delivery_status == 'pending') {
            ActiveDelivery::create([
                'order_id' => $order->id,
                'carrier_id' => $carrier->id,
                'delivery_status' => 'processing',
            ]);

            $order->update([
                'delivery_status' => 'assigned',
            ]);
            return redirect()->back()->with('success', 'Order assigned successfully');
        } else {
            return redirect()->back()->with('error', ['Something went wrong']);
        }
    }
}
