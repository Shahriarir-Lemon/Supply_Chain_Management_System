@extends('Backend.Dashboard1.main')
@section('content')



<style>
.container {
        width: auto;
        
       background-color: white; 
       border: 1px solid #161111;    
       padding: 20px;  
       
       
       align-content: center; 
       border-radius: 20px   
   }
   
.product_form
{
    width;: auto;
}


tr .s{
height: 100px; /* Adjust the height as needed */
text-align: center;
vertical-align: middle;
}
.material-image {
   width: auto; 

   height: 110px; 
  
}
.action-buttons {
display: flex;

}

.action-button {

font-size: 12px; 

border: 1px solid #ccc;

}





.delete-button {
background-color: #dc3545;
color: #fff;
}






</style>
<div class="container">
    <div class="product_form">
       
        @php
        $user = Auth::user();
       // $pp = App\Models\Cart::all();
       $item = App\Models\Cart1::where('user_id', $user->id)->first();
           
       if ($item) 
       {
           $materialID = $item->product_id;
   
        } else 
        {
            $materialID= 0;
        }

        $items = App\Models\Cart1::where('user_id', $user->id)->count();
        $Material = App\Models\Product::where('id', $materialID )->value('Stock');
      
        
    @endphp
 
        
        <!-- Table to display product information -->
        <h2 class="mt-0 text-center"><u>Product Need</u></h2>
        <h4 class="mt-0 mb-5 text-center"><span style="color: #28a745;font-weight:600;">{{  $items }}</span>-items need.</h4>
        <table class="table table-bordered">
            <thead>
                <tr class=" text-white">
                    <th scope="col">#</th>
                    <th>Product Image</th>
                    <th>Product Name</th>
                    <th>Quantity</th>
                    <th> Action</th>
                    <th>status</th>

                    <th>Price</th>
                  
                   
                   
                
                </tr>
            </thead>
            <tbody>
             
                @php
                    $total=0;

                    
                @endphp






@if ($product->count() > 0)

                @foreach ($carts as $cart)
                    
           

                {{-- scope="row">{{$key+1}}</th> --}}
                <tr class="s">
                    <th scope="row">{{ $cart->id }}</th>
                    <td><img src="{{ $cart->image }}" class="material-image"></td>
                    <td>{{ $cart->product_name }}</td>
                    
                    @if ($Material)
                    @php
                        $Material = (int)$Material; // Convert to integer if needed
                    @endphp
                @else
                    @php
                        $Material = 0; 
                    @endphp
                @endif  

               <td>
                    <form action="{{ route('quantity_update1', $cart->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-row align-items-center">
                            <div class="col-auto">
                                <input class="form-control" style="text-align: center; width: 60px; height: 36px;" type="number" max={{$Material + $cart->quantity  }} min="1" value="{{ $cart->quantity }}" name="quantity">
                            </div>
                            @if($cart->approve_status == 'Pending')
                            <div class="col-auto">
                                <button type="submit" class="btn btn-success">Update</button>
                            </div>
                            @endif
                        </div>
                    </form>
                    
                </td>



                   @if($cart->approve_status == 'Pending')
                    <td>
                        <div class="action-buttons">
                         
                          <a onclick="return confirm('Are You Sure to Remove this Product ? ')" href="{{ route('remove_cart1',$cart->id) }}" class="action-button delete-button">Remove</a>

                         {{-- <a href="#" class="action-button delete-button">Delete</a>
                           --}} 
                        </div>
                      </td> 
                      @else
                      <td></td>
                      @endif   

                 @if($cart->approve_status == 'Canceled')
                      
                      <td style="color: red">{{ $cart->approve_status }}</td>

                 @else
                 <td style="color: green">{{ $cart->approve_status }}</td>

                 @endif



                 @if($cart->approve_status == 'Canceled')

                      <td style="color: #28a745">{{ $pp = $cart->price -  $cart->price}}</td>

                @else
                      <td style="color: #28a745">{{ $pp = $cart->price }}</td>
                    
                 @endif


                   
                   
                </tr>

       @php
           $total = $total + $pp;
       @endphp
                
            @endforeach
@endif
            </tbody>
            
            
        </table>
        {{-- 2nd table --}}

        <table class="table table-bordered">
            <thead>
                <tr class=" text-white">
                    
                
                    <th class="col-11" style="text-align: right;">Total Price = </th>
                    <th class="col-1" style="color: #28a745">{{ $total }}</th>
                 
                
                </tr>
            </thead>
         

            
        </table>
    

        @php
            $cart = App\Models\Cart1::all();
            $cartss = App\Models\Cart1::where('user_id', auth()->user()->id)->first();
            $pendingRows = App\Models\Cart1::where('approve_status', 'Pending')->get();
            foreach ($pendingRows as $key => $row) {
                
            }


        @endphp
@if ($pendingRows->count() > 0)
   @if($row->approve_status == 'Approved')

            <div class="card">
                <div class="card-body">
            <button type="button" class="btn btn-info btn-block btn-lg">Request Already Sent</button>
                </div>
            </div>
            
    @else
    
        @if($cart->count() > 0)
        <div class="card">
            <div class="card-body">
        <a href="{{ route('request_product') }}">  <button onclick="return confirm('Are You Sure to Send the Request ? ')" type="button" class="btn btn-info btn-block btn-lg">Send Request for Product</button></a>
            </div>
        </div>
        @endif
    @endif
    @endif
    

     

       
    </div>
</div>




  @endsection