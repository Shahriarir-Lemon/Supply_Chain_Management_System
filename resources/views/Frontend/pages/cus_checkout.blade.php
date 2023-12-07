@extends('Frontend.master')

@section('category')
<style>

    .container
    {

        border: 1px solid black;

        border-radius: 20px;
        margin-top: 110px;
       
    }
</style>

<div class="container">
    <form class="needs-validation" action="{{ route('cus_place_order') }}" method="POST" novalidate="">
        @csrf
    <div class="py-3 text-center">
        <h2 style="font-size: 40px;"><u>Checkout form</u></h2>


        @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

        @if($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif


    </div>
    <div class="row">



        <div class="col-md-4 order-md-2 mb-4">
            <h4 class="d-flex justify-content-between align-items-center mb-3">
                <span style="font-size: 20px;">Your cart has</span>
                <span style="font-size: 20px;" class="badge badge-primary badge-pill" style="color: white;">3 items.</span>
            </h4>
            <ul class="list-group mb-3 sticky-top">
              

          @php

                     $user = Auth::guard('customer')->user();

                     $cart = App\Models\CCart::where('user_id', $user->id)->get();
           @endphp
                @php
                $total = 0;
            @endphp

              @foreach ($cart as $carts)
                  
            
             
                <li class="list-group-item d-flex justify-content-between lh-condensed">
                    <div>
                        <h6 class="my-0">{{ $carts->product_name }}</h6>
                        <small class="text-muted">Quantity:({{ $carts->quantity }}) x  Price: ({{ $carts->price / $carts->quantity }})</small>
                    </div>
                    <span class="text-muted">= {{ $carts->price }} BDT</span>
                </li>
                        
                @php
                    $total = $total + $carts->price;
                @endphp

                @endforeach

                <li class="list-group-item d-flex justify-content-between">
                    <span>Shipping costs</span>
                    <strong>= 70 BDT</strong>
                </li>


                <li class="list-group-item d-flex justify-content-between text-success">
                    <span>Total (BDT)</span>
                    <strong>={{ $total + 70 }} BDT</strong>
                </li>
            </ul>
            
        </div>





        <div class="col-md-8 order-md-1">
            <h4 style="font-size: 25px;" class="mb-3"><u>Shipping address</u></h4>
         
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="firstName">Full Name</label>
                        <input type="text" class="form-control" name="name" placeholder="name" required="">
                        <div class="invalid-feedback"> Valid  name is required. </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="lastName">Email</label>
                        <input type="email" class="form-control" name="email" id="lastName" placeholder="..@email.com" value="" >
                        <div class="invalid-feedback">  email is required. </div>
                    </div>
                </div>
             
                <div class="mb-3">
                    <label for="email">Mobile : </span></label>
                    <input type="number" name="mobile" class="form-control" id="email" placeholder="017688...." required>
                    <div class="invalid-feedback"> Please enter a valid mobile number for shipping  </div>
                </div>
                <div class="mb-3">
                    <label for="address">Address</label>
                    <input type="text" name="address" class="form-control" id="address" placeholder="Uttara Sector 10..." required="">
                    <div class="invalid-feedback"> Please enter your shipping address. </div>
                </div>

                <div class="mb-3">
                    <label for="address">Payment Method</label>
                    <input type="text" name="cod" class="fixed-value form-control" value="Cash On Delivery" id="address" placeholder="" required="" readonly style="color: green;">
                </div>
                
               
               
                
               
            
        
                <hr class="mb-4">
         
        </div>
    </div>
    @if($cart!=null)
    <button style="background: green;" class="btn btn-primary btn-lg btn-block mb-5" type="submit">Place Order</button>
@endif
</form>
</div>

@endsection