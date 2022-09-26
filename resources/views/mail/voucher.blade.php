@extends('master')

@section('content')
<section style="background-color: #eee;">
  <div class="container py-5">
    <div class="card">
      <div class="card-body">
        <div class="row d-flex justify-content-center pb-5">
          <div class="col-md-6">
            <div class="rounded d-flex flex-column p-2" style="background-color: #f8f9fa;">
              <div class="p-2 me-3">
                <h3>Hello {{ $userName }} ,</h3>
                <h4>Your Voucher Slip</h4>
              </div>
              @foreach ($orders as $product)
                <div class="p-2 d-flex">
                  <div class="col-8">{{ $product->name }}</div>
                  <div class="col-8">{{ $product->category }}</div>
                  <div class="ms-auto">{{ number_format($product->price) }} $</div>
                </div>
              @endforeach
              <hr>
              
              <div class="p-2 d-flex">
                <div class="col-8">Your Address : {{ $product->address }}</div>
                <div class="col-8">Your Payment method : {{ $product->payment_method }}</div>
              </div>

              
              <div class="p-2 d-flex">
                <div class="col-8">Tax</div>
                <div class="ms-auto">0 $</div>
              </div>
              <div class="p-2 d-flex">
                <div class="col-8">Delivery</div>
                <div class="ms-auto">10 $</div>
              </div>

              <div class="border-top px-2 mx-2"></div>

              <div class="p-2 d-flex pt-3">
                <div class="col-8"><b>Total</b></div>
                <?php
                  $total = 0;
                  foreach ($orders as $product) {
                    $total += $product->price;
                  }
                ?>
                <div class="ms-auto"><b class="text-success">{{ number_format($total+10) }} $</b></div>
              </div>
              <p><b>Thanks for buying with us, See you Again</b></p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection