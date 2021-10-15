<?php

namespace App\Http\Controllers;

use App\Events\OrderProcessed;
use App\Models\Item;
use App\Models\Order;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function orders()
    {
        $orders = Order::all();

        return view('admin.orders', compact('orders'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showOrder(Order $order)
    {
        return view('admin.show_order', compact('order'));
    }

    public function orderUpdateForm(Order $order)
    {
        $items = Item::all()->unique('name');

        return view('admin.order_update', compact('order', 'items'));
    }

    public function orderUpdate(Request $request, Order $order)
    {
        $request->validate([
            'status' => 'required',
        ]);

        $order->update(['status' => $request->status]);

        // if status == 3 [dispatched]
        if ($request->status == 3) {
            OrderProcessed::dispatch($order);
        }

        $request->session()->flash('message', 'Order status has been updated.');
        return redirect()->route('admin.orders');
    }
}
