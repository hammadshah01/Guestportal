@extends('front-layout.inc.layout')
@section('content')
    <div class="container">
        <div class="login-head">
            <a href="{{ url('/') }}" class="text-white">
                <div id="close-btn" class="float-end pt-4 me-5">
                    <i class="bi bi-x-square-fill"></i>
                </div>
            </a>
            <div class="form login-form w-25">
                <div class="form-group body-form">
                    <div class="nca-logo">
                        <center>
                            <img src="{{ asset('images/logo.png') }}" alt="">
                            <h3 style="font-family: poppins">Sign In</h3>
                        </center>

                    </div>

                    <div class="section pt-1">
                        @if (Session::has('error'))
                        <p class="alert alert-danger my-3">Invalid Login Credentials</p>
                    @endif

                        <form method="POST" action="{{ url('custom-login') }}">
                            @csrf()
                            <label for="" class="mt-3">Enter CNIC Number</label>
                            <input type="text" data-inputmask="'mask': '99999-9999999-9'" class="form form-control"
                                name="cnic" placeholder="XXXXX-XXXXXXX-X" id="">

                            <label for="" class="mt-3">Enter Email</label>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                name="email" placeholder="abc@example.com" value="{{ old('email') }}" required
                                autocomplete="email" autofocus>
                            <label for="" class="mt-3">Enter Password</label>

                            <input id="password" type="password"
                                class="form-control  @error('password') is-invalid @enderror" name="password" required
                                autocomplete="current-password">
                    </div>
                    <br>
                    <button class="btn btn-success my-3 col-12">Login</button>
                    </form>

                </div>

            </div>
        </div>
    </div>

    <script>
        $(":input").inputmask();
    </script>


@if (Session::has('error2'))

<script>
             alertify.set('notifier', 'position', 'top-right');
            alertify.error('Please Login to access further');
</script>

@endif

@endsection
