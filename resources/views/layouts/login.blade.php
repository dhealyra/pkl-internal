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
                        <a href="../main/index.html" class="btn btn-primary w-100 py-8 mb-4 rounded-2">Sign In</a>
                        <div class="d-flex align-items-center justify-content-center">
                            <p class="fs-4 mb-0 fw-medium">New to Modernize?</p>
                            <a class="text-primary fw-medium ms-2" href="{{ route('register') }}">Create an
                            account</a>
                        </div>
                    </form>
                </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Theme Settings Button -->
    <button class="btn btn-primary p-3 rounded-circle d-flex align-items-center justify-content-center customizer-btn"
      type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasExample" aria-controls="offcanvasExample">
      <i class="icon ti ti-settings fs-7"></i>
    </button>

    <!-- Theme Customizer -->
    <div class="offcanvas customizer offcanvas-end" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
      <div class="d-flex align-items-center justify-content-between p-3 border-bottom">
        <h4 class="offcanvas-title fw-semibold" id="offcanvasExampleLabel">Settings</h4>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
      </div>

      <div class="offcanvas-body h-n80" data-simplebar>
        <!-- Theme Options -->
        <h6 class="fw-semibold fs-4 mb-2">Theme</h6>
        <div class="d-flex flex-row gap-3 customizer-box" role="group">
          <input type="radio" class="btn-check light-layout" name="theme-layout" id="light-layout" autocomplete="off" />
          <label class="btn p-9 btn-outline-primary rounded-2" for="light-layout">
            <i class="icon ti ti-brightness-up fs-7 me-2"></i>Light
          </label>

          <input type="radio" class="btn-check dark-layout" name="theme-layout" id="dark-layout" autocomplete="off" />
          <label class="btn p-9 btn-outline-primary rounded-2" for="dark-layout">
            <i class="icon ti ti-moon fs-7 me-2"></i>Dark
          </label>
        </div>

        <!-- Theme Direction -->
        <h6 class="mt-5 fw-semibold fs-4 mb-2">Theme Direction</h6>
        <div class="d-flex flex-row gap-3 customizer-box" role="group">
          <input type="radio" class="btn-check" name="direction-l" id="ltr-layout" autocomplete="off" />
          <label class="btn p-9 btn-outline-primary" for="ltr-layout">
            <i class="icon ti ti-text-direction-ltr fs-7 me-2"></i>LTR
          </label>

          <input type="radio" class="btn-check" name="direction-l" id="rtl-layout" autocomplete="off" />
          <label class="btn p-9 btn-outline-primary" for="rtl-layout">
            <i class="icon ti ti-text-direction-rtl fs-7 me-2"></i>RTL
          </label>
        </div>

        <!-- Theme Colors -->
        <h6 class="mt-5 fw-semibold fs-4 mb-2">Theme Colors</h6>
        <div class="d-flex flex-row flex-wrap gap-3 customizer-box color-pallete" role="group">
          @foreach(['Blue', 'Aqua', 'Purple', 'Green', 'Cyan', 'Orange'] as $theme)
            <input type="radio" class="btn-check" name="color-theme-layout" id="{{ $theme }}_Theme" autocomplete="off" />
            <label class="btn p-9 btn-outline-primary d-flex align-items-center justify-content-center"
              onclick="handleColorTheme('{{ $theme }}_Theme')" for="{{ $theme }}_Theme"
              data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="{{ strtoupper($theme) }}_THEME">
              <div class="color-box rounded-circle d-flex align-items-center justify-content-center skin-{{ $loop->index + 1 }}">
                <i class="ti ti-check text-white d-flex icon fs-5"></i>
              </div>
            </label>
          @endforeach
        </div>

        <!-- Layout Type -->
        <h6 class="mt-5 fw-semibold fs-4 mb-2">Layout Type</h6>
        <div class="d-flex flex-row gap-3 customizer-box" role="group">
          <input type="radio" class="btn-check" name="page-layout" id="vertical-layout" autocomplete="off" />
          <label class="btn p-9 btn-outline-primary" for="vertical-layout">
            <i class="icon ti ti-layout-sidebar-right fs-7 me-2"></i>Vertical
          </label>

          <input type="radio" class="btn-check" name="page-layout" id="horizontal-layout" autocomplete="off" />
          <label class="btn p-9 btn-outline-primary" for="horizontal-layout">
            <i class="icon ti ti-layout-navbar fs-7 me-2"></i>Horizontal
          </label>
        </div>

        <!-- Container Option -->
        <h6 class="mt-5 fw-semibold fs-4 mb-2">Container Option</h6>
        <div class="d-flex flex-row gap-3 customizer-box" role="group">
          <input type="radio" class="btn-check" name="layout" id="boxed-layout" autocomplete="off" />
          <label class="btn p-9 btn-outline-primary" for="boxed-layout">
            <i class="icon ti ti-layout-distribute-vertical fs-7 me-2"></i>Boxed
          </label>

          <input type="radio" class="btn-check" name="layout" id="full-layout" autocomplete="off" />
          <label class="btn p-9 btn-outline-primary" for="full-layout">
            <i class="icon ti ti-layout-distribute-horizontal fs-7 me-2"></i>Full
          </label>
        </div>

        <!-- Sidebar Type -->
        <h6 class="fw-semibold fs-4 mb-2 mt-5">Sidebar Type</h6>
        <div class="d-flex flex-row gap-3 customizer-box" role="group">
          <input type="radio" class="btn-check" name="sidebar-type" id="full-sidebar" autocomplete="off" />
          <label class="btn p-9 btn-outline-primary" for="full-sidebar">
            <i class="icon ti ti-layout-sidebar-right fs-7 me-2"></i>Full
          </label>

          <input type="radio" class="btn-check" name="sidebar-type" id="mini-sidebar" autocomplete="off" />
          <label class="btn p-9 btn-outline-primary" for="mini-sidebar">
            <i class="icon ti ti-layout-sidebar fs-7 me-2"></i>Collapse
          </label>
        </div>

        <!-- Card Style -->
        <h6 class="mt-5 fw-semibold fs-4 mb-2">Card With</h6>
        <div class="d-flex flex-row gap-3 customizer-box" role="group">
          <input type="radio" class="btn-check" name="card-layout" id="card-with-border" autocomplete="off" />
          <label class="btn p-9 btn-outline-primary" for="card-with-border">
            <i class="icon ti ti-border-outer fs-7 me-2"></i>Border
          </label>

          <input type="radio" class="btn-check" name="card-layout" id="card-without-border" autocomplete="off" />
          <label class="btn p-9 btn-outline-primary" for="card-without-border">
            <i class="icon ti ti-border-none fs-7 me-2"></i>Shadow
          </label>
        </div>
      </div>
    </div>
  </div>

  <div class="dark-transparent sidebartoggler"></div>

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
