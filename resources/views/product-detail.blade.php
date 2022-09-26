@extends('master')

@section('content')
  <div class="container">
    <h3 class="text-center my-5">Showing {{ $product->name }} Details Page </h3>
      <div class="row my-5 ">
        <div class="col-md-6">
          <img width="500" src="{{ $product['gallery'] }}" alt="">
        </div>
        <div class="col-md-6">
          <div class="my-3 clearfix">
            <a href="{{ route('product') }}" class="btn btn-outline-primary float-right">Go Back</a>
          </div>
          <h3 class="mb-3">{{ $product['name'] }}</h3>
          <h5>Category : <span class="text-success">{{ $product['category'] }}</span></h5>
          <hr>
          <h5>Details : </h5>
          <p>{{ $product['description'] }}</p>
          <b>Product price: <span>{{ $product['price'] }}</span></b>
          <br><br>
          <form action="{{ route('addtoCart') }}" method="POST">
            @csrf
            <input type="hidden" name="product_id" value="{{ $product['id'] }}">
            <button class="btn btn-primary">Add to cart</button>
          </form>
          <br>
          <button class="btn btn-success">Buy Now</button>
        </div>
      </div>
  </div>
@endsection