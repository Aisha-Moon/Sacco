@extends('admin.layouts.app')

@section('content')
<div class="pagetitle">
    <h1>Update Profile</h1>
</div>
<section class="section">
    <div class="row">
        <div class="col-lg-12">
            @include('layouts._message')
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Profile</h5>
                    <form action="{{ url('staff/profile_update') }}" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="row mb-3">
                            <label for="first_name" class="col-sm-2 col-form-label">First Name <span style="color:red;">*</span></label>
                            <div class="col-sm-10">
                                <input required type="text" id="first_name" name="name" value="{{ $getRecord->name }}" class="form-control">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="last_name" class="col-sm-2 col-form-label">Last Name <span style="color:red;">*</span></label>
                            <div class="col-sm-10">
                                <input  type="text" id="last_name" name="last_name" value="{{ $getRecord->last_name }}" class="form-control">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="surname" class="col-sm-2 col-form-label">SurName <span style="color:red;">*</span></label>
                            <div class="col-sm-10">
                                <input required type="text" id="surname" name="surname" value="{{ $getRecord->surname }}" class="form-control">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-sm-2 col-form-label">Email <span style="color:red;">*</span></label>
                            <div class="col-sm-10">
                                <input required type="text" id="email" name="email" value="{{ $getRecord->email }}" class="form-control">
                                <span style="color:red;">{{ $errors->first('email') }}</span>
                            </div>
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
                            <label for="password" class="col-sm-2 col-form-label">Password</label>
                            <div class="col-sm-10">
                              <input type="password" name="password" value="" class="form-control" >
                              <span style="color:red;">{{ $errors->first('password') }}</span>

                            </div>
                          </div>
                          <div class="row mb-3">
                            <label class="col-sm-2 col-form-label"></label>
                            <div class="col-sm-10">
                              <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                          </div>

                    </form>

                </div>
            </div>
        </div>
    </div>
</section>
@endsection
