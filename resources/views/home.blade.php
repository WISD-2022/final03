@extends('layouts.master')
@section('title','HS Shop - Home')
@section('content')
<style>
    .carousel-item {
        height: 65vh;
        min-height: 350px;
        background: no-repeat center center scroll;
        -webkit-background-size: cover;
        -moz-background-size: cover;
        -o-background-size: cover;
        background-size: cover;
    }
</style>
<!-- Header-->
<header>
    <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active" style="background-image: url({{asset('picture/one.jpg')}})">
                <div class="carousel-caption">
                    <h1>- HS SHOP -</h1>
                    <h6>簡單自然，讓洗澡成為最好的生活體驗。</h6>
                </div>
            </div>
        </div>
    </div>
</header>
<br>
<!-- Page Content -->
<div class="container">
    <div class="row">
        @foreach($product as $products)
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-0 shadow">
                <img src="{{$products->picture}}" class="card-img-top" alt="...">
                <div class="card-body text-center">
                    <h5 class="card-title mb-0">{{$products->name}}</h5>
                    <div class="card-text text-black-50">{{$products->content}}</div>
                    <br><a class="btn btn-outline-info btn-sm" href="{{route('product.detail',$products->id)}}">詳細資訊</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
