@extends('layouts.master')
@section('content')
<style>
    .br1{
        line-height:255px
    }
</style>
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
                                <th width="10%" style="text-align: center">香味</th>
                                <th width="10%" style="text-align: center">數量</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($product as $products)
                            <tr>
                                <td style="text-align: center;line-height:100px;">
                                    <img class="" src="{{url($products->picture)}}" style="width:100px;height:100px" >
                                </td>
                                <td style="text-align: center;line-height:100px; width: 30%;">
                                    {{$products->name}}
                                </td>
                                <td style="text-align: center;line-height:100px;">
                                    ${{$products->price}}
                                </td>
                                <td style="text-align: center;line-height:100px;">
                                    {{$products->scent}}
                                </td>
                                <td style="text-align: center;vertical-align: middle;">
                                    <input style="width: 50%;" type="number" name="amount" min="1" max="99" value="1">
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <div style="text-align:center">
                        <br><button type="submit" class="btn btn-outline-success mt-auto" name="products_id" value="{{$products->id}}">加入購物車</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="br1">
        <br>
    </div>
</section>
@endsection
