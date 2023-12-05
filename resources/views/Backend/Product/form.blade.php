@extends('Backend.Dashboard1.main')
@section('content')



<style>
  
      .container {
  
            max-width: auto; /* Set your desired max width */
            height: 700px;    /* Set your desired height */
            background-color: white; /* Optional: Change the background color */
            border: 1px solid black;    /* Optional: Add a border */
            padding: 20px;  
            margin-bottom: 20px;  
            
            align-content: center; 
            border-radius: 20px     /* Optional: Add padding */
        }

</style>


@if(session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif

@if(session('message'))
    <div class="alert alert-{{ session('type') }}">
        {{ session('message') }}
    </div>
@endif


    
  <div class="container">
    <a href="{{route('product_list')}}">
        <button type="submit" class="btn btn-success rounded-o">See Product List</button>
       
    </a>
    <div class="product_form">
        
        <h3 class="mt-1 text-center"><u>Enter Your Product Information</u></h3>
        <form action="{{ route('product_store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-row">
                
                <div class="form-group col-md-6">
                    <label for="product:stock" style="color: black;"><b>Product Image:</b> :</label>
                    <input type="file" class="form-control" name="product_image" placeholder="Upload Image" required>
                </div>
               {{--   <div class="form-group col-md-6">
                    <label for="product:stock" style="color: black;"><b>Category ID:</b> :</label>
                    <input type="number" class="form-control" name="category_id" placeholder="category_id" required>
                </div>
                --}}
                <div class="form-group col-md-6">
                    <label for="product:stock" style="color: black;"><b>Product Name :</b> :</label>
                    <input type="text" class="form-control" id="product:name" name="product_name" placeholder="Product Name" required>
                </div>
                <div class="form-group col-md-6">
                    <label for="product:stock" style="color: black;"><b>Price :</b> :</label>
                    <input type="text" class="form-control" id="product:price" name="product_price" placeholder="Price" required>
                </div>
            </div>

            <div class="form-group">
                <label for="product:stock" style="color: black;"><b>Unit Type :</b> :</label>
                <select class="form-control  col-md-12" name="product_unit" id="product:unit">
                    <option value="" disabled="" selected="">--- Select Unit ---</option>

                     @foreach($units as $key => $unit)
            <option value="{{ $unit->Unit_Name}}">{{ $unit->Unit_Name }}</option>
        @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="product:stock" style="color: black;"><b>Category :</b> :</label>
                <select class="form-control  col-md-12" name="product_category" id="product:category">
                    <option value="" disabled="" selected="">--- Select Category ---</option>

            @foreach($categories as $key => $category)
             <option value="{{ $category->Category_Name}}">{{ $category->Category_Name }}</option>
            @endforeach
                   
                </select>
            </div>

            <div class="form-group">
                <label for="product:stock" style="color: black;"><b>Stock :</b> :</label><br>

                <input type="number" class="form-control" id="product:stock" name="product_stock" placeholder="Stock" required>
            </div>

            <div class="form-group">
                <label for="product:stock" style="color: black;"><b>Description</b> :</label>
                <textarea class="form-control  col-md-12" id="product:description" name="product_description" placeholder="Description"></textarea>
            </div>

            <button type="submit" class="btn btn-success">Add Product</button>
        </form>


        
       

    </div>
</div>


  @endsection


   

