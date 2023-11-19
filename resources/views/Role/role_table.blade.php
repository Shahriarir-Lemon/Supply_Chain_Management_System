<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Bootstrap JS and jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Font Awesome icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
   <title>Roles</title>
</head>
<style>

.container {
        margin-left: 2px;
        max-width: 910px;
            background-color: #efe3e3, 0.941); 
            border: 1px solid #161111;    
            padding: 20px;  
            margin-bottom: 20px;  
            margin-top: 30px; 
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

</style>

<body>



    

<div class="container">
    <div class="product_form">
        <a href="{{ route('role_form') }}">
            <button class="rounded-button btn btn-success">Add Role</button>
        </a>
        
        
        <!-- Table to display product information -->
        <h3 class="mt-0 text-center"><u>Role List</u></h3>
        <table class="table table-bordered ">
            <thead>
                <tr class="bg-secondary text-white text-center">
                    <th scope="col">SL</th>
                    <th>Role Name </th>
                    <th>Action</th>
                    
                
                </tr>
            </thead>
            <tbody>
               @foreach ($roles as $role)

                {{-- scope="row">{{$key+1}}</th> --}}
                <tr class="s text-center">
                    <th scope="row">{{ $loop->index+1 }}</th>
                    <td>{{ $role->name }}</td>
                    
                  <td class="text-center">
                     <button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#editrole{{$role->id}}">
                        <i class="fas fa-edit"></i>
                    </button>
                     <a href="#"><i class="fas fa-trash"></i></a>
                 </td>
                 
                </tr>
       @endforeach
            </tbody>
            
            
        </table>

       
    </div>
</div>


@foreach ($roles as $role)

<div class="modal fade" id="editrole{{$role->id}}" tabindex="-1" role="dialog" aria-labelledby="createRoleModalLabel{{$role->id}}" aria-hidden="true">
   <div class="modal-dialog" role="document">
       <div class="modal-content">
           <div class="modal-header">
               <h5 class="modal-title" id="createRoleModalLabel{{$role->id}}">Create Role</h5>
               <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                   <span aria-hidden="true">&times;</span>
               </button>
           </div>
           <div class="modal-body">
               <!-- Your form goes here -->
               <form action="{{ route('role_create') }}" method="POST">
                   @csrf
                   <div class="form-group row">
                     <label for="inputEmail3" class="col-sm-3 col-form-label"><b>Enter Role Name:  </b></label>
                     <div class="col-sm-9">
                       <input required type="text" name="name" class="form-control" id="inputEmail3" placeholder="Email">
                     </div>
                   </div>
                   <br>
                   <fieldset class="form-group">
                     <div class="row">
                       <legend class="col-form-label col-sm-3 pt-0"><b>Permissions :</b></legend>
                       <div class="col-sm-9">
                      @foreach ($permissions as $permission )
                          
                      
                         <div class="form-check">
                           <input class="form-check-input" type="checkbox" name="permission" id="permission{{ $permission->id }}" value="{{ $permission->name }}">
                           <label class="form-check-label" for="permission{{ $permission->id }}">
                               {{ $permission->name }}
                           </label>
                         </div>
                         @endforeach
                       </div>
                     </div>
                   </fieldset>
                 <br>
       
                   <div class="form-group row">
                       <div class="col-sm-8 text-center">
                           <button type="submit" class="btn btn-primary">Add Role</button>
                       </div>
                   </div>
                   <div class="form-group row">
                       <div class="col-sm-8 text-center">
                           <button type="submit" class="btn btn-primary">Add Role</button>
                       </div>
                   </div>
               </form>
           </div>
           <!-- You can add a modal footer if needed -->
       </div>
   </div>
</div>
@endforeach


<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>
</html>
