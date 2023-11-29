
@extends('Backend.Dashboard1.main')
@section('content')


<style>


    .container {
        
            max-width: auto; /* Set your desired max width */
            height: auto;    /* Set your desired height */
            background-color: light; /* Optional: Change the background color */
            border: 1px solid black;    /* Optional: Add a border */
            padding: 20px;  
            margin-bottom: 20px;  
            
            align-content: center; 
            border-radius: 20px     /* Optional: Add padding */
        }
</style>
<body>

   
   




    <div class="container">
        <a href="{{ route('role_list') }}">
            <button type="submit" class="btn btn-success rounded-o">All Roles</button>

        </a>
        <center><h3><u>Create Role</u></h3></center><br>
       
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
          </form>
    
            
           
    
        </div>

    
@endsection








