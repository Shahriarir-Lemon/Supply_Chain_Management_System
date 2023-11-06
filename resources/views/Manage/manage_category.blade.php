<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Manage Category</title>
</head>
<style>

.container {
        margin-left: 2px;
        max-width: 600px;
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
    
  
  align-items: center;
}

.action-button {
  padding: 5px 10px; 
  font-size: 12px; 
  text-decoration: none;
  border: 1px solid #ccc;
  border-radius: 6px;
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
            <button class="rounded-button btn btn-success">Add Category</button>
        </a>
        
        
        <!-- Table to display product information -->
        <h3 class="mt-0 text-center"><u>Category List</u></h3>
        
            <table class="table table-bordered " style="width: 100%;">
            <thead>
                <tr class="a bg-secondary text-white">
                    <th scope="col"><center>ID</center></th>
                    
                    <th><center>Category</center></th>
                    <th><center>Action</center></th>
                </tr>
                
            </thead>
            <tbody>
                @foreach ($products as $key => $product)

                {{-- scope="row">{{$key+1}}</th> --}}
                <tr class="s" class="text-center">
                    <th scope="row=" class="text-center">{{$product->id}}</th>
                    
                    <td class="text-center">{{ $product->Category }}</td>
                    <td style="text-align: center;">
                        <div class="action-buttons">
                         
                          <a href="#" class="action-button delete-button">Delete</a>

                         {{-- <a href="#" class="action-button delete-button">Delete</a>
                           --}} 
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
            
            
        </table>

        {{ $products->links() }}
    </div>
</div>



</body>
</html>
