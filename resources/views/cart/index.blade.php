@extends('layouts.master')
@section('content')
<style>
    .br1{
        line-height:56px
    }
    .br2{
        line-height:233px
    }
</style>
<br>
<header class="masthead">
    <div class="overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
                <div class="page-heading">
                    <br><center><h1><b>購物車</b></h1></center>
                </div>
            </div>
        </div>
    </div>
</header>
<center><hr width="80%"></center>
<div class="container">
    <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
            @if(count($carts)>0)
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <br><th width="20%" style="text-align: center">名稱</th>
                            <th width="10%" style="text-align: center">價格</th>
                            <th width="10%" style="text-align: center">數量</th>
                            <th width="10%" style="text-align: center">小計</th>
                            <th width="15%" style="text-align: center">刪除</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($carts as $cart)
                            <tr>
                                <td style="text-align: center;line-height:100px;">
                                    {{$cart->name}}
                                </td>
                                <td style="text-align: center;line-height:100px;">
                                    ${{$cart->price}}
                                </td>
                                <td style="text-align: center;vertical-align: middle">
                                    {{$cart->quantity}}
                                </td>
                                <td style="text-align: center;vertical-align: middle">
                                    NT.{{($cart->quantity)*($cart->price)}}
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
                <div style="text-align:right">
                    <b>總計：NT.{{$total}}</b>
                </div>
                <div style="text-align:center">
{{--                    <a class="btn btn-sm btn-primary" href="{{route('cart.final')}}">結帳</a>--}}
                </div>
            @else
                <div style="text-align: center">
                    <div class="title-box">
                        <br><br><br><br><br><h2>購物車沒東西哦！快去購物吧！</h2>
                    </div>
                </div>
                <div class="br1">
                    <br>
                </div>
            @endif
        </div>
    </div>
    <div class="br2">
        <br>
    </div>
</div>
@endsection
