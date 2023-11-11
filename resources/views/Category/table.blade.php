<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
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
    <title>Category List</title>
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
        <a href="{{ route('add_category') }}">
            <button class="rounded-button btn btn-success">Add Category</button>
        </a>
        
        
        <!-- Table to display product information -->
        <h3 class="mt-0 text-center"><u>Category List</u></h3>
        
            <table class="table table-bordered " style="width: 100%;">
            <thead>
                <tr class="a bg-secondary text-white">
                    <th scope="col"><center>ID</center></th>
                    
                    <th><center>Category</center></th>
                   {{--   <th><center>Product Name</center></th> --}}
                    <th><center>Action</center></th>
                </tr>
                
            </thead>
            <tbody>

                @foreach ($categories as $key => $category)

                {{-- scope="row">{{$key+1}}</th> --}}
                <tr class="s" class="text-center">
                    <th scope="row=" class="text-center">{{$category->id}}</th>
                    
                    <td class="text-center">{{ $category->Category_Name }}</td>

                    

                    <td class="align-center" style="text-align: center;">
                        <div class="d-inline">

                           

                            <button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#editStudentModal{{$category->id}}">
                                <i class="fas fa-edit"></i>
                            </button>
                        
                            <form action="{{ route('delete_category',$category->id) }}" class="d-inline" method="POST" onsubmit="return confirm('Are you sure?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-warning btn-sm" >
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                            
                        </div>
                        
                        
                    </td>
                    
                </tr>
                @endforeach
            </tbody>
            
            
        </table>
        {{ $categories->links() }}
       
    </div>
</div>

@foreach ($categories as $key => $category)


<div class="modal fade" id="editStudentModal{{$category->id}}" tabindex="-1" role="dialog" aria-labelledby="editStudentModalLabel{{$category->id}}"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form method="POST" action="{{ route('edit_category',$category->id) }} ">
                    @csrf
                    @method('PUT')
                    <div class="modal-header">
                        <h5 class="modal-title" id="editStudentModalLabel{{$category->id}}"><i class="fas fa-edit"></i>
                            Edit Category</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        
                        <div class="form-group">
                            <label for="name">Category Name</label>
                            <input type="text" name="category_name" value="{{ $category->Category_Name }}" class="form-control" required>
                        </div>
                      
                       
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Save Changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endforeach





<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@2.11.6/dist/umd/popper.min.js"></script>
</body>
</html>
