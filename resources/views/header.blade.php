<?php
  use App\Http\Controllers\ProductController;
  $total = 0;
  if(Session::has('user'))
  {
    $total = ProductController::itemCount();
  }
?>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="{{ route('product') }}">
      <img src="../images/kiwi.png" width="30" height="30" class="d-inline-block align-top" alt="">
      KIWI World
    </a>

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav">
        <li class="nav-item active">
          <a class="nav-link" href="{{ route('product') }}">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('myOrder') }}">Orders</a>
        </li>
      </ul>
      <form class="form-inline my-2 my-lg-0 mr-auto" action="{{ route('search') }}">
        <input class="form-control mr-sm-2" type="search" name="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
      </form>
      <ul class="nav navbar-nav navbar-right"> 
        @if (Session::has('user'))
          <li class="nav-item dropdown mr-5">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              {{ Session::get('user')->name }}
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="{{ route('logout') }}">Logout</a>
            </div>
          </li>
        @else
        <li class="nav-item mr-5">
          <a href="{{ route('login') }}" class="btn btn-sm btn-success">Login</a>
          <a href="{{ route('register') }}" class="btn btn-sm btn-outline-primary">Register</a>
        </li>
        @endif            
        
        <li class="nav-item">
          @if (Session::has('user'))
          <a href="{{ route('cartList') }}" class="iconClass">
            <i class="fa fa-shopping-cart fa-2x text-dark"></i><span class="badge badge-danger">{{ $total }}</span>
          </a>
          @else
          <a href="{{ route('product') }}" class="iconClass">
            <i class="fa fa-shopping-cart fa-2x text-dark"></i><span class="badge badge-danger">{{ $total }}</span>
          </a>
          @endif
          
        </li>   
      </ul>
    </div>
  </div>
</nav>