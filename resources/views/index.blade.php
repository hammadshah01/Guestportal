@extends('front-layout.inc.layout')
@section('content')
    <nav class="navbar navbar-expand-lg px-4 navbar-light bg-light" id="navbar">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{ url('/') }}"><img src="{{ asset('images/logo.png') }}" width="60px"
                    height="auto" alt=""></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            @if (!Auth::check())
            <a style="text-decoration: none" href="{{url('signin')}}">
                <div class="collapse navbar-collapse nav-login" id="navbarNav">
                    <button class="login-btn ms-auto"><i class="fa-solid fa-square-plus"></i>&nbsp;Login</button>
                </div>
            </a>
            @else

<div class="row">
    @if(Auth::user()->role=='superadmin')
    <div class="col">

        <a href="{{url('/dashboard')}}"><button class="login-btn">Dashboard</button></a>
    </div>
@endif

@if (Auth::user()->role=='user')
<div class="col">

    <a href="{{url('/current-guest')}}"><button class="login-btn">Dashboard</button></a>
</div>
@endif

@if (Auth::user()->role=='moderator')
<div class="col">

    <a href="{{url('/addvisitor')}}"><button class="login-btn">Dashboard</button></a>
</div>
@endif



    <div class="col"> <a style="text-decoration: none" href="{{ route('logout') }}"
        onclick="event.preventDefault();
        document.getElementById('logout-form').submit();">

            <div class="collapse navbar-collapse " id="navbarNav">
                <button class="logout-btn ms-auto"><i class="fa fa-arrow-right-from-bracket"></i>&nbsp;Logout</button>
            </div>
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
        </form></div>
</div>


            @endif
        </div>
        <div class="green-border"></div>
    </nav>
    <div class="hero-section"
        style="background-image:linear-gradient(rgba(255, 255, 255, 0.9),rgba(255, 255, 255, 0.9)),url({{ asset('images/bg2.jpg') }});">

        <div class="hero-content ">
            <center>
                <div class="nca-hero-logo " data-aos="fade-up" data-aos-duration="3000">
                    <img src="{{ asset('images/logo.png') }}" width="170px" height="auto" alt="" class="mt-5">
                    <h5 class="mt-2 nca-title">WELCOME TO NATIONAL COLLAGE OF ARTS</h5>
                    <h1 class="hero-title"><span style="color:#4BAD46">GUEST</span>PORTAL</h1>
                </div>
            </center>
            <div class="container">
                <div class="search-box-con mt-5 " style="background-color: #fff">
                    <form action="{{ url('search-visitor') }}" method="POST">
                        @csrf()
                        <div class="form">
                            <div class="row g-0">
                                <div class="col-lg-10"><input class="w-100 py-3 cnic border-0" type="text"
                                        data-inputmask="'mask': '99999-9999999-9'" name="cnic" id="cnic"
                                        placeholder="ENTER CNIC NUMBER" required></div>
                                <div class="col-lg-2"><button class="search-btn  w-100 py-3">Search</button></div>
                            </div>
                        </div>
                    </form>
                </div>

            </div>

        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>





    {{-- making history tab --}}

    <div class="row side-btn col-lg-1 col-md-1 col-sm-4">
        <a href="{{ url('current-guest') }}">
            <div class="col-lg-4 col-md-12 side-his py-2 text-center text-white"><i class=" fa-regular fa-clock"></i></div>
        </a>
    </div>







    <!-- masking script below -->

    <script>
        $(":input").inputmask();
    </script>

    @if (Session::has('success1'))
        <script>
            alertify.set('notifier', 'position', 'top-right');
            alertify.success("User and Visit Added Successfully");
        </script>
    @endif

    @if (Session::has('success2'))
        <script>
            alertify.set('notifier', 'position', 'top-right');
            alertify.success("Visit Added Successfully");
        </script>
    @endif

    @if (Session::has('error'))
        <script>
            alertify.set('notifier', 'position', 'top-right');
            alertify.error('CNIC card already exisat');
        </script>
    @endif

    @if (Session::has('error2'))
        <script>
            alertify.set('notifier', 'position', 'top-right');
            alertify.error('Please Login to see results');
        </script>
    @endif

      @if (Session::has('success3'))
        <script>
            alertify.set('notifier', 'position', 'top-right');
            alertify.success('Login Successfull');
        </script>
    @endif

    @if (Session::has('error4'))
        <script>
            alertify.set('notifier', 'position', 'top-right');
            alertify.error('You have no further permission according to your role');
        </script>
    @endif

    @if (Session::has('error5'))
        <script>
            alertify.set('notifier', 'position', 'top-right');
            alertify.error('User already in NCA');
        </script>
    @endif



@endsection
