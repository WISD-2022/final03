@extends('admin.layouts.master')

@section('title', '主控台')

@section('content')
<style>
    .br2{
        line-height:486px
    }
</style>
<!-- Page Heading -->
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            主控台 <small></small>
        </h1>
        <ol class="breadcrumb">
            <li class="active">
                <i class="fa fa-dashboard"></i> 主控台
            </li>
        </ol>
    </div>
</div>
<!-- /.row -->
<div class="col-lg-12">
    <div class="alert alert-danger alert-dismissable">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <i class="fa fa-info-circle"></i>  <strong>可新增、刪除修改產品喔！！</strong>
    </div>
    <div class="alert alert-danger alert-dismissable">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <i class="fa fa-info-circle"></i>  <strong>可修改訂單狀態喔！！</strong>
    </div>
</div>
<div class="br2">
    <br>
</div>
<!-- /.row -->

@endsection
