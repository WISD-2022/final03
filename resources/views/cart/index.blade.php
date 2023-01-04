@extends('layouts.master')
@section('content')
<section class="py-5 bg-3">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
                <form action="/cart/store" method="post">
                    @method('POST')
                    @csrf
                    <input type="hidden" name="users_id" value="{{$name}}">
                    <table class="table table-bordered table-hover bg-white">
                        <thead>
                        <tr>
                            <th width="10%" style="text-align: center">圖片</th>
                            <th width="10%" style="text-align: center">名稱</th>
                            <th width="10%" style="text-align: center">價格</th>
                            <th width="10%" style="text-align: center">數量</th>
                            <th width="10%" style="text-align: center">小計</th>
                            <th width="10%" style="text-align: center">刪除</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($carts as $cart)
                                <tr>
                                    <td style="text-align: center;line-height:100px;vertical-align: middle">
                                        <img class="" src="{{ url($cart->picture) }}" style="width:100px;height:100px" >&nbsp&nbsp
                                    </td>
                                    <td style="text-align: center;line-height:100px;vertical-align: middle">
                                        {{$cart->name}}
                                    </td>
                                    <td style="text-align: center;line-height:100px;vertical-align: middle">
                                        ${{$cart->price}}
                                    </td>
                                    <td style="text-align: center;vertical-align: middle">
                                        {{$cart->amount}}
                                    </td>
                                    <td style="text-align: center;vertical-align: middle">
                                        ${{($cart->amount)*($cart->price)}}
                                    </td>
                                    <td style="text-align: center;vertical-align: middle">
                                        <form action="/cart/destroy/{{$cart->id}}" method="POST"style=" display: inline">
                                            @method('DELETE')
                                            @csrf
                                            <button type="submit" class="btn btn-danger">刪除</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div style="text-align:center">
                        <br>
                        <button type="submit" class="btn btn-outline-success mt-auto" name="products_id" value="{{$products->id}}">結帳</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection
