<!doctype html>
<!-- Coded is here -->
<html
  lang="en"
  class="light-style layout-navbar-fixed layout-menu-fixed layout-compact"
  dir="ltr"
  data-theme="theme-default"
  data-assets-path="{{ url('backend/assets/') }}/"

  data-template="vertical-menu-template"
  data-style="light">
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>School Management</title>

    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{asset('backend/assets/img/favicon/favicon.ico')}}" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&ampdisplay=swap"
      rel="stylesheet" />

    <!-- Icons -->
    <link rel="stylesheet" href="{{asset('backend/assets/vendor/fonts/fontawesome.css')}}" />
    <link rel="stylesheet" href="{{asset('backend/assets/vendor/fonts/tabler-icons.css')}}" />
    <link rel="stylesheet" href="{{asset('backend/assets/vendor/fonts/flag-icons.css')}}" />

    <!-- Core CSS -->

    <link rel="stylesheet" href="{{asset('backend/assets/vendor/css/rtl/core.css')}}" class="template-customizer-core-css" />
    <link rel="stylesheet" href="{{asset('backend/assets/vendor/css/rtl/theme-default.css')}}" class="template-customizer-theme-css" />

    <link rel="stylesheet" href="{{asset('backend/assets/css/demo.css')}}" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="{{asset('backend/assets/vendor/libs/node-waves/node-waves.css')}}" />

    <link rel="stylesheet" href="{{asset('backend/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css')}}" />
    <link rel="stylesheet" href="{{asset('backend/assets/vendor/libs/typeahead-js/typeahead.css')}}" />
    <link rel="stylesheet" href="{{asset('backend/assets/vendor/libs/apex-charts/apex-charts.css')}}" />


    <!-- SweetAlert CDN -->


<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@if ($sweetalert)
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            let isDarkMode = document.documentElement.getAttribute('data-style') === 'dark';
            let swalOptions = {
                background: isDarkMode ? "#25293c" : "#fff",
                color: isDarkMode ? "#fff" : "#000"
            };

            @if (!empty($sweetalert['errors']) && count($sweetalert['errors']) > 0)
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    html: '{!! implode("<br>", $sweetalert["errors"]->all()) !!}',
                    confirmButtonText: 'OK',
                    ...swalOptions
                });
            @endif

            @foreach (['success', 'error', 'warning', 'info', 'delete'] as $type)
                @if (!empty($sweetalert[$type]))
                    Swal.fire({
                        title: "{{ ucfirst($type) }}!",
                        text: "{{ $sweetalert[$type] }}",
                        icon: "{{ $type === 'delete' ? 'error' : $type }}",
                        confirmButtonText: 'OK',
                        ...swalOptions
                    });
                @endif
            @endforeach
        });
    </script>
@endif


    <!-- Page CSS -->

    <!-- Helpers -->
    <script src="{{asset('backend/assets/vendor/js/helpers.js')}}"></script>
    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->

    <!--? Template customizer: To hide customizer set displayCustomizer value false in config.js.  -->
    <script src="{{asset('backend/assets/vendor/js/template-customizer.js')}}"></script>

    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="{{asset('backend/assets/js/config.js')}}"></script>

    @yield('style')
  </head>

  <body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
      <div class="layout-container">
        <!-- Menu -->



        <!-- / Menu -->

        <!-- Layout container -->
        <div class="layout-page">

          <!-- Navbar -->
        @include('layouts.header')
          <!-- / Navbar -->

          <!-- Content wrapper -->

            <!-- Content -->
            @yield('content')
            <!-- / Content -->

            <!-- Footer -->
            @include('layouts.footer')
            <!-- / Footer -->


          <!-- Content wrapper -->
        </div>
        <!-- / Layout page -->
      </div>

      <!-- Overlay -->
      <div class="layout-overlay layout-menu-toggle"></div>

      <!-- Drag Target Area To SlideIn Menu On Small Screens -->
      <div class="drag-target"></div>
    </div>
    <!-- / Layout wrapper -->

    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->

    <script src="{{asset('backend/assets/vendor/libs/jquery/jquery.js')}}"></script>
    <script src="{{asset('backend/assets/vendor/libs/popper/popper.js')}}"></script>
    <script src="{{asset('backend/assets/vendor/js/bootstrap.js')}}"></script>
    <script src="{{asset('backend/assets/vendor/libs/node-waves/node-waves.js')}}"></script>
    <script src="{{asset('backend/assets/vendor/libs/hammer/hammer.js')}}"></script>
    <script src="{{asset('backend/assets/vendor/libs/i18n/i18n.js')}}"></script>
    <script src="{{asset('backend/assets/vendor/libs/typeahead-js/typeahead.js')}}"></script>
    <script src="{{asset('backend/assets/vendor/js/menu.js')}}"></script>

    <!-- endbuild -->

    <!-- Vendors JS -->
    <script src="{{asset('backend/assets/vendor/libs/apex-charts/apexcharts.js')}}"></script>

    <!-- Main JS -->
    <script src="{{asset('backend/assets/js/main.js')}}"></script>

    <!-- Page JS -->
    <script src="{{asset('backend/assets/js/dashboards-crm.js')}}"></script>

<!-- Load FullCalendar from CDN -->
<script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.15/index.global.min.js"></script>

<!-- Ensure all pages can inject scripts -->
@yield('script')
  </body>
</html>
