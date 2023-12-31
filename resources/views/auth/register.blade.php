
@extends('layouts.app')
@section('content')
     {{-- register starts --}}
     <div class="card mb-3">

        <div class="card-body">

          <div class="pt-4 pb-2">
            <h5 class="card-title text-center pb-0 fs-4">Create an Account</h5>
            <p class="text-center small">Enter your personal details to create account</p>
          </div>

          <form class="row g-3 needs-validation" novalidate method="post"
           action="{{ url('register_post') }}">
           {{ csrf_field() }}
            <div class="col-12">
              <label for="yourName" class="form-label">Your First Name</label>
              <input type="text" name="name" class="form-control" value="{{ old('name') }}" id="yourName" required>
              <div class="invalid-feedback">Please, enter your first name!</div>
            </div>

            <div class="col-12">
              <label for="yourLast" class="form-label">Your Last Name</label>
              <input type="text" name="last_name" class="form-control" value="{{ old('last_name') }}" id="yourLast" required>
              <div class="invalid-feedback">Please, enter your last name!</div>
            </div>

            <div class="col-12">
              <label for="email" class="form-label">Email</label>
              <div class="input-group has-validation">
                <span class="input-group-text" id="inputGroupPrepend">@</span>
                <input type="email" name="email" class="form-control" value="{{ old('email') }}" id="email" required>
                <span style="color:red;">{{ $errors->first('email') }}</span>
                <div class="invalid-feedback">Please enter a valid Email adddress!</div>
              </div>
            </div>

            <div class="col-12">
              <label for="yourPassword" class="form-label">Password</label>
              <input type="password" name="password" class="form-control" id="yourPassword" required>
              <span style="color:red;">{{ $errors->first('password') }}</span>

              <div class="invalid-feedback">Please enter your password!</div>
            </div>

            <div class="col-12">
              <div class="form-check">
                <input class="form-check-input" name="terms" type="checkbox" value="" id="acceptTerms" required>
                <label class="form-check-label" for="acceptTerms">I agree and accept the <a href="#">terms and conditions</a></label>
                <div class="invalid-feedback">You must agree before submitting.</div>
              </div>
            </div>
            <div class="col-12">
              <button class="btn btn-primary w-100" type="submit">Create Account</button>
            </div>
            <div class="col-12">
              <p class="small mb-0">Already have an account? <a href="{{ url('/') }}">Log in</a></p>
            </div>
          </form>

        </div>
      </div>
{{-- register ends --}}

@endsection

