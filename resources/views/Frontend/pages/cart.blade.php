

@extends('Frontend.master')

@section('category')



<style>




body{
    margin-top:100px;
    
}
.ui-w-40 {
    width: 40px !important;
    height: auto;
}

.card{
    box-shadow: 0 1px 15px 1px rgba(52,40,104,.08);    
}

.ui-product-color {
    display: inline-block;
    overflow: hidden;
    margin: .144em;
    width: .875rem;
    height: .875rem;
    border-radius: 10rem;
    -webkit-box-shadow: 0 0 0 1px rgba(0,0,0,0.15) inset;
    box-shadow: 0 0 0 1px rgba(0,0,0,0.15) inset;
    vertical-align: middle;
}



</style>
<div class="container px-3 my-5 clearfix">
    <!-- Shopping cart table -->
    <div class="card">
        <div class="card-header">
            <h1 class="text-center" style="font-size: 35px;font-weight:500;color:cornflowerblue">Shopping Cart</h1>
        </div>
        <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered m-0">
                <thead>
                  <tr>
                    <!-- Set columns width -->
                    <th class="text-center" style="min-width: 400px;">Product Name &amp; Picture</th>
                    <th class="text-center" style="width: 100px;">Price</th>
                    <th class="text-center" style="width: 200px;">Quantity</th>
                    <th class="text-center" style="width: 100px;">Action</th>
                    <th class="text-center" style="width: 100px;">Subtotal</th>
                  </tr>
                </thead>


                <tbody>
        
                   
@php
    $total=0;
    $s=0;
@endphp




                   
    @foreach ($carts as $cart)




         @php
         $user = auth('customer')->user();
    
             $price = App\Models\Product::where('id', $cart->product_id)->value('Price');
             $stock = App\Models\Product::where('id', $cart->product_id)->value('Stock');
         @endphp
        
        
                  <tr>
                    <td class="p-4">
                      <div class="media align-items-center">
                        <img src="{{ $cart->image }}" style="width:80px;height:80px;" class="d-block ui-bordered mr-4" alt="">
                        <div class="media-body">
                          <a  class="d-block text-dark">{{ $cart->product_name}}</a>
                          <small>
                            <span class="text-muted">Description: </span> 
                          </small>
                        </div>
                      </div>
                    </td>
                    <td class="text-right font-weight-semibold align-middle p-4">{{ $price }}</td>
                    <td class="text-right font-weight-semibold align-middle p-6">
                        <form action="{{ route('cus_quantity_update' , $cart->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="form-row align-middle">
                                <div class="col-auto">
                                    <input class="form-control text-right font-weight-semibold align-middle" style="text-align: center; width: 60px; height: 36px;" type="number" max={{ $cart->quantity + $stock }} min="1" value="{{ $cart->quantity }}" name="quantity">
                                </div>
                                <div class="col-auto">
                                    <button style="background: grey;" type="submit" class="btn btn-success bg-green text-right font-weight-semibold align-middle">Update</button>
                                </div>
                            </div>
                        </form>
                        
                    </td>
                    <td class="text-right font-weight-semibold align-middle p-6">
                        <div class="action-buttons">
                         
                          <a class="text-right font-weight-semibold align-middle" style="color: red;font-weight:600;" onclick="return confirm('Are You Sure to Remove this Product ? ')" href="{{ route('cus_remove_cart',$cart->id) }}" class="action-button delete-button">Remove</a>

                         {{-- <a href="#" class="action-button delete-button">Delete</a>
                           --}} 
                        </div>
                      </td>
                    <td class="text-right font-weight-semibold align-middle p-4">{{ $cart->price }} </td>
                  </tr>

                  @php
                      $total=$total + $cart->price;
                      $s++;
                  @endphp
        
@endforeach


                </tbody>



              </table>
            </div>
            <!-- / Shopping cart table -->
        
            <div class="d-flex flex-wrap justify-content-between align-items-center pb-4">
              <div class="mt-4">
                <label class="text-muted font-weight-normal"></label>
                
              </div>
              <div class="d-flex">
                <div class="text-right mt-4 mr-5">
                  <label class="text-muted font-weight-normal m-0">Shipping</label>
                  <div class="text-large"><strong>70 BDT</strong></div>
                </div>
                <div class="text-right mt-4">
                  <label class="text-muted font-weight-normal m-0">Total price</label>
                  <div class="text-large"><strong>{{ $total + 70}} BDT</strong></div>
                </div>
              </div>
            </div>
        
            <div class="float-left">
             <a href="{{ route('home') }}"> <button type="button" style="background: goldenrod" class="btn btn-lg btn-default md-btn-flat mt-2 mr-3">Back to shopping</button></a>
              @if($s!=0)
            </div>
            <div class="float-right">
              <a href="{{ route('cus_checkout') }}"><button style="background: rgb(221, 216, 216);color:black;font-weight:600;" type="button" class="btn btn-lg btn-primary mt-2">Cash On Delivery</button></a>
              <a href="{{ route('cus_checkout1') }}"><button style="background: green;" type="button" class="btn btn-lg btn-primary mt-2"> Online Payment</button></a>
              @endif
            </div>
        
          </div>
      </div>
  </div>


    @endsection