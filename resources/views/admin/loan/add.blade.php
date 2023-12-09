@extends('admin.layouts.app')
@section('content')
<div class="pagetitle">
    <h1>Add New Loan Application </h1>

  </div><!-- End Page Title -->

  <section class="section">
    <div class="row">
      <div class="col-lg-12">

        <div class="card">
          <div class="card-body">
            <h5 class="card-title">New Loan Application</h5>

            <!-- General Form Elements -->
            <form action="{{ url('admin/loan/add') }}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}


              <div class="row mb-3">
                <label class="col-sm-2 col-form-label">Loan Users</label>
                <div class="col-sm-10">
                  <select class="form-select" name="user_id"  required>
                    <option value="">Select User</option>
                    @foreach ($getLoanUser as $value_3)
                    <option value="{{ $value_3->id }}">{{ $value_3->first_name }}</option>
                    @endforeach
                  </select>
                </div>
              </div>
              <div class="row mb-3">
                <label class="col-sm-2 col-form-label">Staff Nmae</label>
                <div class="col-sm-10">
                  <select class="form-select" name="staff_id"  required>
                    <option value="">Select Staff</option>
                    @foreach ($getStaff as $value_4)
                    <option value="{{ $value_4->id }}">{{ $value_4->name }}</option>
                    @endforeach
                  </select>
                </div>
              </div>
              <div class="row mb-3">
                <label class="col-sm-2 col-form-label">Loan Types</label>
                <div class="col-sm-10">
                  <select class="form-select" name="loan_types_id"  required>
                    <option value="">Select Loan Types</option>
                    @foreach ($getLoanTypes as $value_1)
                    <option value="{{$value_1->id  }}">{{ $value_1->type_name }}</option>

                    @endforeach
                  </select>
                </div>
              </div>
              <div class="row mb-3">
                <label class="col-sm-2 col-form-label">Loan Plans</label>
                <div class="col-sm-10">
                  <select class="form-select" name="loan_plan_id"  required>
                    <option value="">Select Loan Plans</option>
                    @foreach ($getLoanPlan as $value_2)
                    <option value="{{$value_2->id  }}">{{ $value_2->months }}
                        [{{ $value_2->interest_percentage . ' % ' . $value_2->penalty_rate  }}] </option>

                    @endforeach
                  </select>
                </div>
              </div>

              <div class="row mb-3">
                <label for="inputNumber" class="col-sm-2 col-form-label">Loan Amount</label>
                <div class="col-sm-10">
                    <input type="number" id="mobileNumber" name="loan_amount" value="{{ old('loan_amount') }}" class="form-control">
                </div>
              </div>
              <div class="row mb-3">
                <label for="purpose" class="col-sm-2 col-form-label">Purpose</label>
                <div class="col-sm-10">
                   <textarea name="purpose" id="purpose" class="form-control">{{ old('purpose') }}</textarea>
                 </div>
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
