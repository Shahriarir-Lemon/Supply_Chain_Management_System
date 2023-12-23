@extends('Backend.Dashboard1.main')
@section('content')

<style>

.container {
       
        
            background-color: white; 
            border: 1px solid #161111;    
            padding: 20px;  
            
            
            align-content: center; 
            border-radius: 20px   
        }
        .material-image {
        width: 200px; 

        height: auto; 
        border-radius: 0;
    }

    .rounded-button {
    border-radius: 20px; /* Adjust the value to control the roundness of the button */
    padding: 10px 20px; /* Add padding for better button appearance */
    color: #ffffff; /* Set text color */
    border: none; /* Remove border */
    cursor: pointer; /* Change cursor to a pointer on hover */
}

tr .s{
    height: 100px; /* Adjust the height as needed */
    text-align: center;
    vertical-align: middle;
}
.material-image {
        width: 200px; 

        height: auto; 
        border-radius: 10%;
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


/*   modal */

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
    width: 300px;
    height: auto;
    border: 1px solid #ddd;
    border-radius: 4px;
   
}
</style>





    

<div class="container">
    <div class="product_form">

      @if (Auth()->user()->can('manufacturer.view'))
      @if (Auth()->user()->can('distributor.view'))
         
        <a href="{{ route('add_raw_material') }}">
            <button class="rounded-button btn btn-success">Add Raw Materials</button>
        </a>
        @endif
        @endif
        
        
        <!-- Table to display product information -->
        <h3 class="mt-0 text-center"><u>Raw Material List</u></h3>


      



        <table class="table table-bordered ">
            <thead>
                <tr class="bg-secondary text-white">
                    <th scope="col">#</th>
                    <th>Material Image</th>
                    <th>Material Name</th>
                    <th> Price</th>
                    <th>Unit Type</th>
                    <th>Stock</th>
                    <th>Action</th>
                    @if (Auth()->user()->can('supplier.view'))
                    <th>Cart</th>
                    @endif
                
                </tr>
            </thead>
            <tbody>
                @foreach ($materials as $key => $material)

                {{-- scope="row">{{$key+1}}</th> --}}
                <tr class="s">
                    <th scope="row">{{$material->id}}</th>
                    <td><img src="{{ asset($material->Material_Image) }}" class="material-image"></td>
                    <td>{{ $material->Material_Name }}</td>
                    <td>{{ $material->Price }} TK</td>
                    <td>{{ $material->Unit_Type }}</td>
                    <td style="color: #28a745">
                       @if($material->Stock == 0)
                       <span style="color: red">Out of Stock</span>
                       @else
                      {{ $material->Stock }}
                      @endif
                    </td>
                    <td>
                        <div class="action-buttons">
                          <a href="#" class="action-button view-button" data-toggle="modal" data-target="#view{{$material->id}}">View</a>

                          @if (Auth()->user()->can('manufacturer.view'))
                          @if (Auth()->user()->can('distributor.view'))
                          <a href="#" class="action-button edit-button" data-toggle="modal" data-target="#edit{{ $material->id }}">Edit</a>
                          <a class="btn btn-danger btn-sm" onclick="return confirm('Are You Sure to Remove this Material ? ')" href="{{ route('delete_material',$material->id) }}">Delete</a>
                          @endif
                          @endif
                          

                         {{-- <a href="#" class="action-button delete-button">Delete</a>
                           --}} 
                        </div>
                      </td>
                   

                    @if (Auth()->user()->can('supplier.view'))
                      <td>
                        @if($material->Stock == 0)
                        <button class="btn btn-sm" data-toggle="modal" data-target="#cart{{$material->id}}" disabled>
                          <h6 style="color: red;"> <u>Add to cart</u></h6>
                          </button>
                        @else
                        <button class="btn btn-sm" data-toggle="modal" data-target="#cart{{$material->id}}">
                          <h6 style="color: #28a745;"> <u>Add to cart</u></h6>
                          </button>
                          @endif
                      
                      </td>

                      @endif
                </tr>
                @endforeach
            </tbody>
            
            
        </table>

        
    </div>
</div>




{{-- Add Cart --}}


@foreach ($materials as $key => $material)



<div class="modal fade" id="cart{{$material->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel{{$material->id}}" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel{{$material->id}}">Materials Information :</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       
        <div class="form-group">
          <label for="productName"><h4>Material Name: {{ $material->Material_Name }}</h4></label>
          
        </div>
        <!-- Input box for product price -->


   <form action="{{ route('add_cart' ,$material->id) }}" method="POST" enctype="multipart/form-data">
          @csrf

        <div class="form-group">
          <label for="productPrice">Material Quantity:</label>
          <input type="number" min="1" max="{{ $material->Stock }}" required name="quantity" class="form-control" id="productPrice" placeholder="Enter quantity">
        </div>
        <div class="form-group">
          <label for="productPrice">Price: {{ $material->Price }} .TK/{{ $material->Unit_Type }}</label>
          
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

{{-- end Add Cart --}}


{{-- View Raw Materials --}}
@foreach ($materials as $key => $material)

<div class="modal fade" id="view{{$material->id}}">
  <div class="modal-dialog modal-lg">
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
                      <td><label for="name">Material Image :</label></td>
                      <td><img src="{{ asset($material->Material_Image) }}" class="product-image"></td>
                  </tr>
                  <tr>
                      <td><label for="name">Material Name :</label></td>
                      <td>{{ $material->Material_Name }}</td>
                  </tr>
                  <tr>
                      <td><label for="name">Price :</label></td>
                      <td>{{ $material->Price}}</td>
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
                      <td><label for="name">Stock :</label></td>
                      <td>{{ $material->Stock}}</td>
                  </tr>
                  <tr>
                      <td><label for="name">Description :</label></td>
                      <td>{{ $material->Description }}</td>
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

{{-- End View Raw Materials --}}




{{-- Edit Raw Materials --}}

@foreach ($materials as $material )
  


<div class="modal fade" id="edit{{$material->id}}" >
  <div class="modal-dialog modal-lg">
      <div class="modal-content">
          <form method="POST" action="{{ route('edit_material',$material->id) }}" enctype="multipart/form-data">
              @csrf
              @method('PUT')
              <div class="modal-header">
                  <h5 class="modal-title"><i class="fas fa-edit"></i>
                      Edit Material</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                  </button>
              </div>
              <div class="modal-body">
                  
                  <div class="form-group">
                      <label for="name">Material Image</label>
                      <input type="file" name="material_image"  class="form-control"><br>
                      <img src="{{ asset($material->Material_Image) }}" class="product-image">
                  </div>
                  <div class="form-group">
                    <label for="name">Material Name</label>
                    <input type="text" name="material_name" value="{{ $material->Material_Name }}" class="form-control" required>
                </div>
                <div class="form-group">
                  <label for="name">Price </label>
                  <input type="number" name="material_price" value="{{ $material->Price}}" class="form-control" required>
              </div>
              <div class="form-group">
                <label for="name">Unit Type </label>
                <select class="form-control  col-md-12" name="material_unit" id="product:unit">
                  
                   @foreach($units as $key => $unit)
          <option value="{{ $unit->Unit_Name}}">{{ $unit->Unit_Name }}</option>
      @endforeach
              </select>
            </div>

           


          <div class="form-group">
            <label for="name">Stock </label>
            <input type="number" name="material_stock" value="{{ $material->Stock}}" class="form-control" required>
        </div>

        <div class="form-group">
          <label for="name">Description</label>
          <input type="text" name="material_description" value="{{ $material->Description }}" class="form-control">
      </div>

     

              </div>
              <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Update Material</button>
              </div>
          </form>
      </div>
  </div>
</div>
@endforeach

{{-- End raw Raw Materials --}}


{{-- delete raw materials --}}





{{--end delete raw materials --}}


@endsection