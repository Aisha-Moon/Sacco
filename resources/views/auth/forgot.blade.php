@extends('layouts.app')
@section('content')
  {{-- forgot password start --}}

  <div class="card mb-3">

    <div class="card-body">

      <div class="pt-4 pb-2">
        <h5 class="card-title text-center pb-0 fs-4">Forgot Password</h5>
        <p class="text-center small">Enter your email and reset password</p>
      </div>

      <form class="row g-3 needs-validation" novalidate method="post" action="">

        <div class="col-12">
          <label for="yourUsername" class="form-label">Email</label>
          <div class="input-group has-validation">
            <span class="input-group-text" id="inputGroupPrepend">@</span>
            <input type="text" name="email" class="form-control" id="yourUsername" required>
            <div class="invalid-feedback">Please enter your email.</div>
          </div>
        </div>



        <div class="col-12">
          <div class="form-check">
            <input class="form-check-input" type="checkbox" name="remember" value="true" id="rememberMe">
            <label class="form-check-label" for="rememberMe">Remember me</label>
          </div>
        </div>
        <div class="col-12">
          <button class="btn btn-primary w-100" type="submit">Forgot</button>
        </div>
        <div class="col-12">
            <p class="small mb-0">Already have an account? <a href="{{ url('/') }}">Log in</a></p>
        </div>
      </form>

    </div>
  </div>
   {{-- forgot password end --}}

@endsection


