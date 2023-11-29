@extends('Backend.Dashboard1.main')
@section('content')




<style>

.container {
       
        max-width: auto;
            background-color:light; 
            border: 1px solid #161111;    
            padding: 20px;  
            margin-bottom: 20px;  
          
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
        <a href="{{ route('role_form') }}">
            <button class="rounded-button btn btn-success">Add Role</button>
        </a>
        
        
        <!-- Table to display product information -->
        <h3 class="mt-0 text-center"><u>Role List</u></h3>
        <table class="table table-bordered ">
            <thead class="head1 text-white">
                <tr class="text-white text-center">
                    <th class="bg-secondary text-white" scope="col">SL</th>
                    <th class="bg-secondary text-white">Role Name </th>
                    <th class="bg-secondary text-white">Permissions</th>
                    <th class="bg-secondary text-white">Action</th>
                    
                
                </tr>
            </thead>
            <tbody>
               @foreach ($roles as $role)

                {{-- scope="row">{{$key+1}}</th> --}}
                <tr class="s text-center">
                    <th scope="row">{{ $loop->index+1 }}</th>
                    <td>{{ $role->name }}</td>

                    <td>
                     
                         @foreach ($role->permissions as $permission)
                             <span class="badge badge-info mr-1">
                                 {{ $permission->name }}
                             </span>
                        
                     @endforeach
                 </td>
                 
                    
                  <td class="text-center">
                     <div>
                     <button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#editrole{{$role->id}}">
                        <i class="fas fa-edit"></i>
                    </button> 
                  </div>
                  <br>
                  <div>
                    <form action="{{ route('role_delete',$role->id) }}" class="d-inline" method="POST" onsubmit="return confirm('Are you sure?')">
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

       
    </div>
</div>


@foreach ($roles as $role)

<div class="modal fade" id="editrole{{$role->id}}" tabindex="-1" role="dialog" aria-labelledby="createRoleModalLabel{{$role->id}}" aria-hidden="true">
   <div class="modal-dialog modal-lg" role="document">
       <div class="modal-content">
           <div class="modal-header">
               <h5 class="modal-title" id="createRoleModalLabel{{$role->id}}">Edit Role</h5>
               <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                   <span aria-hidden="true">&times;</span>
               </button>
           </div>
           <div class="modal-body">
               <!-- Your form goes here -->
               <form action="{{ route('role_edit', $role->id) }}" method="POST">
               
                     @csrf
                     @method('PUT')
                 
                     <div class="form-group row">
                         <label for="inputEmail3" class="col-sm-3 col-form-label"><b>Enter Role Name: </b></label>
                         <div class="col-sm-7">
                             <input required type="text" value="{{ $role->name }}" name="name" class="form-control" id="inputEmail3" placeholder="Role Name">
                         </div>
                     </div>
                     <br>
                     <fieldset class="form-group">
                         <div class="row">
                             <legend class="col-form-label col-sm-3 pt-0"><b>Permissions :</b></legend>
                             <div class="col-sm-9">
                                 @foreach ($permissions as $permission)
                                     <div class="form-check">
                                         <input class="form-check-input" type="checkbox" name="permissions[]" id="permission{{ $permission->id }}" value="{{ $permission->name }}" {{ in_array($permission->name, $role->permissions->pluck('name')->toArray()) ? 'checked' : '' }}>
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
                             <button type="submit" class="btn btn-primary">Update Role</button>
                         </div>
                     </div>
                 </form>
                 
           </div>
           <!-- You can add a modal footer if needed -->
       </div>
   </div>
</div>
@endforeach



@endsection