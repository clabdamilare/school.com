@extends('layouts.app')

@section('content')
<div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <!-- Add New Exam Card -->
        <div class="col-xl mb-6">
            <div class="card">
                <!-- Card Header -->
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Add New Exam</h5>
                </div>

                <!-- Card Body -->
                <div class="card-body">
                    <!-- Form for Adding New Exam -->
                    <form action="" method="post">
                        {{ csrf_field() }}

                        <!-- Exam Name Input Field -->
                        <div class="mb-6">
                            <label class="form-label" for="basic-default-fullname">Exam Name</label>
                            <input type="text" class="form-control" name="name" value="{{ old('name') }}" id="basic-default-fullname" placeholder="Exam Name" required>
                        </div>

                        <!-- Note Input Field -->
                        <div class="mb-6">
                            <label>Note</label>
                            <div class="input-group input-group-merge">
                                <textarea class="form-control" name="note" placeholder="Note"></textarea>
                            </div>
                        </div>

                        <!-- Submit Button -->
                        <button type="submit" class="btn btn-primary waves-effect waves-light">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
