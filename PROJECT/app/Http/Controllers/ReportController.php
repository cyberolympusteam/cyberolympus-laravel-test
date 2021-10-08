<?php

namespace App\Http\Controllers;

use App\Models\Agent;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use App\Models\ProductCategory;
use App\User;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function index($type = 'statistics', Request $request)
    {
        $datas = [];

        switch ($type) {
            case 'statistics':
                $datas = $this->getStatistics($request);
                break;
            case 'customer-orders':
                $datas = $this->getCustomerOrders($request);
                break;
            case 'agent-orders':
                $datas = $this->getAgentOrders($request);
                break;
            case 'profits':
                $datas = $this->getProfits($request);
                break;
            case 'item-sells':
                $datas = $this->getItemSells($request);
                break;
            case 'product-category-sells':
                $datas = $this->getProductCategorySells($request);
                break;
            case 'top-products':
                $datas = $this->getTopProducts($request);
                break;
            case 'top-customers':
                $datas = $this->getTopCustomers($request);
                break;
            default:
                return abort(404);
        }

        return view('reports.index')->with([
            'datas' => $datas,
            'type' => $type,
        ]);
    }

    private function getStatistics(Request $request)
    {
        $now = Date('Y-m-d H:i:s');
        $startDate = $request->startDate ?? Date('Y-m-d H:i:s', strtotime("+1 month", strtotime($now)));
        $endDate = $request->endDate ?? $now;

        $totalOrder = 0;
        $totalItem = 0;
        $totalQty = 0;
        $totalShipment = 0;
        $totalDiscount = 0;
        $totalPayment = 0;

        $orders = Order::where('order_time', '>=', $startDate)
            ->where('order_time', '<=', $endDate)
            ->get();

        foreach ($orders as $order) {
            $orderItems = OrderDetail::where('order_id', $order->id)
                ->get();

            foreach ($orderItems as $item) {
                $totalQty += $item->qty;
                $totalItem++;
            }

            $totalOrder++;
            $totalShipment += $order->delivery_fee;
            $totalDiscount += $order->payment_discount;
            $totalPayment += $order->payment_final;
        }

        return [
            'totalOrder' => $totalOrder,
            'totalItem' => $totalItem,
            'totalQty' => $totalQty,
            'totalShipment' => $totalShipment,
            'totalDiscount' => $totalDiscount,
            'totalPayment' => $totalPayment,
        ];
    }

    private function getCustomerOrders(Request $request)
    {
        $now = Date('Y-m-d H:i:s');
        $startDate = $request->startDate ?? Date('Y-m-d H:i:s', strtotime("+1 month", strtotime($now)));
        $endDate = $request->endDate ?? $now;

        $customers = User::where('account_type', 4)
            ->paginate(10);

        foreach ($customers as $customer) {
            $orders = Order::where('customer_id', $customer->id)
                ->where('order_time', '>=', $startDate)
                ->where('order_time', '<=', $endDate)
                ->count();

            $customer['orders'] = $orders;
        }

        return $customers;
    }

    private function getAgentOrders(Request $request)
    {
        $now = Date('Y-m-d H:i:s');
        $startDate = $request->startDate ?? Date('Y-m-d H:i:s', strtotime("+1 month", strtotime($now)));
        $endDate = $request->endDate ?? $now;

        $agents = Agent::paginate(10);

        foreach ($agents as $agent) {
            $orders = Order::where('agent_name', $agent->partner_id)
                ->where('order_time', '>=', $startDate)
                ->where('order_time', '<=', $endDate)
                ->count();

            $agent['orders'] = $orders;
        }

        return $agents;
    }

    private function getProfits()
    {
        $agents = Agent::paginate(10);

        foreach ($agents as $agent) {
            $orders = Order::where('agent_name', $agent->partner_id)
                ->pluck('id');
            $orderItems = OrderDetail::whereIn('order_id', $orders)
                ->get();

            $price = 0;
            $priceAgent = 0;

            foreach ($orderItems as $item) {
                $price += $item->total_price;
                $priceAgent += ($item->qty * $item->price_agent);
            }

            $agent['profit'] = $price - $priceAgent;
        }

        return $agents;
    }

    private function getItemSells(Request $request)
    {
        $now = Date('Y-m-d H:i:s');
        $startDate = $request->startDate ?? Date('Y-m-d H:i:s', strtotime("+1 month", strtotime($now)));
        $endDate = $request->endDate ?? $now;

        $products = Product::paginate(10);
        foreach ($products as $product) {
            $itemIds = OrderDetail::where('product_id', $product->id)
                ->pluck('order_id');
            $orders = Order::whereIn('id', $itemIds)
                ->where('order_time', '>=', $startDate)
                ->where('order_time', '<=', $endDate)
                ->pluck('id');
            $orderItems = OrderDetail::whereIn('order_id', $orders)
                ->where('product_id', $product->id)
                ->get();

            $qty = 0;
            $price = 0;

            foreach ($orderItems as $item) {
                $qty += $item->qty;
                $price += $item->total_price;
            }

            $product['qty'] = $qty;
            $product['price'] = $price;
        }

        return $products;
    }

    private function getProductCategorySells(Request $request)
    {
        $now = Date('Y-m-d H:i:s');
        $startDate = $request->startDate ?? Date('Y-m-d H:i:s', strtotime("+1 month", strtotime($now)));
        $endDate = $request->endDate ?? $now;

        $categories = ProductCategory::paginate(10);
        foreach ($categories as $category) {
            $products = Product::where('category', $category->id)
                ->pluck('id');
            $itemIds = OrderDetail::whereIn('product_id', $products)
                ->pluck('order_id');
            $orders = Order::whereIn('id', $itemIds)
                ->where('order_time', '>=', $startDate)
                ->where('order_time', '<=', $endDate)
                ->pluck('id');
            $orderItems = OrderDetail::whereIn('order_id', $orders)
                ->whereIn('product_id', $products)
                ->get();

            $qty = 0;
            $price = 0;

            foreach ($orderItems as $item) {
                $qty += $item->qty;
                $price += $item->total_price;
            }

            $category['qty'] = $qty;
            $category['price'] = $price;
        }

        return $categories;
    }

    private function getTopProducts()
    {
        $tops = [];
        $products = Product::get()
            ->toArray();

        foreach ($products as $k => $product) {
            $orderItems = OrderDetail::where('product_id', $product['id'])
                ->sum('qty');

            $products[$k]['qty'] = $orderItems;
        }

        usort($products, function ($a, $b) {
            return $b['qty'] <=> $a['qty'];
        });

        return array_slice($products, 0, 10);
    }

    private function getTopCustomers()
    {
        $tops = [];
        $customers = User::where('account_type', 4)
            ->get()
            ->toArray();

        foreach ($customers as $k => $customer) {
            $orders = Order::where('customer_id', $customer['id'])
                ->pluck('id');
            $orderItems = OrderDetail::whereIn('order_id', $orders)
                ->sum('total_price');

            $customers[$k]['price'] = $orderItems;
        }

        usort($customers, function ($a, $b) {
            return $b['price'] <=> $a['price'];
        });

        return array_slice($customers, 0, 10);
    }
}
