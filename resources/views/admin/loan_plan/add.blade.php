@extends('admin.layouts.app')
@section('content')
<div class="pagetitle">
    <h1>Add Loan Plans</h1>

  </div><!-- End Page Title -->

  <section class="section">
    <div class="row">
      <div class="col-lg-12">

        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Loan Plans</h5>

            <!-- General Form Elements -->
            <form action="{{ url('admin/loan_plan/add') }}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}

              <div class="row mb-3">
                <label for="inputNumber" class="col-sm-2 col-form-label">Months</label>
                <div class="col-sm-10">
                    <input type="text" id="mobileNumber" name="months" value="{{ old('months') }}" class="form-control"
                    oninput="javascript : this.value =
                    this.value.replace(/[^0-9]/g,''); if(this.value.length > this.maxLength)
                    this.value=this.value.slice(0,this.maxLength);" maxLength="10">
                </div>
              </div>
              <div class="row mb-3">
                <label for="inputNumber" class="col-sm-2 col-form-label">Interest Percentage</label>
                <div class="col-sm-10">
                    <input type="text" id="mobileNumber" name="interest_percentage" value="{{ old('interest_percentage') }}" class="form-control"
                    oninput="javascript : this.value =
                    this.value.replace(/[^0-9]/g,''); if(this.value.length > this.maxLength)
                    this.value=this.value.slice(0,this.maxLength);" maxLength="10">
                </div>
              </div>
              <div class="row mb-3">
                <label for="inputNumber" class="col-sm-2 col-form-label">Penalty Rate</label>
                <div class="col-sm-10">
                    <input type="text" id="mobileNumber" name="penalty_rate" value="{{ old('penalty_rate') }}" class="form-control"
                    oninput="javascript : this.value =
                    this.value.replace(/[^0-9]/g,''); if(this.value.length > this.maxLength)
                    this.value=this.value.slice(0,this.maxLength);" maxLength="10">                </div>
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
