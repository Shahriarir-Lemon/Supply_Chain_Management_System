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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
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
        max-width: 950px;
            background-color:light; 
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

.head1
{
   background: grey;
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
        <div style="text-align: right;">
        <a href="{{ route('user_form') }}">
            <button class="rounded-button btn btn-success">
                <i class="fas fa-plus"></i> Add User
            </button>
        </a>
        </div>
        
        <!-- Table to display product information -->
        <h3 class="mt-0 text-center"><u>User List</u></h3>
        
        <table class="table table-bordered ">
            <thead class="head1 text-white">
                <tr class="text-white text-center">
                    <th class="bg-secondary text-white" scope="col">SL</th>
                    <th class="bg-secondary text-white">User Name </th>
                    <th class="bg-secondary text-white">Email</th>
                    <th class="bg-secondary text-white">Role</th>
                    <th class="bg-secondary text-white">Action</th>
                
                </tr>
            </thead>
            <tbody>
               @foreach ($users as $key=>$user)
                {{-- scope="row">{{$key+1}}</th> --}}
                <tr class="s text-center">
                    <th scope="row">{{$user->id}}</th>
                    <td>{{ $user->user_name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                        @foreach ($user->roles as $role)
                    {{ $role->name }}
                    @endforeach
                 </td>
                
                    
                  <td>
                    
                     <button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#edituser{{$user->id}}">
                        <i class="fas fa-edit"></i>
                    </button> 
            
                    <form action={{ route('user_delete', $user->id ) }}"" class="d-inline" method="POST" onsubmit="return confirm('Are you sure?')">
                     @csrf
                     @method('DELETE')
                     <button type="submit" class="btn btn-warning btn-sm" >
                         <i class="fas fa-trash"></i>
                     </button>
                 </form>
            
                 </td>
                 
                </tr>
       @endforeach
            </tbody>
            
            
        </table>

       
    </div>
</div>

{{-- Edit user --}}

@foreach ($users as $user)

<div class="modal fade" id="edituser{{$user->id}}" tabindex="-1" role="dialog" aria-labelledby="editUserModalLabel{{$user->id}}" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="edituser{{$user->id}}">Edit User - {{ $user->user_name }}</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <!-- Edit User Form -->
          <form action="{{ route('user_edit',$user->id) }}" method="POST">
            @csrf
            @method('PUT') <!-- Use 'PUT' method for updating -->
  
            <!-- Your form fields go here, use the values from the $user object to pre-fill the fields -->
            <!-- For example: -->
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="editUserName">User Name</label>
                <input type="text" name="user_name" class="form-control" id="editUserName" placeholder="user name" value="{{ $user->user_name }}">
              </div>
              <div class="form-group col-md-6">
                <label for="inputEmail4">Email</label>
                <input type="email" name="email" value="{{ $user->email }}" class="form-control" id="inputEmail4" placeholder="Email">
              </div>
              
            </div>
  
            <div class="form-row">
                <div class="form-group col-md-6">
                  <label for="inputPassword4">Password</label>
                  <input type="password" name="password" class="form-control" id="inputPassword4" placeholder="Password">
                </div>
                <div class="form-group col-md-6">
                  <label for="inputPassword4">Confirm Password</label>
                  <input type="password" name="password_confirmation" class="form-control" id="inputPassword4" placeholder="Password">
                </div>
              </div>
              <div class="form-group">
                <label for="inputAddress">Address</label>
                <input type="text" name="address" value="{{ $user->Adress }}" class="form-control" id="inputAddress" placeholder="Uttara Sector 10">
              </div>
             
              <div class="form-row">
                <div class="form-group col-md-12">
                  <label for="inputCity">City</label>
                  <input type="text" name="city" value="{{ $user->City }}" class="form-control" placeholder="Dhaka" id="inputCity">
                </div>
              </div>
              <div class="form-row">
                 <div class="form-group col-md-12">
                  <label for="roles">Assign Role</label>
                  <select class="form-control col-md-12" name="roles" id="roles">
                    <option value="" disabled="" selected="">--- Select Category ---</option>
                    @foreach($roles as $role)
                        <option value="{{ $role->name }}" {{ $user->hasRole($role->name) ? 'selected' : '' }}>{{ $role->name }}</option>
                    @endforeach
                </select>
                 </div>
    
              </div>
    
  
            <button type="submit" class="btn btn-primary">Update User</button>
          </form>
          
        </div>
      </div>
    </div>
  </div>
  

  @endforeach
<!-- Edit User Modal -->




<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>
</html>
