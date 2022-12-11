<?php

namespace App\Http\Controllers;

use App\Models\AdminOrder;
use App\Http\Requests\StoreAdmin_OrderRequest;
use App\Http\Requests\UpdateAdmin_OrderRequest;

class AdminOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
    public function edit(Admin_Order $admin_Order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateAdmin_OrderRequest  $request
     * @param  \App\Models\Admin_Order  $admin_Order
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAdmin_OrderRequest $request, Admin_Order $admin_Order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Admin_Order  $admin_Order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Admin_Order $admin_Order)
    {
        //
    }
}
