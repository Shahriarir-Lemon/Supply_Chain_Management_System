<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Raw Materials Form</title>
</head>
<style>
  
      .container {
        margin-left: 20px;
            max-width: 700px; /* Set your desired max width */
            height: 700px;    /* Set your desired height */
            background-color: white; /* Optional: Change the background color */
            border: 1px solid black;    /* Optional: Add a border */
            padding: 20px;  
            margin-bottom: 20px;  
            margin-top: 30px; 
            align-content: center; 
            border-radius: 20px     /* Optional: Add padding */
        }

</style>
<body>
   

    


<body>

    
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
                <select class="form-control  col-md-12" name="materialt_unit" id="product:unit">
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


  


    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>

</body>

</html>
