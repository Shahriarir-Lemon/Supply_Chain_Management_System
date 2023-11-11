<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Bootstrap JS and jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Font Awesome icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    
    
    <title>Raw Materials</title>
</head>
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
        margin-left: 2px;
        max-width: 980px;
        /* Set your desired max width */
               /* Set your desired height */
            background-color: white; /* Optional: Change the background color */
            border: 1px solid #161111;    /* Optional: Add a border */
            padding: 20px;  
            margin-bottom: 20px;  
            margin-top: 30px; 
            align-content: center; 
            border-radius: 20px     /* Optional: Add padding */
        }
        .product-image {
        width: 200px; 

        height: auto; 
        border-radius: 10%;
    }

    .rounded-button {
    border-radius: 20px; /* Adjust the value to control the roundness of the button */
    padding: 10px 20px; /* Add padding for better button appearance */
    color: #ffffff; /* Set text color */
    border: none; /* Remove border */
    cursor: pointer; /* Change cursor to a pointer on hover */
}

tr .s{
    height: 50px; /* Adjust the height as needed */
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



    @include('sweetalert::alert')

<div class="container">
    <div class="product_form">
        <a href="{{ route('add_product') }}">
            <button class="rounded-button btn btn-success">Add Product</button>
        </a>
        
        
        <!-- Table to display product information -->
        <h3 class="mt-0 text-center"><u>Product List</u></h3>
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
                </tr>
                
            </thead>
            <tbody>
                @foreach ($products as $key => $product)

                {{-- scope="row">{{$key+1}}</th> --}}
                <tr class="s">
                    <th scope="row">{{$product->id}}</th>
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
                          <a href="#" class="action-button edit-button"  data-toggle="modal" data-target="#productedit{{$product->id}}">Edit</a>
                          
                          <form action="{{ route('delete_product',$product->id) }}" class="d-inline" method="POST" onsubmit="return confirm('Are you sure?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" >
                              Delete
                          </button>
                        </form>
                         
                      
                        </div>
                      </td>
                      
                </tr>
                @endforeach
            </tbody>
            
            
        </table>

        {{ $products->links() }}
    </div>
</div>


@foreach ($products as $key => $product)


<div class="modal fade" id="productedit{{$product->id}}" >
        <div class="modal-dialog">
            <div class="modal-content">
                <form method="POST" action="{{ route('edit_product',$product->id) }} ">
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
                            <input type="file" name="product_image"  class="form-control" required><br>
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



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@2.11.6/dist/umd/popper.min.js"></script>
</body>
</html>
