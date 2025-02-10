@extends('layouts.app')

@section('content')
<div class="content-wrapper">
<div class="container-xxl flex-grow-1 container-p-y">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <div class="col-xl mb-6">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Add New Subject</h5>
            </div>
            <div class="card-body">
                <form action="" method="post">
                    {{  csrf_field() }}
                    <div class="mb-6">
                        <label class="form-label" for="basic-default-fullname">Subject Name</label>
                        <input type="text" class="form-control" name="name" id="basic-default-fullname" placeholder="Subject name" required>
                    </div>


                    {{-- <div class="col-md-6" data-select2-id="19">
                        <label class="form-label" for="formtabs-country">Status</label>
                        <div class="position-relative" data-select2-id="18"><select id="formtabs-country" class="select2 form-select select2-hidden-accessible" data-allow-clear="true" data-select2-id="formtabs-country" tabindex="-1" aria-hidden="true">
                          <option value="" data-select2-id="11">Select</option>
                          <option value="Australia" data-select2-id="27">Active</option>
                          <option value="Bangladesh" data-select2-id="28">Inactive</option>
                            </div> --}}


                            <div class="mb-6">
                                <label class="form-label" for="basic-default-fullname">Subject Type </label>
                                <select id="formtabs-country" class="select2 form-select select2-hidden-accessible" data-allow-clear="true" data-select2-id="formtabs-country" tabindex="-1" aria-hidden="true" name="type" required>
                                    <option value="">Select Subject</option>
                                    <option value="Theory">Theory</option>
                                    <option value="Practical">Practical</option>

                                  </select>
                            </div>

                    <div class="mb-6">
                        <label class="form-label" for="basic-default-fullname">Status</label>
                        <select id="formtabs-country" class="select2 form-select select2-hidden-accessible" data-allow-clear="true" data-select2-id="formtabs-country" tabindex="-1" aria-hidden="true" name="status">
                            <option value="0">Active</option>
                            <option value="1">Inactive</option>
                          </select>
                    </div>



                    <button type="submit" class="btn btn-primary waves-effect waves-light">submit</button>
                </form>
            </div>
        </div>
    </div>


    @if ($errors->any())
    <script>
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            html: '{!! implode("<br>", $errors->all()) !!}',
            confirmButtonText: 'OK'
        });
    </script>
@endif

@endsection
