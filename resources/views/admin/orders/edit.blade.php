@extends('admin.layouts.master')

@section('title', '訂單管理')

@section('content')
    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                訂單管理 <small>所有訂單列表</small>
            </h1>
            <ol class="breadcrumb">
                <li class="active">
                    <i class="fa fa-edit"></i> 訂單管理
                </li>
            </ol>
        </div>
    </div>
    <!-- /.row -->

    <!-- /.row -->
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="table-responsive">
                <form action="/admin/orders/{{$orders->id}}" method="POST" role="form">
                    @method('PATCH')
                    @csrf
                    <table class="table table-bordered table-hover">
                    <thead>
                    <tr>
                        <th width="60" style="text-align: center">訂單編號</th>
                        <th width="70" style="text-align: center">訂單日期</th>
                        <th width="70" style="text-align: center">總價</th>
                        <th width="70" style="text-align: center">目前狀態</th>
                        <th width="80" style="text-align: center">訂單操作</th>
                    </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td style="text-align: center">{{old('name',$orders->id)}}</td>
                            <td style="text-align: center">{{old('name',$orders->date)}}</td>
                            <td style="text-align: center">{{old('name',$orders->sum)}}</td>
                            <td style="text-align: center">
                                <select id="status" name="status" class="form-control" value="{{old('name',$orders->status)}}">
                                    <option value="{{old('name',$orders->status)}}">{{old('name',$orders->status)}}</option>
                                    @if($orders->status=='未完成')
                                        <option value="已完成">已完成</option>
                                    @else
                                        <option value="未完成">未完成</option>
                                    @endif
                                </select>
                            <td style="text-align: center">
                                <button type="submit" class="btn btn-success">更新</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
                    <h4 class="page-header">
                        購入產品:
                    </h4>
                    <?php
                        $product = DB::table('products')->orderBy('id','ASC')->get();
                        $item = DB::table('items')->where('orders_id','=',$orders->id)->orderBy('orders_id','ASC')->get();
                        ?>
                    @foreach($item as $items)
                        @foreach($product as $products)
                            @if($items->products_id == $products->id)
                                {{$products->name}}
                            @endif
                      @endforeach
                    @endforeach
                </form>
            </div>
        </div>
    </div>
</div>
    <!-- /.row -->
@endsection

