<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Items;
use App\Models\Order;
use App\Http\Requests\UpdateCartRequest;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $name = Auth::user()->id;
        $carts = DB::table('carts')
            ->join('products', 'carts.products_id', '=', 'products.id')
            ->where('carts.users_id', $name)
            ->select('carts.id', 'products.name', 'carts.quantity', 'products.price','products.picture')
            ->get();
        ['carts'=>$carts];
        $total=0;
        foreach ($carts as $cart)
        {
            $total = ($cart->price)*($cart->quantity)+$total;
        }
        $data=['carts'=>$carts,'total'=>$total];
        return view('cart.index',$data);
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
     * @param  \App\Http\Requests\StoreCartRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Cart::create($request->all());
        return redirect()->route('cart.index')->with('status','已加入購物車');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function show(Cart $cart)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function edit(Cart $cart)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCartRequest  $request
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCartRequest $request, Cart $cart)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cart $cart,$id)
    {
        Cart::destroy($id);
        return redirect()->route('cart.index');
    }

    public function finish()
    {
        $user=Auth::user();

        /** @var TYPE_NAME $name */
        $name=Auth::user()->name;
        $id=Auth::user()->id;
        $carts = DB::table('carts')
            ->join('products', 'carts.products_id', '=', 'products.id')
            ->where('carts.users_id', $id)
            ->select('carts.id','products.name', 'carts.quantity', 'products.price')
            ->get();

        ['carts'=>$carts];
        $total=0;
        foreach ($carts as $cart)
        {
            $total = ($cart->price)*($cart->quantity)+$total;
        }
        $data=['name'=>$name,'carts'=>$carts,'total'=>$total,'user'=>$user,'id'=>$id];
        return view('cart.finish',$data);
    }

    public function clear()
    {
        $name=Auth::user()->id;
        Order::create([
            'users_id'=>$name,
            'date'=>Carbon::now(),
            'status'=>'未完成',
            'sum'=>0,
            'quantity'=>0,
        ]);

        $order_id=DB::table('orders')
            ->where('users_id',$name)
            ->orderBy('created_at','desc')
            ->select('id')
            ->first();

        $carts=DB::table('carts')
            ->join('products','carts.products_id','=','products.id')
            ->select('products.id','products.price','quantity')
            ->where('carts.users_id',$name)
            ->get();

        ['carts'=>$carts];
        $total=0;
        $sums=0;
        foreach ($carts as $cart)
        {
            Items::create([
                'orders_id'=>$order_id->id,
                'products_id'=>$cart->id,
                'quantity'=>$cart->quantity,
                'sum'=>$cart->price,
            ]);
            $total = ($cart->price)*($cart->quantity)+$total;
            $sums=$cart->quantity+$sums;
            Order::where('id',$order_id->id)->update(['quantity'=>$cart->quantity]);
        }
        Cart::where('users_id',$name)->delete();
        Order::where('id',$order_id->id)->update(['sum' =>$total]);

        return redirect()->route('product.index')->with('status','系統提示：訂單已送出！');
    }
}
