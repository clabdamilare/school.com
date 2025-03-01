@extends('layouts.app')
@section('content')
<div class="content-wrapper">
<div class="container-xxl flex-grow-1 container-p-y">
   <div class="card mb-6">
      <!-- Add mb-4 for spacing -->
      <div class="d-flex justify-content-between align-items-center">
         <h5 class="card-header m-0">My Subject</h5>
      </div>
   </div>
   <!-- Closing first card -->
   <!-- Table Section -->
   <div class="card">
      <div class="table-responsive text-nowrap">
         <table class="table">
            <thead>
               <tr>
                  <th>Subject Name</th>
                  <th>Subject Type</th>
               </tr>
            </thead>
            <tbody class="table-border-bottom-0">
               @foreach($getRecord as $value)
               <tr>
                  <td>{{ $value->subject_name }}</td>
                  <td>{{ $value->subject_type }}</td>
               </tr>
               @endforeach
            </tbody>
         </table>
      </div>
   </div>
</div>
@endsection
