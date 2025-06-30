<!DOCTYPE html>
<html lang="en" dir="ltr" data-bs-theme="light" data-color-theme="Blue_Theme" data-layout="vertical">
<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Modernize Bootstrap Admin</title>

  <!-- Favicon -->
  <link rel="shortcut icon" type="image/png" href="{{ asset('assets/backend/images/logos/favicon.png') }}" />

  <!-- Core CSS -->
  <link rel="stylesheet" href="{{ asset('assets/backend/css/styles.css') }}" />
</head>
<body>
  <!-- Preloader -->
  <div class="preloader">
    <img src="{{ asset('assets/backend/images/logos/favicon.png') }}" alt="loader" class="lds-ripple img-fluid" />
  </div>

  <div id="main-wrapper" class="auth-customizer-none">
    <div class="position-relative overflow-hidden radial-gradient min-vh-100 w-100 d-flex align-items-center justify-content-center">
      <div class="d-flex align-items-center justify-content-center w-100">
        <div class="row justify-content-center w-100">
          <div class="col-md-8 col-lg-6 col-xxl-3 auth-card">
            <div class="card mb-0">
                <div class="card-body">
                    <a href="../main/index.html" class="text-nowrap logo-img text-center d-block mb-5 w-100">
                      <img src="{{ asset ('assets/backend/images/logos/dark-logo.svg') }}" class="dark-logo" alt="Logo-Dark" />
                      <img src="{{ asset('assets/backend/images/logos/light-logo.svg') }}" class="light-logo" alt="Logo-light" />
                    </a>
                    
                    <form  method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Username</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" id="exampleInputEmail1" aria-describedby="emailHelp" required autocomplete="email" autofocus>
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="exampleInputPassword1" class="form-label">Password</label>
                            <input  id="exampleInputPassword1" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="d-flex align-items-center justify-content-between mb-4">
                            <div class="form-check">
                            <input class="form-check-input primary" type="checkbox" value="" id="flexCheckChecked" checked>
                            <label class="form-check-label text-dark" for="flexCheckChecked">
                                Remeber this Device
                            </label>
                            </div>
                            @if (Route::has('password.request'))
                                <a class="text-primary fw-medium" href="{{ route('password.request') }}">
                                    Forgot Password ?
                                </a>
                            @endif
                        </div>
                        <button type="submit" class="btn btn-primary w-100 py-8 mb-4 rounded-2">Sign In</button>
                        <div class="d-flex align-items-center justify-content-center">
                            <p class="fs-4 mb-0 fw-medium">New to Modernize?</p>
                            <a class="text-primary fw-medium ms-2" href="{{ route('register') }}">Create an account</a>
                        </div>
                    </form>
                </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  <!-- JS Files -->
  <script>
    function handleColorTheme(e) {
      document.documentElement.setAttribute("data-color-theme", e);
    }
  </script>
  <script src="{{ asset('assets/backend/libs/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('assets/backend/libs/simplebar/dist/simplebar.min.js') }}"></script>
  <script src="{{ asset('assets/backend/js/theme/app.init.js') }}"></script>
  <script src="{{ asset('assets/backend/js/theme/theme.js') }}"></script>
  <script src="{{ asset('assets/backend/js/theme/app.min.js') }}"></script>
  <script src="https://cdn.jsdelivr.net/npm/iconify-icon@1.0.8/dist/iconify-icon.min.js"></script>
</body>
</html>
