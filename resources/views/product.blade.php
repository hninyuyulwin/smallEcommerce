@extends('master')
@push('css')
{{-- Toastr --}}
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" integrity="sha512-vKMx8UnXk60zUwyUnUPM3HbQo8QfmNx7+ltw8Pm5zLusl1XIfwcxo8DbWCqMGKaWeNxWA8yrx5v3SaVpMvR3CA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
@endpush
@section('content')
<section style="padding-top: 60px;padding-bottom: 60px;">
  <div class="custom-product">

    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
      <ol class="carousel-indicators">
        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
      </ol>
      <div class="carousel-inner">
        @foreach ($caro as $product)
          <div class="carousel-item {{ $product['id'] == 1 ? 'active' : '' }}">
            <a href="{{ route('product-detail',$product['id']) }}">
              <img class="d-block w-100 slider-img" src="{{ $product['gallery'] }}" alt="First slide">
              <div class="carousel-caption d-none d-md-block">
                <h5>{{ $product['name'] }}</h5>
                <p>{{ $product['description'] }}</p>
              </div>
            </a>
          </div>
        @endforeach        
      </div>
      <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>

     {{--  --}}
     <section style="background-color: #eee;">
      <div class="container py-5">
        <div class="row">
          @foreach ($products as $product)
          <div class="col-md-6 col-lg-4 mb-4 mb-md-0">
            <a href="{{ route('product-detail',$product->id) }}">
              <div class="card mb-4">
                <img src="{{ $product->gallery }}"
                  class="card-img-top" alt="Laptop" width="200" height="200"/>
                <div class="card-body">
                  <div class="d-flex justify-content-between">
                    <p class="small"><a href="{{ route('product-detail',$product->id) }}" class="text-muted">{{ $product->category }}</a></p>
                  </div>
      
                  <div class="d-flex justify-content-between mb-3">
                    <h5 class="mb-0">{{ $product->name }}</h5>
                    <h5 class="text-dark mb-0">{{ number_format($product->price) }} $</h5>
                  </div>
      
                  <div class="d-flex justify-content-between mb-2">
                    <p class="text-muted mb-0">{{ Str::limit($product->description,'30','...') }}</p>
                  </div>
                </div>
              </div>
            </a>
          </div>
          @endforeach
        </div>
      </div>
    </section>
    {{--  --}}

  </div>
</section>
@endsection
@push('scripts')
  {{-- Toastr --}}
  <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  @if (session('message'))
    <script>
      toastr.success("{!! session('message') !!}")
    </script>
  @endif
@endpush