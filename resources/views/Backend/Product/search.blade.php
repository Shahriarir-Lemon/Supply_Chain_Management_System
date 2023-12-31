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
        <a href="{{ route('add_product') }}">
            <button class="rounded-button btn btn-success">Add Product</button>
        </a>
        @endif
        @endif
        
        <!-- Table to display product information -->
        <h3 class="mt-0 text-center"><u>Product List</u></h3>


        <form action="{{ route('product_search') }}" method="GET" style="display: flex; justify-content: center; align-items: center;">
            @csrf
            <input type="text" style="width:90%;" name="search" class="form-control" placeholder="Enter your search items">
            <button style="width:100px;" class="form-control btn btn-success" type="submit">Search</button>
        </form>
  




        <h4 style="margin-left: 10px;color:green;margin-top:10px; ">{{ $count }}- items found..</h4>  







        <table class="table table-bordered ">
            <thead>
                <tr class="a bg-secondary text-white">
                    <th scope="col">ID</th>
                    <th>Product Image</th>
                    <th>Product Name</th>
                    <th>Product Price</th>
                    <th>Unit Type</th>
                    <th>Category</th>
                    <th>Stock</th>
                    <th>Description</th>
                    <th>Action</th>

                @if (Auth()->user()->can('supplier.view'))
                @if (Auth()->user()->can('manufacturer.view'))
                @if (Auth()->user()->can('retailer.view'))

                    <th>Request</th>
                    @endif
                    @endif
                    @endif
                </tr>
                
            </thead>
            <tbody>
                @foreach ($products as $key => $product)

                {{-- scope="row">{{$key+1}}</th> --}}
                <tr class="s">
                    <th scope="row">{{$key+1}}</th>
                    <td><img src="{{ asset($product->Product_Image) }}" class="product-image"></td>
                    <td>{{ $product->Product_Name }}</td>
                    <td>{{ $product->Price }} TK</td>
                    <td>{{ $product->Unit_Type }}</td>
                    <td>{{ $product->Category}}</td>
                    <td>{{ $product->Stock }}</td>
                    <td>{{ $product->Description }}</td>
                    <td>
                        <div class="action-buttons">
                          <a href="#" class="action-button view-button" data-toggle="modal" data-target="#productview{{$product->id}}">View</a>

                          @if (Auth()->user()->can('distributor.view'))
                          @if (Auth()->user()->can('supplier.view'))
                          <a href="#" class="action-button edit-button"  data-toggle="modal" data-target="#productedit{{$product->id}}">Edit</a>
                          @endif
                          @if (Auth()->user()->can('supplier.view'))
                          <form action="{{ route('delete_product',$product->id) }}" class="d-inline" method="POST" onsubmit="return confirm('Are you sure?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" >
                              Delete
                          </button>
                        </form>
                        @endif
                        @endif
                         
                      
                        </div>
                      </td>

                      @if (Auth()->user()->can('supplier.view'))
                      @if (Auth()->user()->can('manufacturer.view'))
                      @if (Auth()->user()->can('retailer.view'))

                      <td>
                        @if($product->Stock == 0)
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
                      @endif

                    
                      
                
                </tr>
                @endforeach
            </tbody>
            
            
        </table>

       {{-- {{ $products->links() }} --}} 
    </div>
</div>



{{-- Product Edit --}}

@foreach ($products as $key => $product)


<div class="modal fade" id="productedit{{$product->id}}" >
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <form method="POST" action="{{ route('edit_product',$product->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="modal-header">
                        <h5 class="modal-title"><i class="fas fa-edit"></i>
                            Edit Product</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        
                        <div class="form-group">
                            <label for="name">Product Image</label>
                            <input type="file" name="product_image"  class="form-control"><br>
                            <img src="{{ asset($product->Product_Image) }}" class="product-image">
                        </div>
                        <div class="form-group">
                          <label for="name">Product Name</label>
                          <input type="text" name="product_name" value="{{ $product->Product_Name }}" class="form-control" required>
                      </div>
                      <div class="form-group">
                        <label for="name">Price </label>
                        <input type="text" name="product_price" value="{{ $product->Price}}" class="form-control" required>
                    </div>
                    <div class="form-group">
                      <label for="name">Unit Type </label>
                      <select class="form-control  col-md-12" name="product_unit" id="product:unit">
                        
                         @foreach($units as $key => $unit)
                <option value="{{ $unit->Unit_Name}}">{{ $unit->Unit_Name }}</option>
            @endforeach
                    </select>
                  </div>

                  <div class="form-group">
                    <label for="name">Category </label>
                    <select class="form-control  col-md-12" name="product_category" id="product:category">
                     
  
              @foreach($categories as $key => $category)
               <option value="{{ $category->Category_Name}}">{{ $category->Category_Name }}</option>
              @endforeach
                     
                  </select>
                </div>


                <div class="form-group">
                  <label for="name">Stock </label>
                  <input type="text" name="product_stock" value="{{ $product->Stock}}" class="form-control" required>
              </div>

              <div class="form-group">
                <label for="name">Description</label>
                <input type="text" name="product_description" value="{{ $product->Description }}" class="form-control" required>
            </div>

           

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Update Product</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endforeach
{{--End Product Edit --}}




{{-- Product View --}}

@foreach ($products as $key => $product)




<div class="modal fade" id="productview{{$product->id}}">
    <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title"><i class='bx bxs-detail'></i>
               Product Details</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
            <div class="modal-body">
                <table class="table">
                    <tr>
                        <td><label for="name">Product Image :</label></td>
                        <td><img src="{{ asset($product->Product_Image) }}" class="product-image"></td>
                    </tr>
                    <tr>
                        <td><label for="name">Product Name :</label></td>
                        <td>{{ $product->Product_Name }}</td>
                    </tr>
                    <tr>
                        <td><label for="name">Price :</label></td>
                        <td>{{ $product->Price}}</td>
                    </tr>
                    <tr>
                        <td><label for="name">Unit Type :</label></td>
                        <td>
                            <select class="form-control col-md-12" name="product_unit" id="product:unit">
                                @foreach($units as $key => $unit)
                                    <option value="{{ $unit->Unit_Name }}">{{ $unit->Unit_Name }}</option>
                                @endforeach
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td><label for="name">Category :</label></td>
                        <td>
                            <select class="form-control col-md-12" name="product_category" id="product:category">
                                @foreach($categories as $key => $category)
                                    <option value="{{ $category->Category_Name }}">{{ $category->Category_Name }}</option>
                                @endforeach
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td><label for="name">Stock :</label></td>
                        <td>{{ $product->Stock}}</td>
                    </tr>
                    <tr>
                        <td><label for="name">Description :</label></td>
                        <td>{{ $product->Description }}</td>
                    </tr>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">OK</button>
            </div>
        </div>
    </div>
</div>


@endforeach

{{-- End Product View --}}


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
          <label for="productName"><h4>Product Name: {{ $product->Product_Name }}</h4></label>
          
        </div>
        <!-- Input box for product price -->


   <form action="{{ route('add_cart1' ,$product->id) }}" method="POST" enctype="multipart/form-data">
          @csrf

        <div class="form-group">
          <label for="productPrice">Product Quantity:</label>
          <input type="number" min="1" max="{{ $product->Stock }}" required name="quantity" class="form-control" id="productPrice" placeholder="Enter quantity">
        </div>
        <div class="form-group">
          <label for="productPrice">Price: {{ $product->Price }} .TK/{{ $product->Unit_Type }}</label>
          
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


