@extends('layouts.master')
@section('content')
    <style>
        .br2{
            line-height:45px
        }
    </style>
    <br>
    <header class="masthead">
        <div class="overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-10 mx-auto">
                    <div class="page-heading">
                        <br><center><h1><b>結帳</b></h1></center>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <center><hr width="80%"></center>
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
                <form action="/cart/clear" method="post" role="form">
                    @method('POST')
                    @csrf
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <br>
                            <th width="20%" style="text-align: center">名稱</th>
                            <th width="10%" style="text-align: center">單價</th>
                            <th width="10%" style="text-align: center">數量</th>
                            <th width="10%" style="text-align: center">小計</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($carts as $cart)
                            <tr>
                                <td style="text-align: center;vertical-align: middle">
                                    {{$cart->name}}
                                </td>
                                <td style="text-align: center;vertical-align: middle">
                                    ${{$cart->price}}
                                </td>
                                <td style="text-align: center;vertical-align: middle">
                                    {{$cart->quantity}}
                                </td>
                                <td style="text-align: center;vertical-align: middle">
                                    NT.{{($cart->quantity)*($cart->price)}}
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <div style="text-align:right">
                        <b>總計：NT.{{$total}}</b>
                    </div>
                    <br>
                    <div class="form-group">
                        <label for="name">收件人姓名：</label><br>
                        <input name="name" value="{{$name}}" class="form-control" disabled="true">
                        <br>
                        <label for="name">收件人電話：</label><br>
                        <input name="name" value="{{$user->phone}}" class="form-control" disabled="true">
                    </div>
                    <br>
                    <div style="text-align:center">
                        <a class="btn btn-outline-primary" href="{{route('cart.finish')}}">完成結帳</a>
                    </div>
            </div>
        </div>
        <div class="br2">
            <br>
        </div>
    </div>
@endsection
