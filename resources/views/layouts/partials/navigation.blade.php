<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container px-lg-5">
        <img class="card-img-top" src="{{ url('picture/soap.png') }}" style="width:35px;height:35px">&ensp;
        <a class="navbar-brand" href="{{ route('home') }}">HS SHOP</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('home') }}">首頁&ensp;</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="{{ route('product.index') }}">皂。SOAP&ensp;</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="{{route('cart.index')}}">購物車&ensp;</a>
                </li>
                @if(\Illuminate\Support\Facades\Auth::check())
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">{{ Auth::user()->name }}</a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="{{route('user.edit')}}">會員資料</a></li>
                            <li><a class="dropdown-item" href="{{route('order.history')}}">歷史訂單</a></li>
                            <li><a class="dropdown-item" href="{{ route('user.logout') }}">登出</a></li>
                        </ul>
                    </li>
                @else
                    <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">登入</a></li>
                @endif

            </ul>
        </div>
    </div>
</nav>
