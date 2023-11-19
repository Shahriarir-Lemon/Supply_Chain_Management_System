<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('Dashboard/style.css') }}" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    
    <title>Category</title>
</head>
<style>
@import url('https://fonts.googleapis.com/css2?family=Lato:wght@400;700&family=Poppins:wght@400;500;600;700&display=swap');
    .mid{
margin-left: 270px;

        
    }

    .container {
        margin-left: 20px;
            max-width: 700px; /* Set your desired max width */
            height: auto;    /* Set your desired height */
            background-color: light; /* Optional: Change the background color */
            border: 1px solid black;    /* Optional: Add a border */
            padding: 20px;  
            margin-bottom: 20px;  
            margin-top: 30px; 
            align-content: center; 
            border-radius: 20px     /* Optional: Add padding */
        }
</style>
<body>

   
   

@include('Backend.Admin_Master.admin')
<div class="mid">


    <div class="container">
        <a href="{{ route('role_list') }}">
            <button type="submit" class="btn btn-success rounded-o">All Roles</button>

        </a>
        <center><h3><u>Create Role</u></h3></center><br>
        @include('message')
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
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@2.11.6/dist/umd/popper.min.js"></script>
    <script src="{{ asset('Dashboard/script.js') }}"></script>
</body>
</html>