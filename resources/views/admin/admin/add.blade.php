@extends('layouts.app')

@section('content')
<div class="content-wrapper">
<div class="container-xxl flex-grow-1 container-p-y">

    <div class="col-xl mb-6">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Add New Admin</h5>
            </div>
            <div class="card-body">
                <form action="" method="post">
                    {{  csrf_field() }}
                    <div class="mb-6">
                        <label class="form-label" for="basic-default-fullname">Name</label>
                        <input type="text" class="form-control" name="name" value="{{ old('name') }}" id="basic-default-fullname" placeholder="name" required>
                    </div>

                    <div class="mb-6">
                        <label class="form-label" for="basic-default-email">Email</label>

                        <div class="input-group input-group-merge">
                            <input type="text" id="basic-default-email" name="email" value="{{ old('email') }}" class="form-control" placeholder="john.doe" aria-label="email">

                            <span class="input-group-text">@gmail.com</span>
                        </div>
                    </div>




                    <!-- Add margin-bottom to create space before the Send button -->
                    <div class="col-md-6 mb-4">
                        <div class="form-password-toggle">
                            <label class="form-label" for="multicol-password">Password</label>
                            <div class="input-group input-group-merge">
                                <input type="password" id="multicol-password" name="password" class="form-control" placeholder="············" aria-describedby="multicol-password2" required>
                                <span class="input-group-text cursor-pointer" id="multicol-password2"><i class="ti ti-eye-off"></i></span>
                            </div>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary waves-effect waves-light">submit</button>
                </form>
            </div>
        </div>
    </div>



    <script>
        document.getElementById("basic-default-email").addEventListener("input", function() {
            // Remove @gmail.com if user tries to type it
            this.value = this.value.replace(/@gmail\.com/i, "");
        });

        document.querySelector("form").addEventListener("submit", function(event) {
            let emailField = document.getElementById("basic-default-email");
            let emailValue = emailField.value.trim();

            // Check if email already ends with @gmail.com
            if (!emailValue.endsWith("@gmail.com")) {
                emailField.value = emailValue + "@gmail.com";
            } else {
                // Remove any additional @gmail.com just in case
                emailField.value = emailValue.replace(/@gmail\.com/gi, "") + "@gmail.com";
            }
        });
    </script>
@endsection
