@extends('layouts.master')
@section('title','修改會員資料')
@section('content')

<!-- Page Header -->
<br>
<header class="masthead" style="background-image: url('{{asset('images/user_edit_bg.jpeg')}}')">
    <div class="overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
                <div class="page-heading">
                    <center><h1>修改會員資料</h1></center>
                </div>
            </div>
        </div>
    </div>
</header>
<hr><br>
<!-- Main Content -->
<div class="container">
    <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
            <form action="/user/{{$user->id}}" method="POST" role="form">
                @method('PATCH')
                @csrf

                @if(session()->has('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif

                <div class="form-group">
                    <label for="name">會員名稱：</label><br>
                    <input name="name" value="{{$user->name}}" class="form-control">
                </div>
                <br>
                <div class="form-group">
                    <label for="email">電子郵件：</label><br>
                    {{$user->email}}
                </div>
                <br>
                <div class="form-group">
                    <label for="birthday">生日：</label><br>
                    <input type=date name="birthday" value="{{$user->birthday}}" class="form-control">
                </div>
                <br>
                <div class="form-group">
                    <label for="phone">電話：</label><br>
                    <input name="phone" value="{{$user->phone}}" class="form-control">
                </div>
                <br>
                <div class="form-group">
                    <label for="address">地址：</label><br>
                    <input name="address" value="{{$user->address}}" class="form-control">
                </div>
                <br><br>
                <center><input type="submit" class="btn btn-success" name="submit" value="修改"></center>
            </form>
            <br>
        </div>
    </div>
</div>
@endsection
