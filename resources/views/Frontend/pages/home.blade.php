@extends('Frontend.master')

@section('content')

<div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
    @foreach ($products as $product)
        <div class="col mb-5">
            <div class="card custom-card-size">
                <!-- Sale badge-->
                <div class="badge bg-dark text-white position-absolute" style="top: 0.5rem; right: 0.5rem">Sale</div>
                <!-- Product image-->
                <img class="card-img-top custom-image-size" src="{{asset($product->Product_Image)}}" alt="..." />

                <!-- Product details-->
                <div class="card-body p-4">
                    <div class="text-center">
                        <!-- Product name-->
                        <h5 class="fw-bolder">{{$product->Product_Name}}</h5>
                        <!-- Product reviews-->
                        
                        <!-- Product price-->
                        {{ $product->Price }} .BDT
                    </div>
                </div>
                <!-- Product actions-->
                <div class="card-footer p-5 pt-0 border-top-0 bg-transparent">
                    <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="#">Add to cart</a></div>
                </div>
            </div>
        </div>   
    @endforeach
</div>

<style>

.custom-image-size {
    width: 200px;
    height: 180px;
}

</style>

@endsection
