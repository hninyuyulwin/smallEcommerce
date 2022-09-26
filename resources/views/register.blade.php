@extends('master')

@section('content')
<section style="padding-top: 60px;padding-bottom: 60px;">
  <div class="container">
    <div class="row">
      <div class="col-md-6 offset-md-3">
        <div class="card">
          <div class="card-header text-center">
            <h3>Register Form</h3> 
          </div>
          <div class="card-body">
            @if ($errors->any())
              <div class="alert alert-danger">
                  <ul>
                      @foreach ($errors->all() as $error)
                          <li>{{ $error }}</li>
                      @endforeach
                  </ul>
              </div>
          @endif
            <form action="{{ route('register') }}" method="POST">
              @csrf
              <div class="form-group">
                <label for="name">Enter Username</label>
                <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" placeholder="Enter your name">
                @error('name')
                  <div class="text-danger">{{ $message }}</div>
                @enderror
              </div>
              <div class="form-group">
                <label for="email">Email Address</label>
                <input type="email" name="email" class="form-control" id="email" placeholder="example@gmail.com">
                @error('email')
                  <span class="text-danger">{{ $message }}</span>
                @enderror
              </div>
              <div class="form-group">
                <label for="password">Password</label>
                <input type="password" name="password" class="form-control" id="password">
                @error('password')
                  <span class="text-danger">{{ $message }}</span>
                @enderror
              </div>
              <button type="submit" class="btn btn-success">Register</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection