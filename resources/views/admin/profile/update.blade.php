@extends('admin.layouts.app')
@section('content')
<div class="pagetitle">
    <h1>Profile</h1>

  </div><!-- End Page Title -->

  <section class="section">
    <div class="row">
      <div class="col-lg-12">
@include('layouts._message')
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Profile</h5>

            <!-- General Form Elements -->
            <form action="{{ url('admin/profile/update') }}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
              <div class="row mb-3">
                <label for="inputText" class="col-sm-2 col-form-label">First Name</label>
                <div class="col-sm-10">
                  <input type="text" name="name" value="{{ $getRecord->name }}" class="form-control" required>
                </div>
              </div>
              <div class="row mb-3">
                <label for="inputText" class="col-sm-2 col-form-label">Last Name</label>
                <div class="col-sm-10">
                  <input type="text" name="last_name" value="{{ $getRecord->last_name }}" class="form-control">
                </div>
              </div>
              <div class="row mb-3">
                <label for="inputText" class="col-sm-2 col-form-label">SurName</label>
                <div class="col-sm-10">
                  <input type="text" name="surname" value="{{ $getRecord->surname }}" class="form-control" >
                </div>
              </div>
              <div class="row mb-3">
                <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                <div class="col-sm-10">
                  <input type="email" name="email" value="{{ $getRecord->email }}" class="form-control" required>
                  <span style="color:red;">{{ $errors->first('email') }}</span>

                </div>
              </div>
              <div class="row mb-3">
                <label for="inputNumber" class="col-sm-2 col-form-label">Mobile Number</label>
                <div class="col-sm-10">
                    <input type="text" id="mobileNumber" name="mobile_number" value="{{ old('mobile_number',$getRecord->mobile_number) }}" class="form-control"
                    oninput="javascript : this.value =
                    this.value.replace(/[^0-9]/g,''); if(this.value.length > this.maxLength)
                    this.value=this.value.slice(0,this.maxLength);" maxLength="10">                </div>
              </div>

              <div class="row mb-3">
                <label for="inputNumber" class="col-sm-2 col-form-label">Profile Upload</label>
                <div class="col-sm-10">
                  <input class="form-control" name="profile_image" type="file" id="formFile">
                  @if(!empty($getRecord->profile_image))
                  <img src="{{ $getRecord->getProfileImage() }}" alt="" style="height:100px; width:100px; border-radius:50%;">

                  @endif
                </div>
              </div>


              <div class="row mb-3">
                <label for="inputDate" class="col-sm-2 col-form-label">Date Of Birth</label>
                <div class="col-sm-10">
                  <input type="date" name="date_of_birth" value="{{ $getRecord->date_of_birth }}" class="form-control">
                </div>
              </div>

              <div class="row mb-3">
                <label for="password" class="col-sm-2 col-form-label">Password</label>
                <div class="col-sm-10">
                  <input type="password" name="password" value="{{ old('password') }}" class="form-control" >
                  <span style="color:red;">{{ $errors->first('password') }}</span>

                </div>
              </div>


              <div class="row mb-3">
                <label class="col-sm-2 col-form-label"></label>
                <div class="col-sm-10">
                  <button type="submit" class="btn btn-primary">Update</button>
                </div>
              </div>

            </form><!-- End General Form Elements -->

          </div>
        </div>

      </div>


    </div>
  </section>
@endsection
@section('script')

@endsection
