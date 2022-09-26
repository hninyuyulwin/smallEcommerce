@extends('master')

@section('content')
<section class="h-100 h-custom" style="background-color: #eee;">
  <div class="container h-100 py-5">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col">
        <div class="card shopping-cart" style="border-radius: 15px;">
          <div class="card-body text-black">

            <div class="row">
              <div class="col-lg-8 offset-lg-2 px-5 py-4">

                <h3 class="mb-5 pt-2 text-center fw-bold text-uppercase">Your Orders</h3>
                @foreach ($orders as $product)
                <div class="d-flex align-items-center mb-5">
                  <div class="flex-shrink-0">
                    <img src="{{ $product->gallery }}"
                      class="img-fluid" style="width: 150px;" alt="Generic placeholder image">
                  </div>
                  <div class="flex-grow-1 ms-3">
                    <h5 class="text-info">{{ $product->name }}</h5>
                    <h6 style="color: #9e9e9e;">Category : {{ $product->category }}</h6>
                    <div class="d-flex align-items-center">
                      <p class="fw-bold mb-0 me-5 pe-3">Price : <span>{{ number_format($product->price) }} $</span></p>
                    </div>
                    
                  </div>
                </div>
                @endforeach
                <div class="flex-grow-1 ms-3 ml-5">
                  <p>Order Status : {{ $product->status }}</p>
                  <p>Payment Method : {{ $product->payment_method }}</p>
                  <p>Payment Status : {{ $product->payment_status }}</p>
                  <p>Address : {{ $product->address }}</p>
                </div>
                
              </div>

            </div>

          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection