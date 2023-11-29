
@extends('Backend.Dashboard1.main')
@section('content')

<style>
  
      .container {
        margin-left: 20px;
            max-width: auto; /* Set your desired max width */
            height: auto;    /* Set your desired height */
            background-color: white; /* Optional: Change the background color */
            border: 1px solid black;    /* Optional: Add a border */
            padding: 20px;  
           
            
            align-content: center; 
            border-radius: 20px     /* Optional: Add padding */
        }

</style>


    
  <div class="container">
    <a href="{{route('raw_material_list')}}">
        <button type="submit" class="btn btn-success rounded-o">See Raw Materials</button>
       
    </a>
    <div class="product_form">
        
        <h3 class="mt-1 text-center"><u>Enter Your Materials Information</u></h3>
        <form action="{{ route('material_store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-row">
                <div class="form-group col-md-12">
                    <label for="product:stock" style="color: black;"><b>Materials Image:</b> :</label>
                    <input type="file" class="form-control" name="material_image" placeholder="Upload Image" required>
                </div>
                <div class="form-group col-md-6">
                    <label for="product:stock" style="color: black;"><b>Materials Name :</b> :</label>
                    <input type="text" class="form-control" id="product:name" name="material_name" placeholder="Material Name" required>
                </div>
                <div class="form-group col-md-6">
                    <label for="product:stock" style="color: black;"><b>Price :</b> :</label>
                    <input type="text" class="form-control" id="product:price" name="material_price" placeholder="Price" required>
                </div>
            </div>

            <div class="form-group">
                <label for="product:stock" style="color: black;"><b>Unit Type :</b> :</label>
                <select class="form-control  col-md-12" name="material_unit" id="product:unit">
                    <option value="" disabled="" selected="">--- Select Unit ---</option>
                    <option value="KG">KG</option>
                    <option value="PCS">PCS</option>
                    <option value="LTR">LTR</option>
                </select>
            </div>

           

            <div class="form-group">
                <label for="product:stock" style="color: black;"><b>Stock :</b> :</label><br>

                <input type="number" class="form-control" id="product:stock" name="material_stock" placeholder="Stock" required>
            </div>

            <div class="form-group">
                <label for="product:stock" style="color: black;"><b>Description</b> :</label>
                <textarea class="form-control  col-md-12" id="product:description" name="material_description" placeholder="Description"></textarea>
            </div>

            <button type="submit" class="btn btn-success">Add Raw Materials</button>
        </form>


        
       

    </div>
</div>


  
@endsection



