@extends('layouts.master')
@section('title','Handmade Soap Shop - Home')
@section('content')

<!-- Header-->
<header class="py-5">
    <div class="container px-lg-5">
        <div class="p-4 p-lg-5 bg-light rounded-3 text-center">
            <div class="m-4 m-lg-5">
                <h1 class="display-5 fw-bold">- 歡迎光臨 HS SHOP -</h1><br>
                <p class="fs-4">簡單自然，讓洗澡成為最好的生活體驗。</p>
{{--                <a class="btn btn-primary btn-lg" href="#!">Call to action</a>--}}
            </div>
        </div>
    </div>
</header>

<!-- Page Content -->
<div class="container">
    <div class="row">
        @foreach($product as $products)
        <!-- Team Member 1 -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-0 shadow">
                <img src="{{$products->picture}}" class="card-img-top" alt="...">
                <div class="card-body text-center">
                    <h5 class="card-title mb-0">{{$products->name}}</h5>
                    <div class="card-text text-black-50">{{$products->content}}</div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
