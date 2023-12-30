@extends('Backend.Dashboard1.main')
@section('content')




<style>

/*  view pop up */



/* Center the modal content */
.modal-content {
    margin: 20px auto;
}

/* Style the modal body */
.modal-body {
    padding: 20px;
}

/* Style the table inside the modal */
.table {
    width: 100%;
}

/* Style the modal footer */
.modal-footer {
    padding: 10px;
    text-align: center;
}

/* Style the product image */
.product-image {
    max-width: 100%;
    height: auto;
    border: 1px solid #ddd;
    border-radius: 4px;
    padding: 5px;
}


/*  end  view pop up */

.container {
       
        max-width: auto;
       
            background-color: white; 
            border: 1px solid #000;
            
          border-radius: 20px;
            align-content: center; 
            
        }
        .product-image {
        width: 200px; 

        height: auto; 
        border-radius: 10%;
    }

    .rounded-button {
    border-radius: 20px; 
    padding: 10px 20px; 
    color: #ffffff;
    border: none; 
    cursor: pointer; 
}

tr .s{
    height: 50px; 
    text-align: center;
    vertical-align: middle;
}



tr.a th {
  font-size: 15px; 
  height: 10px; 
  align-content: center;
margin-left: -30px;
margin-right: 20px;
}






.action-buttons {
  display: flex;
  gap: 5px; 
}

.action-button {
  padding: 5px 10px; 
  font-size: 12px; 
  text-decoration: none;
  border: 1px solid #ccc;
  border-radius: 6px;
}

.view-button {
  background-color: #28a745;
  color: #fff;
}

.edit-button {
  background-color: #ffc107;
  color: #000;
}

.delete-button {
  background-color: #dc3545;
  color: #fff;
}


</style>

<body>

    @if($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

  

<div class="container">
    <div class="product_form"><br>
        @if (Auth()->user()->can('supplier.view'))
        @if (Auth()->user()->can('distributor.view'))
        @if (Auth()->user()->can('retailer.view'))
        <a href="{{ route('add_product') }}">
            <button class="rounded-button btn btn-success">Add Product</button>
        </a>
        @endif
        @endif
        @endif
        
        <!-- Table to display product information -->
        <h3 class="mt-0 text-center"><u>Product List</u></h3>
        <table class="table table-bordered ">
            <thead>
                <tr class="a bg-secondary text-white">
                    <th scope="col">ID</th>
                    <th>Product Image</th>
                    <th>Product Name</th>
                    <th>Product Price</th>
                   
                    
                    <th>Stock</th>
                

                @if (Auth()->user()->can('supplier.view'))
                @if (Auth()->user()->can('manufacturer.view'))
                

                    <th>Request</th>
                    @endif
                    @endif
                  
                </tr>
                
            </thead>
            <tbody>


        @foreach ($products as $key => $product)


        @if($product->approve_status == 'Approved')
                  {{-- scope="row">{{$key+1}}</th> --}}
                <tr class="s">
                    <th scope="row">{{$key+1}}</th>
                    <td><img src="{{ asset($product->image) }}" class="product-image"></td>
                    <td>{{ $product->product_name }}</td>
                    <td>{{ $product->price / $product->quantity}} TK</td>

                    
                    
                    <td>{{ $product->quantity }}</td>
                    
                 

                      @if (Auth()->user()->can('supplier.view'))
                      @if (Auth()->user()->can('manufacturer.view'))
                    

                      <td>
                        @if($product->quantity == 0)
                        <button class="btn btn-sm" data-toggle="modal" data-target="#cart{{$product->id}}" disabled>
                          <h6 style="color: red;"> <u>Add to cart</u></h6>
                          </button>
                        @else
                        <button class="btn btn-sm" data-toggle="modal" data-target="#cart{{$product->id}}">
                          <h6 style="color: #28a745;"> <u>Send Request</u></h6>
                          </button>
                          @endif
                      
                      </td>
                      @endif
                      @endif
                 

                </tr>

                @endif
                @endforeach
            </tbody>
            
            
        </table>

       {{-- {{ $products->links() }} --}} 
    </div>
</div>










{{-- Add Cart --}}


@foreach ($products as $key => $product)



<div class="modal fade" id="cart{{$product->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel{{$product->id}}" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel{{$product->id}}">Product Information :</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       
        <div class="form-group">
          <label for="productName"><h4>Product Name: {{ $product->product_name }}</h4></label>
          
        </div>
        <!-- Input box for product price -->


   <form action="{{ route('retailer_request', ['id' => $product->id]) }}" method="POST" enctype="multipart/form-data">
          @csrf

        <div class="form-group">
          <label for="productPrice">Product Quantity:</label>
          <input type="number" min="1" max="{{ $product->quantity }}" required name="quantity" class="form-control" id="productPrice" placeholder="Enter quantity">
        </div>
        <div class="form-group">
          <label for="productPrice">Price: {{ $product->price /$product->quantity }}</label>
          
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

       <button type="submit" class="btn btn-primary">Add to Cart</button>
      </div>

  </form>


    </div>
  </div>
</div>


@endforeach


@endsection


