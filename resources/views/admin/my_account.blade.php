@extends('layouts.app')

@section('content')
<div class="content-wrapper">
<div class="container-xxl flex-grow-1 container-p-y">

    <div class="col-xl mb-6">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">My Account</h5>
            </div>
            <div class="card-body">
                <form action="" method="post">
                    {{  csrf_field() }}
                    <div class="mb-6">
                        <label class="form-label" for="basic-default-fullname">Name</label>
                        <input type="text" class="form-control" name="name" value="{{ $getRecord->name }}" id="basic-default-fullname" placeholder="name" required>
                    </div>

                    <div class="mb-6">
                        <label class="form-label" for="basic-default-email">Email</label>
                        <div class="input-group input-group-merge">
                            <input type="text" id="basic-default-email" name="email" value="{{ $getRecord->email }}" class="form-control" placeholder="john.doe" aria-label="email">
                            {{-- <span class="input-group-text">@gmail.com</span> --}}
                        </div>
                    </div>





                    <button type="submit" class="btn btn-primary waves-effect waves-light">Update</button>
                </form>
            </div>
        </div>
    </div>



@endsection
