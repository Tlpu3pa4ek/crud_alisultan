<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrdersController extends Controller
{
    public function getInfo(){
        $orders = Order::select(
            'orders.id as order_id',
            'orders.dateBuy as order_date',
            'orders.client_id',
            'clients.last_name_doc as client_lastname',
            'clients.first_name_doc as client_firstname',
            'orders.product_id',
            'products.name as product_name',
            'products.price as product_price',
            'products.category_id as category_id',
            'categories.name as category_name'
        )
            ->join('clients', 'orders.client_id', '=', 'clients.id')
            ->join('products', 'orders.product_id', '=', 'products.id')
            ->join('categories', 'products.category_id', '=', 'categories.id')
            ->get()
            ->map(function ($order) {
                return [
                    'order_id' => $order->order_id,
                    'order_date' => $order->order_date,
                    'client' => [
                        'client_id' => $order->client_id,
                        'client_lastname' => $order->client_lastname,
                        'client_firstname' => $order->client_firstname,
                    ],
                    'product' => [
                        'product_id' => $order->product_id,
                        'product_name' => $order->product_name,
                        'product_price' => $order->product_price,
                        'category' => [
                            'category_id' => $order->category_id,
                            'category_name' => $order->category_name,
                        ],
                    ],
                ];
            });

        return response()->json(['orders' => $orders]);
    }

    public function store(Request $request)
    {
        $order = new Order();
        $order->client_id = $request->client_id;
        $order->product_id = $request->product_id;
        $order->dateBy = $request->dateBy;

        $orderByCreated = $order->save();
        if ($orderByCreated){
            return 'client was created';
        } else {
            return "client wasn't created";
        }

    }


    public function restore(Request $request)
    {
        $id = $request -> order_id;
        $record = Order::withTrashed()->find($id);
        $record->restore();
        return 'client was restored';
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $order = Order::find($id);
        $order->client_id = $request->client_id;
        $order->product_id = $request->product_id;
        $order->dateBy = $request->dateBy;
        $order->update();
        return 'data was updated';
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete($id)
    {
        $order = Order::find($id);
        if ($order->delete()) {
            return 'successfully deleted';
        } else {
            return 'not deleted';
        }
    }
}
