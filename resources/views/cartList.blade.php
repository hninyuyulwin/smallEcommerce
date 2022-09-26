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

                <h3 class="mb-5 pt-2 text-center fw-bold text-uppercase">Your products</h3>
                @foreach ($products as $product)
                <div class="d-flex align-items-center mb-5">
                  <div class="flex-shrink-0">
                    <img src="{{ $product->gallery }}"
                      class="img-fluid" style="width: 150px;" alt="Generic placeholder image">
                  </div>
                  <div class="flex-grow-1 ms-3">
                    <a href="{{ route('productDel',$product->cart_id) }}" class="float-right text-danger"><i class="fa fa-trash fa-2x"></i></a>

                    <h5 class="text-info">{{ $product->name }}</h5>
                    <h6 style="color: #9e9e9e;">Category : {{ $product->category }}</h6>
                    <div class="d-flex align-items-center">
                      <p class="fw-bold mb-0 me-5 pe-3">Price : <span>{{ number_format($product->price) }} $</span></p>
                    </div>
                  </div>
                </div>
                @endforeach
                <hr class="mb-4" style="height: 2px; background-color: #1266f1; opacity: 1;">

                <div class="d-flex justify-content-between p-2 mb-2" style="background-color: #e1f5fe;">
                  <h5 class="fw-bold mb-0">Total:</h5>
                  <?php
                    $total = 0;
                    foreach ($products as $product) {
                      $price = $product->price;
                      $total += $price;
                    }
                  ?>
                  <h5 class="fw-bold mb-0">{{ number_format($total) }} $</h5>
                </div>
                <a href="{{ route('product') }}" class="text-secondary mt-5"><i class="fa fa-arrow-left mr-2"></i>Back to shopping</a>
                <a href="{{ route('orderNow') }}" class="btn btn-success float-right mt-2"><i class="fa fa-credit-card mr-2 fa-1x"></i>Buy Now</a>
              </div>

            </div>

          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection