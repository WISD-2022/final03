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
<br><br>
<!-- Page Content -->
<center><h1><b>熱 銷 排 行</b></h1>
<hr width="15%"><br></center>
<div class="container">
    <div class="row">
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-0 shadow">
                <img src="/picture/四季平衡精油皂.jpg" class="card-img-top" alt="...">
                <div class="card-body text-center">
                    <h5 class="card-title mb-0">四季平衡精油皂</h5>
                    <div class="card-text text-black-50">「四季平衡」專為混合性肌膚設計，調理肌膚油脂分泌，使觸感柔嫩，飽滿水潤，從沐浴開始天天調理，讓肌膚油水分泌重新找回最佳的平衡性。	</div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-0 shadow">
                <img src="/picture/檸檬香桃木無香純露皂.jpg" class="card-img-top" alt="...">
                <div class="card-body text-center">
                    <h5 class="card-title mb-0">檸檬香桃木無香純露皂</h5>
                    <div class="card-text text-black-50">高溫下，細嫩型膚質需避免長時間汗水浸潤，本品專為敏弱肌『淨汗淨味』設計的檸檬香桃木純露手工皂，能溫和洗清全身油垢、汗水、汗味。</div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-0 shadow">
                <img src="/picture/艾草安神活力草本皂.jpg" class="card-img-top" alt="...">
                <div class="card-body text-center">
                    <h5 class="card-title mb-0">艾草安神活力草本皂</h5>
                    <div class="card-text text-black-50">全家洗澡都適合，家庭常備，以艾草精油、抹草、茶樹入皂，深層清潔肌膚，調理油脂分泌，洗感清爽不油膩，濃郁艾草香氣如影隨形，清香一洗難忘。	</div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-0 shadow">
                <img src="/picture/酪梨牛奶皂.jpg" class="card-img-top" alt="...">
                <div class="card-body text-center">
                    <h5 class="card-title mb-0">酪梨牛奶皂</h5>
                    <div class="card-text text-black-50">每塊蛋皂含一顆土雞蛋與5%以上精油，又香又甜的香氣特別濃郁，超高度鎖水力配方，想追求五星級保濕力的一定會愛不釋手。	</div>
                </div>
            </div>
        </div>
    </div>
    <br>
</div>
@endsection
