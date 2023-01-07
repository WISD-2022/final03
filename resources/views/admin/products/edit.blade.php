@extends('admin.layouts.master')

@section('title', '編輯商品')

@section('content')
<!-- Page Heading -->
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            編輯產品 <small>編輯產品內容</small>
        </h1>
        <ol class="breadcrumb">
            <li class="active">
                <i class="fa fa-edit"></i> 商品管理
            </li>
        </ol>
    </div>
</div>
<!-- /.row -->

<div class="row">
    <div class="col-lg-12">
        <div class="alert alert-danger alert-dismissable">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <i class="fa fa-info-circle"></i>  <strong>警告！</strong> 請確認編輯內容：
        </div>
    </div>
</div>
<!-- /.row -->

<div class="row">
    <div class="col-lg-12">
        <form action="/admin/products/{{$products->id}}" method="POST" role="form">
        @method('PATCH')
        @csrf

        <!--名稱-->
            <div class="form-group">
                <label for="name">產品名稱：</label>
                <input id="name" name="name" class="form-control" placeholder="請輸入產品名稱" value="{{old('name',$products->name)}}">
            </div>
            <!--類型-->
            <div class="form-group">
                <label for="scent">香味：</label>
                <select id="scent" name="scent" class="form-control" value="{{old('name',$products->scent)}}">
                    <option value="植物精油皂">植物精油皂</option>
                    <option value="草本皂">草本皂</option>
                    <option value="無香純露皂">無香純露皂</option>
                    <option value="私房皂">私房皂</option>
                </select>
            </div>
            <!--商品內容-->
            <div class="form-group">
                <label for="description">商品內容：</label>
                <input id="description" name="description" class="form-control" placeholder="請輸入商品內容" value="{{old('name',$products->description)}}">
            </div>
            <!--價格-->
            <div class="form-group">
                <label for="price">價格：</label>
                <input id="price" name="price" class="form-control" placeholder="請輸入商品價格" value="{{old('name',$products->price)}}">
            </div>
            <!--庫存量-->
            <div class="form-group">
                <label for="inventory">庫存量：</label>
                <input id="inventory" name="inventory" class="form-control" placeholder="請輸入庫存量" value="{{old('name',$products->inventory)}}">
            </div>
            <!--圖片位置-->
            <div class="form-group">
                <label for="capacity">圖片位置：</label>
                <input id="picture" name="picture" class="form-control" placeholder="請輸入產品圖片位置" value="{{old('name',$products->picture)}}">
            </div>
            <!--狀態-->
            <div class="form-group">
                <label for="status">狀態：</label>
                <select id="status" name="status" class="form-control" value="{{old('name',$products->status)}}">
                    <option value="已上架">已上架</option>
                    <option value="未上架">未上架</option>
                </select>
            </div>
            <!--更新按鈕-->
            <div class="text-right">
                <button type="submit" class="btn btn-success">更新</button>
            </div>

        </form>

        <p>&nbsp;</p>
        <p>&nbsp;</p>
        <p>&nbsp;</p>

    </div>
</div>
<!-- /.row -->
@endsection
