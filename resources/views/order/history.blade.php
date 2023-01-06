@extends('layouts.master')
@section('content')
<style>
    .br1{
        line-height:14px
    }
    .br2{
        line-height:300px
    }
</style>
<br>
<header class="masthead">
    <div class="overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
                <div class="page-heading">
                    <br><center><h1><b>歷史訂單</b></h1></center>
                </div>
            </div>
        </div>
    </div>
</header>
<center><hr width="80%"></center>
<div class="container">
    <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
            @csrf
            @if(count($orders)>0)
                @if(session()->has('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <br>
                            <th width="20%" style="text-align: center">訂單編號</th>
                            <th width="20%" style="text-align: center">訂單時間</th>
                            <th width="10%" style="text-align: center">總金額</th>
                            <th width="10%" style="text-align: center">查看詳細</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($orders as $order)
                            <tr>
                                <td style="text-align: center;vertical-align: middle">
                                    {{$order->id}}
                                </td>
                                <td style="text-align: center;vertical-align: middle">
                                    {{$order->date}}<br>
                                </td>
                                <td style="text-align: center;vertical-align: middle">
                                    {{($order->sum)}}
                                </td>
                                <td style="text-align: center;vertical-align: middle">
{{--                                    <a class="btn btn-outline-primary btn-sm" href="{{route('order.item',$order->id)}}">商品明細</a>--}}
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                @else
                    <div style="text-align: center">
                        <div class="title-box">
                            <br><br><br><br><h2>您尚未訂購過商品哦！</h2>
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
</div>
@endsection
