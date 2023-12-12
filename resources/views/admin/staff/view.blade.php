@extends('admin.layouts.app')
@section('content')
<div class="pagetitle">
    <h1>View Staff</h1>

  </div><!-- End Page Title -->

  <section class="section">
    <div class="row">
      <div class="col-lg-12">

        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Staff</h5>
            <div class="row">
                <div class="col-lg-3 col-md-4 label">Staff ID</div>
                <div class="col-lg-9 col-md-8 label">{{ $getRecord->id }}</div>
            </div>
            <div class="row">
                <div class="col-lg-3 col-md-4 label">First Name</div>
                <div class="col-lg-9 col-md-8 label">{{ $getRecord->first_name }}</div>
            </div>
            <div class="row">
                <div class="col-lg-3 col-md-4 label">Last Name</div>
                <div class="col-lg-9 col-md-8 label">{{ $getRecord->last_name }}</div>
            </div>
            <div class="row">
                <div class="col-lg-3 col-md-4 label">Email</div>
                <div class="col-lg-9 col-md-8 label">{{ $getRecord->email }}</div>
            </div>
            <div class="row">
                <div class="col-lg-3 col-md-4 label">Mobile Number</div>
                <div class="col-lg-9 col-md-8 label">{{ $getRecord->mobile_number }}</div>
            </div>
            <div class="row">
                <div class="col-lg-3 col-md-4 label">Profile Image</div>
                <div class="col-lg-9 col-md-8 label">
                    @if(!empty($getRecord->profile_image))
                    <img src="{{ $getRecord->getProfileImage() }}" alt="" style="height:100px; width:100px; border-radius:50%;">

                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-lg-3 col-md-4 label">DOB Date</div>
                <div class="col-lg-9 col-md-8 label">{{ $getRecord->date_of_birth }}</div>
            </div>
            <div class="row">
                <div class="col-lg-3 col-md-4 label">Role</div>
                <div class="col-lg-9 col-md-8 label">{{ !empty($getRecord->is_role) ? 'admin' :  'staff'}}</div>
            </div>
            <div class="row">
                <div class="col-lg-3 col-md-4 label">Created Date</div>
                <div class="col-lg-9 col-md-8 label">{{ date('d-m-Y',strtotime($getRecord->created_at)) }}</div>
            </div>
            <div class="row">
                <div class="col-lg-3 col-md-4 label">Updated Date</div>
                <div class="col-lg-9 col-md-8 label">{{ date('d-m-Y',strtotime($getRecord->updated_at)) }}</div>
            </div>

          </div>
        </div>

      </div>


    </div>
  </section>
@endsection
@section('script')

@endsection
