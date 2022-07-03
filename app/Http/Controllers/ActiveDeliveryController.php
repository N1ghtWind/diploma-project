<?php

namespace App\Http\Controllers;

use App\Models\ActiveDelivery;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ActiveDeliveryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $active_deliveries = auth()->user()->userable->active_deliveries->where('delivery_status', 'processing')->load('order.user.address', 'order.products.media');

        $active_deliveries->each(function ($active_delivery) {
            $active_delivery->diff_time = Carbon::parse($active_delivery->created_at)->diffForHumans();
        });
        return Inertia::render('Carrier/ActiveDeliveries', [
            'active_deliveries' => $active_deliveries,
        ]);
    }

    public function complete(Request $request) {
       if($request->has('id')) {
           $active_delivery = ActiveDelivery::find($request->id);
           $active_delivery->delivery_status = 'completed';
           $active_delivery->save();

           $active_delivery->order->delivery_status = 'completed';
           $active_delivery->order->save();

           return redirect()->back()->with('success', 'Delivery marked as completed!');
       }
       else {
              return redirect()->back()->with('error', ['Something went wrong!']);
       }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    public function history() {
        $histories = auth()->user()->userable->active_deliveries->where('delivery_status', 'completed')->load('order.user.address', 'order.products.media');

        $histories->each(function ($active_delivery) {
            $active_delivery->diff_time = Carbon::parse($active_delivery->created_at)->diffForHumans();
        });
        return Inertia::render('Carrier/History', [
            'histories' => $histories,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
