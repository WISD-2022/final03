@extends('layouts.master')
@section('content')
<style>
    .br2{
        line-height:200px
    }
</style>
<br>
<header class="masthead">
    <div class="overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
                <div class="page-heading">
                    <br><center><h1><b>訂單明細</b></h1></center>
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
            <table class="table table-hover">
                <thead>
                <tr>
                    <br>
                    <th width="20%" style="text-align: center">名稱</th>
                    <th width="20%" style="text-align: center">單價</th>
                    <th width="10%" style="text-align: center">數量</th>
                    <th width="10%" style="text-align: center">小計</th>
                </tr>
                </thead>
                <tbody>
                    @foreach($items as $item)
                        <tr>
                            <td style="text-align: center;vertical-align: middle;line-height:40px;">
                                {{$item->name}}
                            </td>
                            <td style="text-align: center;vertical-align: middle;line-height:40px;">
                                ${{$item->price}}
                            </td>
                            <td style="text-align: center;vertical-align: middle;line-height:40px;">
                                {{$item->quantity}}
                            </td>
                            <td style="text-align: center;vertical-align: middle;line-height:40px;">
                                ${{($item->quantity)*($item->price)}}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div style="text-align:right">
                <b>總計：{{$total}} 元</b>
            </div>
            <br>
            <div align="center">
                <a class="btn btn-outline-success" href="{{route('order.history')}}">返回</a>
            </div>
        </div>
    </div>
    <div class="br2">
        <br>
    </div>
</div>
@endsection
