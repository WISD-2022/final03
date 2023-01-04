@extends('layouts.master')
@section('content')
<section class="py-1 bg-3">
    <div class="container px-4 px-lg-5 mt-5">
        <center>
            <h1><b>皂。SOAP</b></h1>
            <hr width="60%"><br><br>
        </center>
        <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
            @foreach($products as $product)
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-0 shadow">
                        <img src="../{{$product->picture}}" class="card-img-top" alt="...">
                        <div class="card-body text-center">
                            <h5 class="card-title mb-0">{{$product->name}}</h5>
                            <br><a class="btn btn-outline-info" href="{{route('product.detail',$product->id)}}">詳細資訊</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
@endsection
