<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Item;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public $menu_id;
    public $order_id;
    public $quantity;
    public $items;
    public $item;

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
            'customer_id' => 'required|numeric',
            'items.*.menu_id' => 'required|numeric',
            'items.*.quantity' => 'required|numeric',
        ]);

        $this->items = $request['items'];
        $order = Order::create($request->all());

        foreach($this->items as $item) {
            Item::create([
                'order_id' => $order['id'],
                'menu_id' => $item['menu_id'],
                'quantity' => $item['quantity']
            ]);
          }

        return $order;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Order::where('id', $id)->with(['customer', 'deliveryman', 'items'])->get();
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

    public function orderCancellled(Request $request, $id)
    {
        $params['status'] = 'canceled';
        $order = Order::find($id);
        $order->update($params);
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
