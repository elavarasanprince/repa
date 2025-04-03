<!DOCTYPE html>
<html lang="en">

<head>

    <meta name="description" content="REPA">

    <!-- ======== Page title ============ -->
    <title>REPA | Home</title>
    @include('includes.head')

</head>

<body>







   <section class="ptb-100">
   <div class="container">
                <div class="col-md-5 mx-auto">
                    <div class="auth-form">
                    <div class="auth-header">
                            <img src="assets/img/logo/logo.png" alt="">
                            <p>Admin Login</p>
                        </div>

                        <div class="row justify-content-center">
                            <div class="col-md-12">
                                <div class="card">


                                    <div class="card-body">






                                        <form method="POST" action="{{ route('login') }}">
                                            @csrf

                                            <div class="row mb-3">
                                                <label for="email" class="col-md-12 col-form-label "></label>

                                                <div class="col-md-12">
                                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                                    @error('email')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="row mb-3">
                                                <label for="password" class="col-md-12 col-form-label">{{ __('Password') }}</label>

                                                <div class="col-md-12">
                                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                                    @error('password')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="row mb-3">
                                                <div class="col-md-6 offset-md-4">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                                        <label class="form-check-label" for="remember">
                                                            {{ __('Remember Me') }}
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row mb-0">
                                                <div class="col-md-8 offset-md-4">
                                                    <button type="submit" class="btn btn-primary">
                                                        {{ __('Login') }}
                                                    </button>

                                                    <!-- @if (Route::has('password.request'))
                                                        <a class="btn btn-link" href="{{ route('password.request') }}">
                                                            {{ __('Forgot Your Password?') }}
                                                        </a>
                                                    @endif -->
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- <div class="auth-bottom mt-3">

                            <p class="auth-bottom-text">Don't have an account? <a href="register.php">Register.</a></p>
                        </div> -->

                    </div>
                </div>
            </div>
   </section>









@include('includes.script')

<script>
       // auth password view
   $('.password-view').on('click', function(){
    var pwd = document.getElementById('password');
    if (pwd.type === "password") {
        pwd.type = "text";
        $(this).addClass('show');
    } else {
        pwd.type = "password";
        $(this).removeClass('show');
    }
})
</script>

</body>

</html>
