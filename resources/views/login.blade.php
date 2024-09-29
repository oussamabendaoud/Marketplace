@extends($active_theme)
@section('title')
<title>{{__('user.Login')}}</title>
@endsection

@section('frontend-content')
<!--=============================
        BREADCRUMB START
    ==============================-->
<section class="wsus__breadcrumb" style="background: url({{ asset('frontend/images/breadcrumb_bg.jpg') }});">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="wsus__breadcrumb_text">
                    <h1>{{__('user.sign in')}}</h1>
                    <ul class="d-flex flex-wrap">
                        <li><a href="{{ route('home') }}">{{__('user.home')}}</a></li>
                        <li><a href="javascript:;">{{__('user.sign in')}}</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<!--=============================
        BREADCRUMB END
    ==============================-->

<!--=============================
        SIGN IN START
    ==============================-->
<section class="wsus__sign_up wsus__sign_in mt_120 xs_mt_80 pb_120 xs_pb_80">
    <div class="container">
        <div class="row">
            <div class="col-xl-7 col-lg-9 m-auto">
                <div class="wsus__signup_text">
                    <h3>{{__('user.Login In')}}</h3>
                    <p class="description">
                        {{__('user.Welcome back! Login with your data you entered during registration')}}.</p>
                    <form action="{{ route('store-login') }}" method="POST" onsubmit="onClick(event)">
                        @csrf
                        <div class="row">
                            <div class="col-12">
                                <div class="wsus__comment_single_input">
                                    <fieldset>
                                        <legend>{{__('user.Email address')}}*</legend>
                                        <input type="email" name="email" placeholder="{{__('user.Email address')}}"
                                            required>
                                    </fieldset>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="wsus__comment_single_input">
                                    <fieldset>
                                        <legend>{{__('user.Password')}}*</legend>
                                        <input type="password" name="password" id="password_input"
                                            placeholder="Password" required>
                                        <span id="show_password"><i class="fas fa-eye-slash"></i></span>
                                    </fieldset>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="flexCheckDefault"
                                        name="remember">
                                    <label class="form-check-label" for="flexCheckDefault">
                                        {{__('user.Remember Me')}}
                                        <a href="{{ route('forget-password') }}">{{__('user.Forget Password')}}</a>
                                    </label>
                                </div>
                            </div>
                            <!-- reCAPTCHA token input field -->
                            <input type="hidden" name="recaptcha_token" id="recaptcha_token">
                            <div class="col-12">
                                <button type="submit" class="common_btn">{{__('user.Login')}}</button>
                            </div>
                        </div>
                    </form>
                    <p class="other_login">{{__('user.I have no account.')}} <a
                            href="{{ route('register') }}">{{__('user.Create Account')}}</a></p>
                </div>
            </div>
        </div>
    </div>
</section>
<!--=============================
        SIGN IN END
    ==============================-->
@endsection

@push('frontend_js')
<!-- Include Google reCAPTCHA Enterprise JS -->
<script src="https://www.google.com/recaptcha/enterprise.js?render=6LeXs1IqAAAAAEz7TH5bWh8Ph5V-OFfJ6Sx-gjbZ"></script>
<script>
function onClick(e) {
    e.preventDefault();
    grecaptcha.enterprise.ready(async () => {
        const token = await grecaptcha.enterprise.execute('6LeXs1IqAAAAAEz7TH5bWh8Ph5V-OFfJ6Sx-gjbZ', {
            action: 'LOGIN'
        });
        document.getElementById('recaptcha_token').value = token;
        // Now submit the form
        e.target.submit();
    });
}

"use strict";
let password_show = false;
(function($) {
    "use strict";
    $(document).ready(function() {
        $("#show_password").on("click", function() {
            password_show = !password_show;
            if (password_show) {
                $(this).html('<i class="fas fa-eye"></i>')
                $('#password_input').prop('type', 'text');
            } else {
                $(this).html('<i class="fas fa-eye-slash"></i>')
                $('#password_input').prop('type', 'password');
            }
        });
    });
})(jQuery);
</script>
@endpush