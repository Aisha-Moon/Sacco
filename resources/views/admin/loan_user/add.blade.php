@extends('admin.layouts.app')
@section('content')
<div class="pagetitle">
    <h1>Add Loan User</h1>

  </div><!-- End Page Title -->

  <section class="section">
    <div class="row">
      <div class="col-lg-12">

        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Loan User</h5>

            <!-- General Form Elements -->
            <form action="{{ url('admin/loan_user/add') }}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}

              <div class="row mb-3">
                <label for="first_name" class="col-sm-2 col-form-label">First Name <span style="color:red;">*</span></label>
                <div class="col-sm-10">
                    <input required type="text" id="first_name" name="first_name" value="{{ old('first_name') }}" class="form-control">
                </div>
              </div>
              <div class="row mb-3">
                <label for="middle_name" class="col-sm-2 col-form-label">Middle Name <span style="color:red;">*</span></label>
                <div class="col-sm-10">
                    <input required type="text" id="middle_name" name="middle_name" value="{{ old('middle_name') }}" class="form-control">
                </div>
              </div>
              <div class="row mb-3">
                <label for="last_name" class="col-sm-2 col-form-label">Last Name <span style="color:red;">*</span></label>
                <div class="col-sm-10">
                    <input required type="text" id="last_name" name="last_name" value="{{ old('last_name') }}" class="form-control">                </div>
              </div>
              <div class="row mb-3">
                <label for="address" class="col-sm-2 col-form-label">Address <span style="color:red;">*</span></label>
                <div class="col-sm-10">
                    <textarea id="address" name="address" class="form-control">
                         {{ old('address') }}
                    </textarea>

                 </div>
              </div>
              <div class="row mb-3">
                <label for="contact" class="col-sm-2 col-form-label">Contact <span style="color:red;">*</span></label>
                <div class="col-sm-10">
                    <input required type="text" id="contact" name="contact" value="{{ old('contact') }}" class="form-control"
                    oninput="javascript : this.value =
                    this.value.replace(/[^0-9]/g,''); if(this.value.length > this.maxLength)
                    this.value=this.value.slice(0,this.maxLength);" maxLength="10">                </div>
              </div>
              <div class="row mb-3">
                <label for="email" class="col-sm-2 col-form-label">Email <span style="color:red;">*</span></label>
                <div class="col-sm-10">
                    <input required type="text" id="email" name="email" value="{{ old('email') }}" class="form-control">
                    <span style="color:red;">{{ $errors->first('email') }}</span>
                </div>
              </div>
              <div class="row mb-3">
                <label for="tax_id" class="col-sm-2 col-form-label">Tax ID <span style="color:red;">*</span></label>
                <div class="col-sm-10">
                    <input required type="text" id="tax_id" name="tax_id" value="{{ old('tax_id') }}" class="form-control">                </div>
              </div>


              <div class="row mb-3">
                <label class="col-sm-2 col-form-label"></label>
                <div class="col-sm-10">
                  <button type="submit" class="btn btn-primary">Submit</button>
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
