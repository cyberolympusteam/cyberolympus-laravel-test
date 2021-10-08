<?php

namespace App\Http\Controllers;

use App\Models\Agent;
use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index(Request $request)
    {
        // query params
        $limit = $request->limit ?? 10;
        $search = $request->search;

        // order query
        $orders = Order::when($search, function ($q) use ($search) {
            return $q->where('invoice_id', 'LIKE', "%${search}%")
                ->orWhere('name', 'LIKE', "%${search}%");
        })
            ->paginate($limit);

        foreach ($orders as $k => $v) {
            $v['agent'] = Agent::where('partner_id', $v->agent_name)->first();

            $orderItems = OrderDetail::where('order_id', $v->id)
                ->get();
            $items = 0;
            $quantities = 0;

            foreach ($orderItems as $item) {
                $items++;
                $quantities += $item->qty;
            }

            $v['items'] = $items;
            $v['quantities'] = $quantities;
        }

        return view('orders.index')->with([
            'datas' => $orders,
        ]);
    }
}
