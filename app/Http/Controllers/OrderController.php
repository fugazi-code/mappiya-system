<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Order::with(['customer', 'deliveryman'])->get();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'order_no' => 'required|string',
            'dispatch_lat' => 'required|string',
            'dispatch_long' => 'required|string',
            // 'deliveryman_lat' => 'required|string',
            // 'deliveryman_long' => 'required|string',
            // 'deliveryman_id' => 'required|numeric',
            'customer_id' => 'required|numeric',
        ]);

        return Order::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Order::find($id)->with(['customer', 'deliveryman'])->get();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $order = Order::find($id);
        $order->update($request->all());
        return $order;
    }

    /**
     * Update order to pickup status
    */
    public function orderPickup(Request $request, $id)
    {
        $validatedData = $request->validate([
            'deliveryman_lat' => 'required|string',
            'deliveryman_long' => 'required|string',
            'deliveryman_id' => 'required|numeric',
        ]);
        $validatedData['status'] = 'pickup';

        $order = Order::find($id);
        $order->update($validatedData);
        return $order;
    }

    /**
     * Update order to delivery status
    */
    public function orderDelivery(Request $request, $id)
    {
        $validatedData['status'] = 'delivery';

        $order = Order::find($id);
        $order->update($validatedData);
        return $order;
    }

    /**
     * Update order to completed status
     * TODO: Create payment
    */
    public function orderCompleted(Request $request, $id)
    {
        $validatedData = $request->validate([
            'payment_no' => 'required|string',
        ]);
        $validatedData['status'] = 'completed';

        $order = Order::find($id);
        $order->update($validatedData);
        return $order;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return Order::destroy($id);
    }
}
