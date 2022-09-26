@extends('master')

@section('content')
<section style="background-color: #eee;">
  <div class="container py-5">
    <div class="card">
      <div class="card-body">
        <div class="row d-flex justify-content-center pb-5">
          <div class="col-md-6">
            <div class="py-4 d-flex justify-content-end">
              <h6><a href="{{ route('cartList') }}">Cancel and return to view list</a></h6>
            </div>
            <div class="rounded d-flex flex-column p-2" style="background-color: #f8f9fa;">
              <div class="p-2 me-3">
                <h4>Your Voucher Slip</h4>
              </div>
              @foreach ($products as $product)
                <div class="p-2 d-flex">
                  <div class="col-8">{{ $product->name }}</div>
                  <div class="ms-auto">{{ number_format($product->price) }} $</div>
                </div>
              @endforeach

              
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
                  foreach ($products as $product) {
                    $total += $product->price;
                  }
                ?>
                <div class="ms-auto"><b class="text-success">{{ number_format($total+10) }} $</b></div>
              </div>
            </div>
            <form action="{{ route('orderPlace') }}" class="mt-5" method="POST">
              @csrf
              <div class="form-group">
                <label for="">Type your adddress : </label>
                <textarea name="address" class="form-control" placeholder="Enter your address:" rows="5"></textarea>
              </div>
              <div class="form-group">
                <label for="payment">Payment Method</label><br>
                <input type="radio" value="Online-Payment" name="payment">Online Payment<br><br>
                <input type="radio" value="EMI-Payment" name="payment">EMI Payment<br><br>
                <input type="radio" value="Payment-On-Delivery" name="payment">Payment on Delivery<br><br>
              </div>
              <button type="submit" class="btn btn-success">Order Now</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection