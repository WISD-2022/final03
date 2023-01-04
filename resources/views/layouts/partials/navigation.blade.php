<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container px-lg-5">
        <img class="card-img-top" src="{{ url('picture/soap.png') }}" style="width:35px;height:35px">&ensp;
        <a class="navbar-brand" href="{{ route('home') }}">HS SHOP</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="{{ route('home') }}">SOAP</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">關於HS</a>
                </li>
                <!--<li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Dropdown
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="#">Action</a>
                        <a class="dropdown-item" href="#">Another action</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Something else here</a>
                    </div>
                </li>-->
            </ul>
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                {{--                <li class="nav-item"><a class="nav-link" href="#!">Contact</a></li>--}}
                <li class="nav-item"><a class="nav-link" href="{{route('user.edit')}}">會員資訊</a></li>
                <li class="nav-item"><a class="nav-link" href="#!">購物車</a></li>
            </ul>
        </div>
    </div>
</nav>
