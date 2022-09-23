@extends('master')

@section('content')
<section style="padding-top: 60px;padding-bottom: 60px;">
  <div class="container">
    <div class="row">
      <div class="col-md-6 offset-md-3">
        <div class="card">
          <div class="card-header text-center">
            <h3>Login Form</h3> 
          </div>
          <div class="card-body">
            <form action="{{ route('login') }}" method="post">
              @csrf
              <div class="form-group">
                <label for="email">Email Address</label>
                <input type="email" name="email" class="form-control" id="email">
              </div>
              <div class="form-group">
                <label for="password">Password</label>
                <input type="password" name="password" class="form-control" id="password">
              </div>
              <button type="submit" class="btn btn-primary">Login</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection