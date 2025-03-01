@extends('layouts.app')

@section('content')
<div class="content-wrapper">
<div class="container-xxl flex-grow-1 container-p-y">

    <div class="col-xl mb-6">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Edit Assign Subject</h5>
            </div>
            <div class="card-body">
                <form action="" method="post">
                    {{  csrf_field() }}
                    <div class="mb-6">
                        <label class="form-label" for="basic-default-fullname">Assign Subject Name</label>
                        <select id="formtabs-country" class="select2 form-select select2-hidden-accessible" data-allow-clear="true" data-select2-id="formtabs-country" tabindex="-1" aria-hidden="true" name="class_id" required>
                            <option value="">select class</option>
                            @foreach($getClass as $class)
                            <option {{ ($getRecord->class_id == $class->id) ? 'selected' : '' }} value="{{ $class->id }}">{{ $class->name }}</option>
                            @endforeach
                          </select>

                    </div>

                    <div class="mb-6">
                        <label class="form-label" for="basic-default-fullname">Subject Name</label>
                        <select id="formtabs-country" class="select2 form-select select2-hidden-accessible" data-allow-clear="true" data-select2-id="formtabs-country" tabindex="-1" aria-hidden="true" name="subject_id" required>
                            <option value="">select Subject</option>
                            @foreach($getSubject as $subject)
                            <option {{ ($getRecord->subject_id == $subject->id) ? 'selected' : '' }} value="{{ $subject->id }}">{{ $subject->name }}</option>
                            @endforeach
                          </select>

                    </div>



                    <div class="mb-6">
                        <label class="form-label" for="basic-default-fullname">Status</label>
                        <select id="formtabs-country" class="select2 form-select select2-hidden-accessible" data-allow-clear="true" data-select2-id="formtabs-country" tabindex="-1" aria-hidden="true" name="status">
                            <option {{ ($getRecord->Status == 0) ? 'selected' : '' }} value="0">Active</option>
                            <option {{ ($getRecord->Status== 1) ? 'selected' : '' }} value="1">Inactive</option>
                          </select>
                    </div>



                    <button type="submit" class="btn btn-primary waves-effect waves-light">Update</button>
                </form>
            </div>
        </div>
    </div>




@endsection
