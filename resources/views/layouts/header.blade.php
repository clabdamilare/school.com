<nav class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme"
    id="layout-navbar">
    <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
        <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
            <i class="ti ti-menu-2 ti-md"></i>
        </a>
    </div>

    <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
        <!-- Search -->
        {{-- <div class="navbar-nav align-items-center">
            <div class="nav-item navbar-search-wrapper mb-0">
                <a class="nav-item nav-link search-toggler d-flex align-items-center px-0" href="javascript:void(0);">
                    <i class="ti ti-search ti-md me-2 me-lg-4 ti-lg"></i>
                    <span class="d-none d-md-inline-block text-muted fw-normal">Search (Ctrl+/)</span>
                </a>
            </div>
        </div> --}}
        <!-- /Search -->

        <ul class="navbar-nav flex-row align-items-center ms-auto">
            <!-- Language -->
            <li class="nav-item dropdown-language dropdown">
                <a class="nav-link btn btn-text-secondary btn-icon rounded-pill dropdown-toggle hide-arrow"
                    href="javascript:void(0);" data-bs-toggle="dropdown">
                    <i class="ti ti-language rounded-circle ti-md"></i>
                </a>
                <ul class="dropdown-menu dropdown-menu-end">
                    <li>
                        <a class="dropdown-item" href="javascript:void(0);" data-language="en"
                            data-text-direction="ltr">
                            <span>English</span>
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="javascript:void(0);" data-language="fr"
                            data-text-direction="ltr">
                            <span>French</span>
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="javascript:void(0);" data-language="ar"
                            data-text-direction="rtl">
                            <span>Arabic</span>
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="javascript:void(0);" data-language="de"
                            data-text-direction="ltr">
                            <span>German</span>
                        </a>
                    </li>
                </ul>
            </li>
            <!--/ Language -->

            <!-- Style Switcher -->
            <li class="nav-item dropdown-style-switcher dropdown">
                <a class="nav-link btn btn-text-secondary btn-icon rounded-pill dropdown-toggle hide-arrow"
                    href="javascript:void(0);" data-bs-toggle="dropdown">
                    <i class="ti ti-md"></i>
                </a>
                <ul class="dropdown-menu dropdown-menu-end dropdown-styles">
                    <li>
                        <a class="dropdown-item" href="javascript:void(0);" data-theme="light">
                            <span class="align-middle"><i class="ti ti-sun ti-md me-3"></i>Light</span>
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="javascript:void(0);" data-theme="dark">
                            <span class="align-middle"><i class="ti ti-moon-stars ti-md me-3"></i>Dark</span>
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="javascript:void(0);" data-theme="system">
                            <span class="align-middle"><i
                                    class="ti ti-device-desktop-analytics ti-md me-3"></i>System</span>
                        </a>
                    </li>
                </ul>
            </li>
            <!-- / Style Switcher-->

            <!-- Quick links  -->
            <li class="nav-item dropdown-shortcuts navbar-dropdown dropdown">
                <a class="nav-link btn btn-text-secondary btn-icon rounded-pill btn-icon dropdown-toggle hide-arrow"
                    href="javascript:void(0);" data-bs-toggle="dropdown" data-bs-auto-close="outside"
                    aria-expanded="false">
                    <i class="ti ti-layout-grid-add ti-md"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-end p-0">
                    <div class="dropdown-menu-header border-bottom">
                        <div class="dropdown-header d-flex align-items-center py-3">
                            <h6 class="mb-0 me-auto">Shortcuts</h6>
                            <a href="javascript:void(0)"
                                class="btn btn-text-secondary rounded-pill btn-icon dropdown-shortcuts-add"
                                data-bs-toggle="tooltip" data-bs-placement="top" title="Add shortcuts"><i
                                    class="ti ti-plus text-heading"></i></a>
                        </div>
                    </div>
                    <div class="dropdown-shortcuts-list scrollable-container">
                        <div class="row row-bordered overflow-visible g-0">
                            <div class="dropdown-shortcuts-item col">
                                <span class="dropdown-shortcuts-icon rounded-circle mb-3">
                                    <i class="ti ti-calendar ti-26px text-heading"></i>
                                </span>
                                <a href="app-calendar.html" class="stretched-link">Calendar</a>
                                <small>Appointments</small>
                            </div>
                            <div class="dropdown-shortcuts-item col">
                                <span class="dropdown-shortcuts-icon rounded-circle mb-3">
                                    <i class="ti ti-file-dollar ti-26px text-heading"></i>
                                </span>
                                <a href="app-invoice-list.html" class="stretched-link">Invoice App</a>
                                <small>Manage Accounts</small>
                            </div>
                        </div>
                        <div class="row row-bordered overflow-visible g-0">
                            <div class="dropdown-shortcuts-item col">
                                <span class="dropdown-shortcuts-icon rounded-circle mb-3">
                                    <i class="ti ti-user ti-26px text-heading"></i>
                                </span>
                                <a href="app-user-list.html" class="stretched-link">User App</a>
                                <small>Manage Users</small>
                            </div>
                            <div class="dropdown-shortcuts-item col">
                                <span class="dropdown-shortcuts-icon rounded-circle mb-3">
                                    <i class="ti ti-users ti-26px text-heading"></i>
                                </span>
                                <a href="app-access-roles.html" class="stretched-link">Role Management</a>
                                <small>Permission</small>
                            </div>
                        </div>
                        <div class="row row-bordered overflow-visible g-0">
                            <div class="dropdown-shortcuts-item col">
                                <span class="dropdown-shortcuts-icon rounded-circle mb-3">
                                    <i class="ti ti-device-desktop-analytics ti-26px text-heading"></i>
                                </span>
                                <a href="index.html" class="stretched-link">Dashboard</a>
                                <small>User Dashboard</small>
                            </div>
                            <div class="dropdown-shortcuts-item col">
                                <span class="dropdown-shortcuts-icon rounded-circle mb-3">
                                    <i class="ti ti-settings ti-26px text-heading"></i>
                                </span>
                                <a href="pages-account-settings-account.html" class="stretched-link">Setting</a>
                                <small>Account Settings</small>
                            </div>
                        </div>
                        <div class="row row-bordered overflow-visible g-0">
                            <div class="dropdown-shortcuts-item col">
                                <span class="dropdown-shortcuts-icon rounded-circle mb-3">
                                    <i class="ti ti-help ti-26px text-heading"></i>
                                </span>
                                <a href="pages-faq.html" class="stretched-link">FAQs</a>
                                <small>FAQs & Articles</small>
                            </div>
                            <div class="dropdown-shortcuts-item col">
                                <span class="dropdown-shortcuts-icon rounded-circle mb-3">
                                    <i class="ti ti-square ti-26px text-heading"></i>
                                </span>
                                <a href="modal-examples.html" class="stretched-link">Modals</a>
                                <small>Useful Popups</small>
                            </div>
                        </div>
                    </div>
                </div>
            </li>
            <!-- Quick links -->

            <!-- Notification -->
            <li class="nav-item dropdown-notifications navbar-dropdown dropdown me-3 me-xl-2">
                <a class="nav-link btn btn-text-secondary btn-icon rounded-pill dropdown-toggle hide-arrow"
                    href="javascript:void(0);" data-bs-toggle="dropdown" data-bs-auto-close="outside"
                    aria-expanded="false">
                    <span class="position-relative">
                        <i class="ti ti-bell ti-md"></i>
                        <span class="badge rounded-pill bg-danger badge-dot badge-notifications border"></span>
                    </span>
                </a>
                <ul class="dropdown-menu dropdown-menu-end p-0">
                    <li class="dropdown-menu-header border-bottom">
                        <div class="dropdown-header d-flex align-items-center py-3">
                            <h6 class="mb-0 me-auto">Notification</h6>
                            <div class="d-flex align-items-center h6 mb-0">
                                <span class="badge bg-label-primary me-2">8 New</span>
                                <a href="javascript:void(0)"
                                    class="btn btn-text-secondary rounded-pill btn-icon dropdown-notifications-all"
                                    data-bs-toggle="tooltip" data-bs-placement="top" title="Mark all as read"><i
                                        class="ti ti-mail-opened text-heading"></i></a>
                            </div>
                        </div>
                    </li>
                    <li class="dropdown-notifications-list scrollable-container">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item list-group-item-action dropdown-notifications-item">
                                <div class="d-flex">
                                    <div class="flex-shrink-0 me-3">
                                        <div class="avatar">
                                            <img src="{{ asset('backend/assets/img/avatars/1.png') }}" alt
                                                class="rounded-circle" />
                                        </div>
                                    </div>
                                    <div class="flex-grow-1">
                                        <h6 class="small mb-1">Congratulation Lettie 🎉</h6>
                                        <small class="mb-1 d-block text-body">Won the monthly best seller gold
                                            badge</small>
                                        <small class="text-muted">1h ago</small>
                                    </div>
                                    <div class="flex-shrink-0 dropdown-notifications-actions">
                                        <a href="javascript:void(0)" class="dropdown-notifications-read"><span
                                                class="badge badge-dot"></span></a>
                                        <a href="javascript:void(0)" class="dropdown-notifications-archive"><span
                                                class="ti ti-x"></span></a>
                                    </div>
                                </div>
                            </li>
                            <li class="list-group-item list-group-item-action dropdown-notifications-item">
                                <div class="d-flex">
                                    <div class="flex-shrink-0 me-3">
                                        <div class="avatar">
                                            <span class="avatar-initial rounded-circle bg-label-danger">CF</span>
                                        </div>
                                    </div>
                                    <div class="flex-grow-1">
                                        <h6 class="mb-1 small">Charles Franklin</h6>
                                        <small class="mb-1 d-block text-body">Accepted your connection</small>
                                        <small class="text-muted">12hr ago</small>
                                    </div>
                                    <div class="flex-shrink-0 dropdown-notifications-actions">
                                        <a href="javascript:void(0)" class="dropdown-notifications-read"><span
                                                class="badge badge-dot"></span></a>
                                        <a href="javascript:void(0)" class="dropdown-notifications-archive"><span
                                                class="ti ti-x"></span></a>
                                    </div>
                                </div>
                            </li>
                            <li
                                class="list-group-item list-group-item-action dropdown-notifications-item marked-as-read">
                                <div class="d-flex">
                                    <div class="flex-shrink-0 me-3">
                                        <div class="avatar">
                                            <img src="{{ asset('backend/assets/img/avatars/2.png') }}" alt
                                                class="rounded-circle" />
                                        </div>
                                    </div>
                                    <div class="flex-grow-1">
                                        <h6 class="mb-1 small">New Message ✉️</h6>
                                        <small class="mb-1 d-block text-body">You have new message from Natalie</small>
                                        <small class="text-muted">1h ago</small>
                                    </div>
                                    <div class="flex-shrink-0 dropdown-notifications-actions">
                                        <a href="javascript:void(0)" class="dropdown-notifications-read"><span
                                                class="badge badge-dot"></span></a>
                                        <a href="javascript:void(0)" class="dropdown-notifications-archive"><span
                                                class="ti ti-x"></span></a>
                                    </div>
                                </div>
                            </li>
                            <li class="list-group-item list-group-item-action dropdown-notifications-item">
                                <div class="d-flex">
                                    <div class="flex-shrink-0 me-3">
                                        <div class="avatar">
                                            <span class="avatar-initial rounded-circle bg-label-success"><i
                                                    class="ti ti-shopping-cart"></i></span>
                                        </div>
                                    </div>
                                    <div class="flex-grow-1">
                                        <h6 class="mb-1 small">Whoo! You have new order 🛒</h6>
                                        <small class="mb-1 d-block text-body">ACME Inc. made new order $1,154</small>
                                        <small class="text-muted">1 day ago</small>
                                    </div>
                                    <div class="flex-shrink-0 dropdown-notifications-actions">
                                        <a href="javascript:void(0)" class="dropdown-notifications-read"><span
                                                class="badge badge-dot"></span></a>
                                        <a href="javascript:void(0)" class="dropdown-notifications-archive"><span
                                                class="ti ti-x"></span></a>
                                    </div>
                                </div>
                            </li>
                            <li
                                class="list-group-item list-group-item-action dropdown-notifications-item marked-as-read">
                                <div class="d-flex">
                                    <div class="flex-shrink-0 me-3">
                                        <div class="avatar">
                                            <img src="{{ asset('backend/assets/img/avatars/9.png') }}" alt
                                                class="rounded-circle" />
                                        </div>
                                    </div>
                                    <div class="flex-grow-1">
                                        <h6 class="mb-1 small">Application has been approved 🚀</h6>
                                        <small class="mb-1 d-block text-body">Your ABC project application has been
                                            approved.</small>
                                        <small class="text-muted">2 days ago</small>
                                    </div>
                                    <div class="flex-shrink-0 dropdown-notifications-actions">
                                        <a href="javascript:void(0)" class="dropdown-notifications-read"><span
                                                class="badge badge-dot"></span></a>
                                        <a href="javascript:void(0)" class="dropdown-notifications-archive"><span
                                                class="ti ti-x"></span></a>
                                    </div>
                                </div>
                            </li>
                            <li
                                class="list-group-item list-group-item-action dropdown-notifications-item marked-as-read">
                                <div class="d-flex">
                                    <div class="flex-shrink-0 me-3">
                                        <div class="avatar">
                                            <span class="avatar-initial rounded-circle bg-label-success"><i
                                                    class="ti ti-chart-pie"></i></span>
                                        </div>
                                    </div>
                                    <div class="flex-grow-1">
                                        <h6 class="mb-1 small">Monthly report is generated</h6>
                                        <small class="mb-1 d-block text-body">July monthly financial report is
                                            generated </small>
                                        <small class="text-muted">3 days ago</small>
                                    </div>
                                    <div class="flex-shrink-0 dropdown-notifications-actions">
                                        <a href="javascript:void(0)" class="dropdown-notifications-read"><span
                                                class="badge badge-dot"></span></a>
                                        <a href="javascript:void(0)" class="dropdown-notifications-archive"><span
                                                class="ti ti-x"></span></a>
                                    </div>
                                </div>
                            </li>
                            <li
                                class="list-group-item list-group-item-action dropdown-notifications-item marked-as-read">
                                <div class="d-flex">
                                    <div class="flex-shrink-0 me-3">
                                        <div class="avatar">
                                            <img src="{{ asset('backend/assets/img/avatars/5.png') }}" alt
                                                class="rounded-circle" />
                                        </div>
                                    </div>
                                    <div class="flex-grow-1">
                                        <h6 class="mb-1 small">Send connection request</h6>
                                        <small class="mb-1 d-block text-body">Peter sent you connection request</small>
                                        <small class="text-muted">4 days ago</small>
                                    </div>
                                    <div class="flex-shrink-0 dropdown-notifications-actions">
                                        <a href="javascript:void(0)" class="dropdown-notifications-read"><span
                                                class="badge badge-dot"></span></a>
                                        <a href="javascript:void(0)" class="dropdown-notifications-archive"><span
                                                class="ti ti-x"></span></a>
                                    </div>
                                </div>
                            </li>
                            <li class="list-group-item list-group-item-action dropdown-notifications-item">
                                <div class="d-flex">
                                    <div class="flex-shrink-0 me-3">
                                        <div class="avatar">
                                            <img src="{{ asset('backend/assets/img/avatars/6.png') }}" alt
                                                class="rounded-circle" />
                                        </div>
                                    </div>
                                    <div class="flex-grow-1">
                                        <h6 class="mb-1 small">New message from Jane</h6>
                                        <small class="mb-1 d-block text-body">Your have new message from Jane</small>
                                        <small class="text-muted">5 days ago</small>
                                    </div>
                                    <div class="flex-shrink-0 dropdown-notifications-actions">
                                        <a href="javascript:void(0)" class="dropdown-notifications-read"><span
                                                class="badge badge-dot"></span></a>
                                        <a href="javascript:void(0)" class="dropdown-notifications-archive"><span
                                                class="ti ti-x"></span></a>
                                    </div>
                                </div>
                            </li>
                            <li
                                class="list-group-item list-group-item-action dropdown-notifications-item marked-as-read">
                                <div class="d-flex">
                                    <div class="flex-shrink-0 me-3">
                                        <div class="avatar">
                                            <span class="avatar-initial rounded-circle bg-label-warning"><i
                                                    class="ti ti-alert-triangle"></i></span>
                                        </div>
                                    </div>
                                    <div class="flex-grow-1">
                                        <h6 class="mb-1 small">CPU is running high</h6>
                                        <small class="mb-1 d-block text-body">CPU Utilization Percent is currently at
                                            88.63%,</small>
                                        <small class="text-muted">5 days ago</small>
                                    </div>
                                    <div class="flex-shrink-0 dropdown-notifications-actions">
                                        <a href="javascript:void(0)" class="dropdown-notifications-read"><span
                                                class="badge badge-dot"></span></a>
                                        <a href="javascript:void(0)" class="dropdown-notifications-archive"><span
                                                class="ti ti-x"></span></a>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </li>
                    <li class="border-top">
                        <div class="d-grid p-4">
                            <a class="btn btn-primary btn-sm d-flex" href="javascript:void(0);">
                                <small class="align-middle">View all notifications</small>
                            </a>
                        </div>
                    </li>
                </ul>
            </li>
            <!--/ Notification -->

            <!-- User -->
            <li class="nav-item navbar-dropdown dropdown-user dropdown">
                <a class="nav-link dropdown-toggle hide-arrow p-0" href="javascript:void(0);" data-bs-toggle="dropdown">
                    <div class="avatar avatar-online">
                        <img src="{{ asset('backend/assets/img/avatars/1.png') }}" alt class="rounded-circle" />
                    </div>
                </a>
                <ul class="dropdown-menu dropdown-menu-end">
                    <li>
                        <a class="dropdown-item mt-0" href="pages-account-settings-account.html">
                            <div class="d-flex align-items-center">
                                <div class="flex-shrink-0 me-2">
                                    <div class="avatar avatar-online">
                                        <img src="{{ asset('backend/assets/img/avatars/1.png') }}" alt
                                            class="rounded-circle" />
                                    </div>
                                </div>
                                <div class="flex-grow-1">
                                    <h6 class="mb-0">{{ Auth::user()->name }}</h6>
                                    <small class="text-muted">Admin</small>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <div class="dropdown-divider my-1 mx-n2"></div>
                    </li>
                    <li>
                        <a class="dropdown-item" href="pages-profile-user.html">
                            <i class="ti ti-user me-3 ti-md"></i><span class="align-middle">My Profile</span>
                        </a>
                    </li>


                    <li>
                        @php
                        // Determine the correct settings URL based on user type
                        $userType = Auth::user()->user_type;
                        $settingsUrl = '';

                        if ($userType == 1) {
                        $settingsUrl = route('admin/settings');
                        } elseif ($userType == 2) {
                        $settingsUrl = route('teacher/settings');
                        } elseif ($userType == 3) {
                        $settingsUrl = route('student/settings');
                        } elseif ($userType == 4) {
                        $settingsUrl = route('parent/settings');
                        }
                        @endphp

                        <a class="dropdown-item" href="{{ $settingsUrl }}">
                            <i class="ti ti-settings me-3 ti-md"></i>
                            <span class="align-middle">Settings</span>
                        </a>
                    </li>




                    <li>
                        <a class="dropdown-item" href="pages-account-settings-billing.html">
                            <span class="d-flex align-items-center align-middle">
                                <i class="flex-shrink-0 ti ti-file-dollar me-3 ti-md"></i><span
                                    class="flex-grow-1 align-middle">Billing</span>
                                <span
                                    class="flex-shrink-0 badge bg-danger d-flex align-items-center justify-content-center">4</span>
                            </span>
                        </a>
                    </li>
                    <li>
                        <div class="dropdown-divider my-1 mx-n2"></div>
                    </li>
                    <li>
                        <a class="dropdown-item" href="pages-pricing.html">
                            <i class="ti ti-currency-dollar me-3 ti-md"></i><span class="align-middle">Pricing</span>
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="pages-faq.html">
                            <i class="ti ti-question-mark me-3 ti-md"></i><span class="align-middle">FAQ</span>
                        </a>
                    </li>
                    <li>
                        <div class="d-grid px-2 pt-2 pb-1">
                            <a class="btn btn-sm btn-danger d-flex" href="{{ url('logout') }}">
                                <small class="align-middle">Logout</small>
                                <i class="ti ti-logout ms-2 ti-14px"></i>
                            </a>
                        </div>
                    </li>
                </ul>
            </li>
            <!--/ User -->
        </ul>
    </div>

    <!-- Search Small Screens -->
    <div class="navbar-search-wrapper search-input-wrapper d-none">
        <input type="text" class="form-control search-input container-xxl border-0" placeholder="Search..."
            aria-label="Search..." />
        <i class="ti ti-x search-toggler cursor-pointer"></i>
    </div>
</nav>






{{-- sidebar --}}




<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
        <a href="index.html" class="app-brand-link">
            <span class="app-brand-logo demo">
                <svg width="32" height="22" viewBox="0 0 32 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" clip-rule="evenodd"
                        d="M0.00172773 0V6.85398C0.00172773 6.85398 -0.133178 9.01207 1.98092 10.8388L13.6912 21.9964L19.7809 21.9181L18.8042 9.88248L16.4951 7.17289L9.23799 0H0.00172773Z"
                        fill="#7367F0" />
                    <path opacity="0.06" fill-rule="evenodd" clip-rule="evenodd"
                        d="M7.69824 16.4364L12.5199 3.23696L16.5541 7.25596L7.69824 16.4364Z" fill="#161616" />
                    <path opacity="0.06" fill-rule="evenodd" clip-rule="evenodd"
                        d="M8.07751 15.9175L13.9419 4.63989L16.5849 7.28475L8.07751 15.9175Z" fill="#161616" />
                    <path fill-rule="evenodd" clip-rule="evenodd"
                        d="M7.77295 16.3566L23.6563 0H32V6.88383C32 6.88383 31.8262 9.17836 30.6591 10.4057L19.7824 22H13.6938L7.77295 16.3566Z"
                        fill="#7367F0" />
                </svg>
            </span>
            <span class="app-brand-text demo menu-text fw-bold">Vuexy</span>
        </a>

        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto">
            <i class="ti menu-toggle-icon d-none d-xl-block align-middle"></i>
            <i class="ti ti-x d-block d-xl-none ti-md align-middle"></i>
        </a>
    </div>

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1">

        @if (Auth::user()->user_type == 1)
        <li class="menu-item @if (Request::segment(2) == 'dashboard') active @endif">
            <a href="{{ url('admin/dashboard') }}" class="menu-link">
                <i class="menu-icon tf-icons ti ti-device-desktop"></i>
                <div data-i18n="Dashboard">Dashboard</div>
            </a>
        </li>

        <li class="menu-item @if (Request::segment(2) == 'admin') active @endif">
            <a href="{{ url('admin/admin/list') }}" class="menu-link">
                <i class="menu-icon tf-icons ti ti-user-circle"></i>
                <div data-i18n="Admin">Admin</div>
            </a>
        </li>

        <li class="menu-item @if (Request::segment(2) == 'teacher') active @endif">
            <a href="{{ url('admin/teacher/list') }}" class="menu-link">
                <i class="menu-icon tf-icons ti ti-user-circle"></i>
                <div data-i18n="teacher">Teacher</div>
            </a>
        </li>

        <li class="menu-item @if (Request::segment(2) == 'student') active @endif">
            <a href="{{ url('admin/student/list') }}" class="menu-link">
                <i class="menu-icon tf-icons ti ti-backpack"></i>
                <div data-i18n="Student">Student</div>
            </a>
        </li>

        <li class="menu-item @if (Request::segment(2) == 'parent') active @endif">
            <a href="{{ url('admin/parent/list') }}" class="menu-link">
                <i class="menu-icon tf-icons ti ti-user-heart"></i>
                <div data-i18n="Parent">Parent</div>
            </a>
        </li>




         <!-- Dashboards -->
            <li class="menu-item @if (in_array(Request::segment(2), ['class', 'subject', 'assign_subject', 'class_timetable', 'assign_class_teacher'])) active open @endif">
    <a href="javascript:void(0);" class="menu-link menu-toggle">
        <i class="menu-icon tf-icons ti ti-smart-home"></i>
        <div data-i18n="Acedemic">Acedemic</div>
    </a>
    <ul class="menu-sub">
        <li class="menu-item @if (Request::segment(2) == 'class') active @endif">
            <a href="{{ url('admin/class/list') }}" class="menu-link">
                <div data-i18n="Class">Class</div>
            </a>
        </li>
        <li class="menu-item @if (Request::segment(2) == 'subject') active @endif">
            <a href="{{ url('admin/subject/list') }}" class="menu-link">
                <div data-i18n="Subject">Subject</div>
            </a>
        </li>
        <li class="menu-item @if (Request::segment(2) == 'assign_subject') active @endif">
            <a href="{{ url('admin/assign_subject/list') }}" class="menu-link">
                <div data-i18n="Assign subject">Assign subject</div>
            </a>
        </li>

        <li class="menu-item @if (Request::segment(2) == 'class_timetable') active @endif">
            <a href="{{ url('admin/class_timetable/list') }}" class="menu-link">
                <div data-i18n="Class Timetable">Class Timetable</div>
            </a>
        </li>

        <li class="menu-item @if (Request::segment(2) == 'assign_class_teacher') active @endif">
            <a href="{{ url('admin/assign_class_teacher/list') }}" class="menu-link">
                <div data-i18n="Assign Class Teacher">Assign Class Teacher</div>
            </a>
        </li>
    </ul>
</li>

  <!-- exam  -->

<li class="menu-item @if (in_array(Request::segment(3), ['exam', 'exam_schedule', 'marks_register'])) active open @endif">
    <a href="javascript:void(0);" class="menu-link menu-toggle">
        <i class="menu-icon tf-icons ti ti-smart-home"></i>
        <div data-i18n="Examination">Examination</div>
    </a>
    <ul class="menu-sub">
        <li class="menu-item @if (Request::segment(3) == 'exam') active @endif">
            <a href="{{ url('admin/examinations/exam/list') }}" class="menu-link">
                <div data-i18n="Exam List">Exam List</div>
            </a>
        </li>
        <li class="menu-item @if (Request::segment(3) == 'exam_schedule') active @endif">
            <a href="{{ url('admin/examinations/exam_schedule') }}" class="menu-link">
                <div data-i18n="Exam Schedule">Exam Schedule</div>
            </a>
        </li>

        <li class="menu-item @if (Request::segment(3) == 'marks_register') active @endif">
            <a href="{{ url('admin/examinations/marks_register') }}" class="menu-link">
                <div data-i18n="Marks Register">Marks Register</div>
            </a>
        </li>
    </ul>
</li>






        {{-- the change password side bar list you can uncommment if you want to still use --}}

        {{-- <li class="menu-item">
            <a href="{{ url('admin/change_password')}}"
                class="menu-link @if (Request::segment(2) == 'change_password') active @endif">
                <i class="menu-icon tf-icons ti ti-book"></i>

                <div data-i18n="Change Password">change_password</div>
            </a>
        </li> --}}
        @elseif (Auth::user()->user_type == 2) {{-- Teacher --}}
        <li class="menu-item @if (Request::segment(2) == 'dashboard') active @endif">
            <a href="{{ url('teacher/dashboard') }}" class="menu-link">
                <i class="menu-icon tf-icons ti ti-device-desktop"></i>
                <div data-i18n="Dashboard">Dashboard</div>
            </a>
        </li>

        <li class="menu-item @if (Request::segment(2) == 'my_student') active @endif">
            <a href="{{ url('teacher/my_student') }}" class="menu-link">
                <i class="menu-icon tf-icons ti ti-device-desktop"></i>
                <div data-i18n="My Student">My Student</div>
            </a>
        </li>

        <li class="menu-item @if (Request::segment(2) == 'my_class_subject') active @endif">
            <a href="{{ url('teacher/my_class_subject') }}" class="menu-link">
                <i class="menu-icon tf-icons ti ti-device-desktop"></i>
                <div data-i18n="My Class & Subject">My Class & Subject</div>
            </a>
        </li>

        <li class="menu-item @if (Request::segment(2) == 'my_exam_timetable') active @endif">
            <a href="{{ url('teacher/my_exam_timetable') }}" class="menu-link">
                <i class="menu-icon tf-icons ti ti-device-desktop"></i>
                <div data-i18n="My Exam Timetable">My Exam Timetable</div>
            </a>
        </li>

        <li class="menu-item @if (Request::segment(2) == 'my_calendar') active @endif">
            <a href="{{ url('teacher/my_calendar') }}" class="menu-link">
                <i class="menu-icon tf-icons ti ti-device-desktop"></i>
                <div data-i18n="My Calendar">My Calendar</div>
            </a>
        </li>



        {{-- you can still uncomment to get My Account list at sidebar --}}
        {{-- <li class="menu-item">
            <a href="{{ url('teacher/account')}}"
                class="menu-link @if (Request::segment(2) == 'account') active @endif">
                <i class="menu-icon tf-icons ti ti-device-desktop"></i>
                <div data-i18n="My Account">My Account</div>
            </a>
        </li> --}}

        {{-- the change password side bar list you can uncommment if you want to still use --}}

        {{-- <li class="menu-item">
            <a href="{{ url('teacher/change_password')}}"
                class="menu-link @if (Request::segment(2) == 'change_password') active @endif">
                <i class="menu-icon tf-icons ti ti-book"></i>

                <div data-i18n="Change Password">Change Password</div>
            </a>
        </li> --}}
        @elseif (Auth::user()->user_type == 3) {{-- Student --}}
        <li class="menu-item @if (Request::segment(2) == 'dashboard') active @endif">
            <a href="{{ url('student/dashboard') }}" class="menu-link">
                <i class="menu-icon tf-icons ti ti-device-desktop"></i>
                <div data-i18n="Dashboard">Dashboard</div>
            </a>
        </li>

        <li class="menu-item @if (Request::segment(2) == 'my_calendar') active @endif">
            <a href="{{ url('student/my_calendar') }}" class="menu-link">
                <i class="menu-icon tf-icons ti ti-device-desktop"></i>
                <div data-i18n="My Calendar">My Calendar</div>
            </a>
        </li>

        <li class="menu-item @if (Request::segment(2) == 'my_subject') active @endif">
            <a href="{{ url('student/my_subject') }}" class="menu-link">
                <i class="menu-icon tf-icons ti ti-device-desktop"></i>
                <div data-i18n="My Subject">My Subject</div>
            </a>
        </li>

        <li class="menu-item @if (Request::segment(2) == 'my_timetable') active @endif">
            <a href="{{ url('student/my_timetable') }}" class="menu-link">
                <i class="menu-icon tf-icons ti ti-device-desktop"></i>
                <div data-i18n="My Timetable">My Timetable</div>
            </a>
        </li>

        <li class="menu-item @if (Request::segment(2) == 'my_exam_timetable') active @endif">
            <a href="{{ url('student/my_exam_timetable') }}" class="menu-link">
                <i class="menu-icon tf-icons ti ti-device-desktop"></i>
                <div data-i18n="My Exam Timetable">My Exam Timetable</div>
            </a>
        </li>

        {{-- you can still uncomment to get My Account list at sidebar --}}
        {{-- <li class="menu-item">
            <a href="{{ url('student/account')}}"
                class="menu-link @if (Request::segment(2) == 'account') active @endif">
                <i class="menu-icon tf-icons ti ti-device-desktop"></i>
                <div data-i18n="My Account">My Account</div>
            </a>
        </li> --}}

        {{-- the change password side bar list you can uncommment if you want to still use --}}

        {{-- <li class="menu-item">
            <a href="{{ url('student/change_password')}}"
                class="menu-link @if (Request::segment(2) == 'change_password') active @endif">
                <i class="menu-icon tf-icons ti ti-book"></i>

                <div data-i18n="Change Password">change_password</div>
            </a>
        </li> --}}


       @elseif (Auth::user()->user_type == 4) {{-- Parent --}}
<li class="menu-item @if (Request::segment(2) == 'dashboard') active @endif">
    <a href="{{ url('parent/dashboard') }}" class="menu-link">
        <i class="menu-icon tf-icons ti ti-device-desktop"></i>
        <div data-i18n="Dashboard">Dashboard</div>
    </a>
</li>

<li class="menu-item @if (Request::segment(2) == 'my_student') active @endif">
    <a href="{{ url('parent/my_student') }}" class="menu-link">
        <i class="menu-icon tf-icons ti ti-device-desktop"></i>
        <div data-i18n="My Student">My Student</div>
    </a>
</li>

        {{-- you can still uncomment to get My Account list at sidebar --}}
        {{-- <li class="menu-item">
            <a href="{{ url('parent/account')}}" class="menu-link @if (Request::segment(2) == 'account') active @endif">
                <i class="menu-icon tf-icons ti ti-device-desktop"></i>
                <div data-i18n="My Account">My Account</div>
            </a>
        </li> --}}

        {{-- the change password side bar list you can uncommment if you want to still use --}}

        {{-- <li class="menu-item">
            <a href="{{ url('parent/change_password')}}"
                class="menu-link @if (Request::segment(2) == 'change_password') active @endif">
                <i class="menu-icon tf-icons ti ti-book"></i>

                <div data-i18n="Change Password">change_password</div>
            </a>
        </li> --}}
        @endif



        <li class="menu-item">
            <a href="{{ url('logout') }}" class="menu-link">
                <i class="menu-icon tf-icons ti ti-logout"></i>
                <div data-i18n="Logout">Logout</div>
            </a>
        </li>



    </ul>
</aside>
