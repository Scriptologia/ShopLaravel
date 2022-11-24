<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Resources\Admin\OrderResource;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function  index()
    {
        $orders =[];
        $products = Product::select('id')->withTranslation()->get();
        $users = User::select('id', 'name')->get();
        $delivery_status = Order::$deliveryStatus;
        $paymentMethod = Order::$paymentMethod;
        return view('admin.orders', compact('orders', 'products', 'users', 'delivery_status', 'paymentMethod'));
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function apiGetOrders(Request $request)
    {
        $this->authorize('viewAny', Order::class);
        $search = $request->search;
        $delivery_status = $request->delivery_status;
        $payment_method = $request->payment_method;
        $filter = $request->filter;
        $created_at = json_decode($request->created_at);
        $order = $request->order;
        $dir = $request->dir;
        $orders = Order::withTrashed()->with('products', 'user')->search($search)
            ->when($delivery_status != null, function ($query) use($delivery_status) { $query->where('delivery_status', $delivery_status);})
            ->when($payment_method, function ($query) use($payment_method) { $query->where('payment_method', $payment_method);})
            ->when($filter, function ($query) use($filter) { $query->where($filter, '!=', null);})
            ->when($created_at, function($query, $created_at) { $query->whereBetween('created_at', $created_at); })
            ->when($order, function ($query, $order) use ($dir) { $query->orderBy($order, $dir); })
            ->paginate(10);
        return OrderResource::collection($orders);
    }

    public function apiOrderEdit(Request $request)
    {
        $order = Order::withTrashed()->find($request->id);
        $this->authorize('view', $order);
        return new OrderResource($order);
    }

    public function apiOrderUpdate(Request $request)
    {
        $validated = $request->validate([
            'user_id' => 'required',
            'amount' => 'required',
            'payment_method' => 'required',
            'delivery_status' => 'required',
            'product_ids' => 'required'
        ]);
        $id = (int)$request->id;
        if($request->id) {
            $order = Order::withTrashed()->find($id);
            $this->authorize('update', $order);
            $order->fill($request->all());
        }
        else {
            $this->authorize('create', Order::class);
            $request->request->add(['country' => 'Germany']);
            $order = Order::create($request->all());
            $order->payment_status = 0;
        }
        $order->products()->sync($request->product_ids);

        $order->save();
        return new OrderResource($order);
    }

    public function apiOrderDelete(Request $request)
    {
        $ids = $request->ids;
        $draftRemove = $request->draftRemove;
        if($draftRemove === "draft") {
            $this->authorize('restore', User::withTrashed()->first());
            Order::withTrashed()
                ->whereIn('id', $ids)
                ->restore();
        }
        else {
            $this->authorize('delete', Order::first());
            Order::destroy($ids);
        }

        return response()->json([ 'ids' => $ids ], 200);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::withTrashed()->get();
        $tags = Tag::withTrashed()->get();
        return view('admin.apps-ecommerce-add-Order', compact('categories', 'tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
//        $order = $id;
//        $id = $request->id;
        $order = Order::with('user', 'products')->findOrFail($id);
//        if()
        return view('admin.apps-ecommerce-order-details', compact('order'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        $categories = Category::withTrashed()->get();
        $tags = Tag::withTrashed()->get();
        return view('admin.apps-ecommerce-add-Order', compact('categories', 'tags'));
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
