@extends('layouts.app')

@section('content')
<div class="content-wrapper">
<div class="container-xxl flex-grow-1 container-p-y">


    <div class="col-md-12">
        <div class="nav-align-top">
            <ul class="nav nav-pills flex-column flex-md-row mb-6 gap-2 gap-lg-0">
                <li class="nav-item">
                    @php
                        // Determine the correct URL for Settings based on user type
                        $userType = Auth::user()->user_type;
                        $settingsUrl = '';

                        if ($userType == 1) {
                            $settingsUrl = url('admin/settings');
                        } elseif ($userType == 2) {
                            $settingsUrl = url('teacher/settings');
                        } elseif ($userType == 3) {
                            $settingsUrl = url('student/settings');
                        } elseif ($userType == 4) {
                            $settingsUrl = url('parent/settings');
                        }
                    @endphp
                    <a class="nav-link waves-effect waves-light @if(Request::segment(2) == 'settings') active @endif" href="{{ $settingsUrl }}">
                        <i class="ti-sm ti ti-users me-1_5"></i> Account
                    </a>
                </li>

                <li class="nav-item">
                    @php
                        // Determine the correct URL for Security based on user type
                        $changePasswordUrl = '';

                        if ($userType == 1) {
                            $changePasswordUrl = url('admin/change_password');
                        } elseif ($userType == 2) {
                            $changePasswordUrl = url('teacher/change_password');
                        } elseif ($userType == 3) {
                            $changePasswordUrl = url('student/change_password');
                        } elseif ($userType == 4) {
                            $changePasswordUrl = url('parent/change_password');
                        }
                    @endphp
                    <a class="nav-link waves-effect waves-light @if(Request::segment(2) == 'change_password') active @endif" href="{{ $changePasswordUrl }}">
                        <i class="ti-sm ti ti-lock me-1_5"></i> Security
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link waves-effect waves-light" href="pages-account-settings-billing.html">
                        <i class="ti-sm ti ti-bookmark me-1_5"></i> Billing &amp; Plans
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link waves-effect waves-light" href="pages-account-settings-notifications.html">
                        <i class="ti-sm ti ti-bell me-1_5"></i> Notifications
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link waves-effect waves-light" href="pages-account-settings-connections.html">
                        <i class="ti-sm ti ti-link me-1_5"></i> Connections
                    </a>
                </li>
            </ul>
        </div>


        <!-- Change Password -->
        <div class="card mb-6">
          <h5 class="card-header">Change Password</h5>
          <div class="card-body pt-1">
            <form method="POST"  action="" id="formAccountSettings">
                {{  csrf_field() }}
                <div class="row">
                <div class="mb-6 col-md-6 form-password-toggle fv-plugins-icon-container">
                  <label class="form-label" for="currentPassword">Current Password</label>
                  <div class="input-group input-group-merge has-validation">
                    <input class="form-control" type="password" name="currentPassword" required id="currentPassword" placeholder="············">
                    <span class="input-group-text cursor-pointer"><i class="ti ti-eye-off"></i></span>
                  </div><div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div>
                </div>
              </div>
              <div class="row">
                <div class="mb-6 col-md-6 form-password-toggle fv-plugins-icon-container">
                  <label class="form-label" for="newPassword">New Password</label>
                  <div class="input-group input-group-merge has-validation">
                    <input class="form-control" type="password" id="newPassword" required name="newPassword" placeholder="············">
                    <span class="input-group-text cursor-pointer"><i class="ti ti-eye-off"></i></span>
                  </div><div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div>
                </div>

                <div class="mb-6 col-md-6 form-password-toggle fv-plugins-icon-container">
                  <label class="form-label" for="confirmPassword">Confirm New Password</label>
                  <div class="input-group input-group-merge has-validation">
                    <input class="form-control" type="password" name="confirmPassword" required id="confirmPassword" placeholder="············">
                    <span class="input-group-text cursor-pointer"><i class="ti ti-eye-off"></i></span>
                  </div><div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div>
                </div>
              </div>
              <h6 class="text-body">Password Requirements:</h6>
              <ul class="ps-4 mb-0">
                <li class="mb-4">Minimum 8 characters long - the more, the better</li>
                <li class="mb-4">At least one lowercase character</li>
                <li>At least one number, symbol, or whitespace character</li>
              </ul>
              <div class="mt-6">
                <button type="submit" class="btn btn-primary me-3 waves-effect waves-light">Save changes</button>
                <button type="reset" class="btn btn-label-secondary waves-effect">Reset</button>
              </div>
            <input type="hidden"></form>
          </div>
        </div>




      </div>




    @endsection
