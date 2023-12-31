@extends('Backend.Dashboard1.main')
@section('content')



<style>

.container {
   
        max-width: auto;
        /* Set your desired max width */
               /* Set your desired height */
            background-color: white; /* Optional: Change the background color */
            border: 1px solid #161111;    /* Optional: Add a border */
            padding: 20px;  
            margin-bottom: 20px;  
           
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



   

<div class="container">
    <div class="product_form">
        <a href="{{ route('add_unit') }}">
            <button class="rounded-button btn btn-success">Add Unit</button>
        </a>
        
        
        <!-- Table to display product information -->
        <h3 class="mt-0 text-center"><u>Unit List</u></h3>
        
            <table class="table table-bordered " style="width: 100%;">
            <thead>
                <tr class="a bg-secondary text-white">
                    <th scope="col"><center>ID</center></th>
                    
                    <th><center>Unit</center></th>
                   {{--   <th><center>Product Name</center></th> --}}
                    <th><center>Action</center></th>
                </tr>
                
            </thead>
            <tbody>

                @foreach ($units as $key => $unit)

                {{-- scope="row">{{$key+1}}</th> --}}
                <tr class="s" class="text-center">
                    <th scope="row=" class="text-center">{{$unit->id}}</th>
                    
                    <td class="text-center">{{ $unit->Unit_Name }}</td>

                    

                    <td class="align-center" style="text-align: center;">
                        <div class="d-inline">
                            <button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#editStudentModal{{$unit->id}}">
                                <i class="fas fa-edit"></i>
                            </button>
                        
                            <form action="{{ route('delete_unit',$unit->id) }}" class="d-inline" method="POST" onsubmit="return confirm('Are you sure?')">
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
        {{ $units->links() }}
       
    </div>
</div>

@foreach ($units as $key => $unit)


<div class="modal fade" id="editStudentModal{{$unit->id}}" tabindex="-1" role="dialog" aria-labelledby="editStudentModalLabel{{$unit->id}}"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form method="POST" action="{{ route('edit_unit',$unit->id) }} ">
                    @csrf
                    @method('PUT')
                    <div class="modal-header">
                        <h5 class="modal-title" id="editStudentModalLabel{{$unit->id}}"><i class="fas fa-edit"></i>
                            Edit Unit</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        
                        <div class="form-group">
                            <label for="name">Unit Type</label>
                            <input type="text" name="unit_name" value="{{ $unit->Unit_Name }}" class="form-control" required>
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



@endsection




