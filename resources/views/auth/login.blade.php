<!doctype html>
<html
  lang="en"
  class="light-style layout-wide customizer-hide"
  dir="ltr"
  data-theme="theme-default"
  data-assets-path="{{ url('backend/assets/') }}/"

  data-template="vertical-menu-template"
  data-style="light"
>


<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        let isDarkMode = document.documentElement.getAttribute('data-style') === 'dark';
        let swalOptions = {
            background: isDarkMode ? "#1e1e1e" : "#fff", // Dark mode background
            color: isDarkMode ? "#fff" : "#000" // Text color
        };

        @if ($errors->any())
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                html: '{!! implode("<br>", $errors->all()) !!}',
                confirmButtonText: 'OK',
                ...swalOptions
            });
        @endif

        @if(session('success'))
            Swal.fire({
                title: "Success!",
                text: "{{ session('success') }}",
                icon: "success",
                confirmButtonText: "OK",
                ...swalOptions
            });
        @endif

        @if(session('error'))
            Swal.fire({
                title: "Error!",
                text: "{{ session('error') }}",
                icon: "error",
                confirmButtonText: "OK",
                ...swalOptions
            });
        @endif

        @if(session('warning'))
            Swal.fire({
                title: "Warning!",
                text: "{{ session('warning') }}",
                icon: "warning",
                confirmButtonText: "OK",
                ...swalOptions
            });
        @endif

        @if(session('info'))
            Swal.fire({
                title: "Information",
                text: "{{ session('info') }}",
                icon: "info",
                confirmButtonText: "OK",
                ...swalOptions
            });
        @endif

        @if(session('delete'))
            Swal.fire({
                title: "Deleted!",
                text: "{{ session('delete') }}",
                icon: "error",
                confirmButtonText: "OK",
                ...swalOptions
            });
        @endif
    });
</script>

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />
    <title>Admin Login</title>
    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{ asset('backend/assets/img/favicon/favicon.ico') }}" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Public+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet" />

    <!-- Icons -->
    <link rel="stylesheet" href="{{ asset('backend/assets/vendor/fonts/fontawesome.css') }}" />
    <link rel="stylesheet" href="{{ asset('backend/assets/vendor/fonts/tabler-icons.css') }}" />
    <link rel="stylesheet" href="{{ asset('backend/assets/vendor/fonts/flag-icons.css') }}" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="{{ asset('backend/assets/vendor/css/rtl/core.css') }}" class="template-customizer-core-css" />
    <link rel="stylesheet" href="{{ asset('backend/assets/vendor/css/rtl/theme-default.css') }}" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="{{ asset('backend/assets/css/demo.css') }}" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="{{ asset('backend/assets/vendor/libs/node-waves/node-waves.css') }}" />
    <link rel="stylesheet" href="{{ asset('backend/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css') }}" />
    <link rel="stylesheet" href="{{ asset('backend/assets/vendor/libs/typeahead-js/typeahead.css') }}" />
    <link rel="stylesheet" href="{{ asset('backend/assets/vendor/libs/@form-validation/form-validation.css') }}" />

    <!-- Page CSS -->
    <link rel="stylesheet" href="{{ asset('backend/assets/vendor/css/pages/page-auth.css') }}" />

    <!-- Helpers -->
    <script src="{{ asset('backend/assets/vendor/js/helpers.js') }}"></script>
    <script src="{{ asset('backend/assets/vendor/js/template-customizer.js') }}"></script>
    <script src="{{ asset('backend/assets/js/config.js') }}"></script>
</head>

<body>
    <div class="authentication-wrapper authentication-cover">
        <a href="index.html" class="app-brand auth-cover-brand">
            <span class="app-brand-logo demo">
                <svg width="32" height="22" viewBox="0 0 32 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M0.00172773 0V6.85398C0.00172773 6.85398 -0.133178 9.01207 1.98092 10.8388L13.6912 21.9964L19.7809 21.9181L18.8042 9.88248L16.4951 7.17289L9.23799 0H0.00172773Z" fill="#7367F0" />
                </svg>
            </span>
            <span class="app-brand-text demo text-heading fw-bold">Vuexy</span>
        </a>

        <div class="authentication-inner row m-0">
            <div class="d-none d-lg-flex col-lg-8 p-0">
                <div class="auth-cover-bg auth-cover-bg-color d-flex justify-content-center align-items-center">
                    <img src="{{ asset('backend/assets/img/illustrations/auth-login-illustration-light.png') }}" alt="auth-login-cover" class="my-5 auth-illustration" />
                    <img src="{{ asset('backend/assets/img/illustrations/bg-shape-image-light.png') }}" alt="auth-login-cover" class="platform-bg" />
                </div>
            </div>

            <!-- Login Form -->
            <div class="d-flex col-12 col-lg-4 align-items-center authentication-bg p-sm-12 p-6">
                <div class="w-px-400 mx-auto mt-12 pt-5">
                    <h4 class="mb-1">Welcome to Vuexy! 👋</h4>
                    <p class="mb-6">Please sign-in to your account and start the adventure</p>



                    <form action="{{ url('login')}}" method="post" id="formAuthentication" class="mb-6 fv-plugins-bootstrap5 fv-plugins-framework" action="index.html" novalidate="novalidate">
                        {{  csrf_field() }}
                        <div class="mb-6 fv-plugins-icon-container">
                        <label for="email" class="form-label">Email or Username</label>
                        <input type="text" class="form-control" id="email" name="email" placeholder="Enter your email or username" autofocus="">
                      <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div></div>
                      <div class="mb-6 form-password-toggle fv-plugins-icon-container">
                        <label class="form-label" for="password">Password</label>
                        <div class="input-group input-group-merge has-validation">
                          <input type="password" id="password" class="form-control" name="password" placeholder="············" aria-describedby="password">
                          <span class="input-group-text cursor-pointer"><i class="ti ti-eye-off"></i></span>
                        </div><div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div>
                      </div>
                      <div class="my-8">
                        <div class="d-flex justify-content-between">
                          <div class="form-check mb-0 ms-2">
                            <input class="form-check-input" type="checkbox" id="remember-me" name="remeber">
                            <label class="form-check-label" for="remember-me"> Remember Me </label>
                          </div>
                          <a href="{{ url('forgot-Password')}}">
                            <p class="mb-0">Forgot Password?</p>
                          </a>
                        </div>
                      </div>
                      <button class="btn btn-primary d-grid w-100 waves-effect waves-light">Sign in</button>
                    <input type="hidden"></form>

                    <p class="text-center">
                      <span>New on our platform?</span>
                      <a href="auth-register-cover.html">
                        <span>Create an account</span>
                      </a>
                    </p>

                    {{-- <div class="divider my-6">
                      <div class="divider-text">or</div>
                    </div>

                    <div class="d-flex justify-content-center">
                      <a href="javascript:;" class="btn btn-sm btn-icon rounded-pill btn-text-facebook me-1_5 waves-effect waves-light">
                        <i class="tf-icons ti ti-brand-facebook-filled"></i>
                      </a>

                      <a href="javascript:;" class="btn btn-sm btn-icon rounded-pill btn-text-twitter me-1_5 waves-effect waves-light">
                        <i class="tf-icons ti ti-brand-twitter-filled"></i>
                      </a>

                      <a href="javascript:;" class="btn btn-sm btn-icon rounded-pill btn-text-github me-1_5 waves-effect waves-light">
                        <i class="tf-icons ti ti-brand-github-filled"></i>
                      </a>

                      <a href="javascript:;" class="btn btn-sm btn-icon rounded-pill btn-text-google-plus waves-effect waves-light">
                        <i class="tf-icons ti ti-brand-google-filled"></i>
                      </a>
                    </div> --}}
                  </div>
            </div>
        </div>
    </div>

    <!-- Core JS -->
    <script src="{{ asset('backend/assets/vendor/libs/jquery/jquery.js') }}"></script>
    <script src="{{ asset('backend/assets/vendor/libs/popper/popper.js') }}"></script>
    <script src="{{ asset('backend/assets/vendor/js/bootstrap.js') }}"></script>
    <script src="{{ asset('backend/assets/vendor/libs/node-waves/node-waves.js') }}"></script>
    <script src="{{ asset('backend/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js') }}"></script>
    <script src="{{ asset('backend/assets/vendor/libs/hammer/hammer.js') }}"></script>
    <script src="{{ asset('backend/assets/vendor/libs/i18n/i18n.js') }}"></script>
    <script src="{{ asset('backend/assets/vendor/libs/typeahead-js/typeahead.js') }}"></script>
    <script src="{{ asset('backend/assets/vendor/js/menu.js') }}"></script>

    <!-- Vendors JS -->
    <script src="{{ asset('backend/assets/vendor/libs/@form-validation/popular.js') }}"></script>
    <script src="{{ asset('backend/assets/vendor/libs/@form-validation/bootstrap5.js') }}"></script>
    <script src="{{ asset('backend/assets/vendor/libs/@form-validation/auto-focus.js') }}"></script>

    <!-- Main JS -->
    <script src="{{ asset('backend/assets/js/main.js') }}"></script>

    <!-- Page JS -->
    <script src="{{ asset('backend/assets/js/pages-auth.js') }}"></script>
</body>
</html>
