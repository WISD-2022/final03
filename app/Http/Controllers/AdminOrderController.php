<?php

namespace App\Http\Controllers;

use App\Models\AdminOrder;
use App\Models\Order;
use App\Models\Product;
use App\Http\Requests\StoreAdmin_OrderRequest;
use App\Http\Requests\UpdateAdmin_OrderRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use function Illuminate\Events\queueable;
class AdminOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders=Order::orderBy('id', 'asc')->get();
        $data=['order'=>$orders];
        return view('admin.orders.index', $data);
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
     * @param  \App\Http\Requests\StoreAdmin_OrderRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAdmin_OrderRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Admin_Order  $admin_Order
     * @return \Illuminate\Http\Response
     */
    public function show(Admin_Order $admin_Order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Admin_Order  $admin_Order
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $orders=Order::find($id);
        $data=['orders'=>$orders];
        return view('admin.orders.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateAdmin_OrderRequest  $request
     * @param  \App\Models\Admin_Order  $admin_Order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $orders=Order::find($id);
        $orders->update($request->all());
        return redirect()->route('admin.orders.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Admin_Order  $admin_Order
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        Order::destroy($id);
        return redirect()->route('admin.order.index');
    }
    public function order()
    {
        $data = DB::table('orders')->get();
        return view('order', ['order' => $data]);
    }
}
