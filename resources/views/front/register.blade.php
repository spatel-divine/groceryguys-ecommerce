@extends('front_layout.app')
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
                                            <h1 class="mb-5">Create an Account</h1>
                                            <p class="mb-30">Already have an account?
                                                <a href="{{ route('front.home.login') }}">Login</a>
                                            </p>
                                        </div>
                                        <form id="register_form" class="form-horizontal" method="POST"
                                            action="{{ route('front.home.register.store') }}"
                                            aria-label="{{ __('Login') }}" enctype="multipart/form-data">
                                            {{ csrf_field() }}

                                            <div class="form-group">
                                                <input type="text" name="name" placeholder="Name" />
                                            </div>
                                            <div class="form-group">
                                                <input type="text" name="email" placeholder="Email" />
                                            </div>
                                            <div class="form-group">
                                                <input type="password" name="password" id="password"
                                                    placeholder="Password" />
                                            </div>
                                            <div class="form-group">
                                                <input type="password" name="confirm_password" id="confirm_password"
                                                    placeholder="Confirm password" />
                                            </div>
                                            <div class="form-group">
                                                <input type="password" name="user_phone" id="user_phone"
                                                    placeholder="Phone Number" />
                                            </div>
                                            <div class="form-group">
                                                <input type="password" name="user_city" id="user_city"
                                                    placeholder="City Name" />
                                            </div>
                                            {{-- <div class="login_footer form-group">
                                                <div class="chek-form">
                                                    <input type="text" name="email"
                                                        placeholder="Security code *" />
                                                </div>
                                                <span class="security-code">
                                                    <b class="text-new">8</b>
                                                    <b class="text-hot">6</b>
                                                    <b class="text-sale">7</b>
                                                    <b class="text-best">5</b>
                                                </span>
                                            </div> --}}
                                            {{-- <div class="payment_option mb-50">
                                                <div class="custome-radio">
                                                    <input class="form-check-input" type="radio"
                                                        name="payment_option" value='1' id="exampleRadios3" checked="" />
                                                    <label class="form-check-label" for="exampleRadios3"
                                                        data-bs-toggle="collapse" data-target="#bankTranfer"
                                                        aria-controls="bankTranfer">I am a customer</label>
                                                </div>
                                                <div class="custome-radio">
                                                    <input class="form-check-input" type="radio"
                                                        name="payment_option" value='2' id="exampleRadios4" checked="" />
                                                    <label class="form-check-label" for="exampleRadios4"
                                                        data-bs-toggle="collapse" data-target="#checkPayment"
                                                        aria-controls="checkPayment">I am a vendor</label>
                                                </div>
                                            </div> --}}
                                            <div class="login_footer form-group mb-50">
                                                <div class="chek-form">
                                                    <div class="custome-checkbox">
                                                        <input class="form-check-input" type="checkbox" name="remember"
                                                            id="exampleCheckbox12" value="1" />
                                                        <label class="form-check-label" for="exampleCheckbox12"><span>I
                                                                agree to terms &amp; Policy.</span></label>
                                                    </div>
                                                </div>
                                                {{-- <a href="page-privacy-policy.html">
                                                    <i class="fi-rs-book-alt mr-5 text-muted"></i>Lean more
                                                </a> --}}
                                            </div>
                                            <div class="form-group mb-30">
                                                <button type="submit"
                                                    class="btn btn-fill-out btn-block hover-up font-weight-bold">Submit
                                                    &amp; Register</button>
                                            </div>
                                            <p class="font-xs text-muted"><strong>Note:</strong>Your personal data will be
                                                used to support your experience throughout this website, to manage access to
                                                your account, and for other purposes described in our privacy policy</p>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 pr-30 d-none d-lg-block">
                                <div class="card-login mt-115">
                                    <a href="#" class="social-login facebook-login">
                                        <img src="assets/imgs/theme/icons/logo-facebook.svg" alt="" />
                                        <span>Continue with Facebook</span>
                                    </a>
                                    <a href="#" class="social-login google-login">
                                        <img src="assets/imgs/theme/icons/logo-google.svg" alt="" />
                                        <span>Continue with Google</span>
                                    </a>
                                    <a href="#" class="social-login apple-login">
                                        <img src="assets/imgs/theme/icons/logo-apple.svg" alt="" />
                                        <span>Continue with Apple</span>
                                    </a>
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
            $("#register_form").validate({
                rules: {
                    name: {
                        required: true,
                    },
                    email: {
                        required: true,
                    },
                    password: {
                        required: true,
                        minlength: 8
                    },
                    confirm_password: {
                        required: true,
                        minlength: 8,
                        equalTo: "#password"
                    },
                    user_phone: {
                        required: true,
                    },
                    user_city: {
                        required: true,
                    },
                    // payment_option: {
                    //     required: true,
                    // },
                    remember: {
                        required: true,
                    },
                },
                messages: {
                    name: {
                        required: 'Please Enter Name.',
                    },
                    email: {
                        required: 'Please Enter Email-Address.',
                    },
                    password: {
                        required: 'Please Enter Password.',
                    },
                    confirm_password: {
                        required: 'Please Enter Password, same as Password.',
                    },
                    user_phone: {
                        required: 'Please Enter Phone Number.',
                    },
                    user_city: {
                        required: "Please Enter City Name",
                    },
                    // payment_option: {
                    //     required: 'Please Select Customer Type',
                    // },
                    remember: {
                        required: 'Please Select Terms and Policy.',
                    },
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
