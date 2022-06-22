@extends('front_layout.app')
@section('title', 'Login')
@section('content')
    <main class="main pages">
        <div class="page-header breadcrumb-wrap">
            <div class="container">
                <div class="breadcrumb">
                    <a href="index.html" rel="nofollow"><i class="fi-rs-home mr-5"></i>Home</a>
                    <span></span> Pages <span></span> My Account
                </div>
            </div>
        </div>
        <div class="page-content pt-150 pb-150">
            <div class="container">
                <div class="row">
                    <div class="col-xl-8 col-lg-10 col-md-12 m-auto">
                        <div class="row">
                            <div class="col-lg-6 pr-30 d-none d-lg-block">
                                <img class="border-radius-15" src="assets/imgs/page/login-1.png" alt="" />
                            </div>
                            <div class="col-lg-6 col-md-8">
                                <div class="login_wrap widget-taber-content background-white">
                                    <div class="padding_eight_all bg-white">
                                        @if ($message = Session::get('error'))
                                            <div class="alert alert-danger alert-block">
                                                <strong>{{ $message }}</strong>
                                            </div>
                                        @endif

                                        @if ($message = Session::get('success'))
                                            <div class="alert alert-success alert-block">
                                                <strong>{{ $message }}</strong>
                                            </div>
                                        @endif

                                        <div class="heading_s1">
                                            <h1 class="mb-5">Login</h1>
                                            <p class="mb-30">Don't have an account?
                                                <a href="{{ route('front.home.register') }}">Create here</a>
                                            </p>
                                        </div>
                                        <form id="login_form" class="form-horizontal" method="POST"
                                            action="{{ route('front.home.login.process') }}"
                                            aria-label="{{ __('Login') }}" enctype="multipart/form-data">
                                            {{ csrf_field() }}

                                            <div class="form-group">
                                                <input type="text" name="email" placeholder="Email *" />
                                            </div>
                                            <div class="form-group">
                                                <input type="password" name="password" placeholder="Your password *" />
                                            </div>
                                            {{-- <div class="login_footer form-group">
                                                <div class="chek-form">
                                                    <input type="text" name="email" placeholder="Security code *" />
                                                </div>
                                                <span class="security-code">
                                                    <b class="text-new">8</b>
                                                    <b class="text-hot">6</b>
                                                    <b class="text-sale">7</b>
                                                    <b class="text-best">5</b>
                                                </span>
                                            </div> --}}
                                            <div class="login_footer form-group mb-50">
                                                <div class="chek-form">
                                                    <div class="custome-checkbox">
                                                        <input class="form-check-input" type="checkbox" name="remember"
                                                            id="exampleCheckbox1" value="1" />
                                                        <label class="form-check-label"
                                                            for="exampleCheckbox1"><span>Remember me</span></label>
                                                    </div>
                                                </div>
                                                <a class="text-muted" href="#">Forgot password?</a>
                                            </div>
                                            <div class="form-group">
                                                <button type="submit" class="btn btn-heading btn-block hover-up"
                                                    name="login">Log in</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    @push('footer_scripts')
        <script type="text/javascript">
            $("#login_form").validate({
                rules: {
                    email: {
                        required: true,
                    },
                    password: {
                        required: true,
                        minlength: 8
                    },
                },
                messages: {
                    email: {
                        required: 'Please Enter Email-Address.',
                    },
                    password: {
                        required: 'Please Enter Password.',
                    }
                },
                highlight: function(element) {
                    //$(element).attr('class', 'filde error-border');
                },
                unhighlight: function(element) {
                    //$(element).removeClass('error-border');
                },
                onfocusout: function(element) {},
                errorPlacement: function(error, element) {
                    if (element.hasClass('select2') && element.next('.select2-container').length) {
                        error.insertAfter(element.next('.select2-container'));
                    } else if (element.parent('.input-group').length) {
                        error.insertAfter(element.parent());
                    } else if (element.prop('type') === 'radio' && element.parent('.radio-inline').length) {
                        error.insertAfter(element.parent().parent());
                    } else if (element.prop('type') === 'checkbox' || element.prop('type') === 'radio') {
                        error.appendTo(element.parent().parent());
                    } else {
                        error.insertAfter(element);
                    }
                },
                submitHandler: function(form) {
                    $('#submit-loader').show();
                    form.submit();
                }
            });
        </script>

    @endpush
@endsection
