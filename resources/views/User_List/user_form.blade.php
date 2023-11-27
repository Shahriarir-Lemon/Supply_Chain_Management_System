<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('Dashboard/style.css') }}" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    
    <title>Add User</title>
</head>
<style>
@import url('https://fonts.googleapis.com/css2?family=Lato:wght@400;700&family=Poppins:wght@400;500;600;700&display=swap');
    .mid{
margin-left: 270px;

        
    }

    .container {
        margin-left: 20px;
            max-width: 950px; /* Set your desired max width */
            height: auto;    /* Set your desired height */
            background-color: rgb(235, 228, 228); /* Optional: Change the background color */
            border: 1px solid rgb(193, 179, 179);    /* Optional: Add a border */
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
        <a href="{{ route('user_list') }}">
            <button type="submit" class="btn btn-success rounded-o">All Users</button>

        </a>
        <center><h3><u>Create User</u></h3></center><br>
       
        <form action="{{ route('user_create') }}" method="POST">
          @csrf
          
          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="inputEmail4">User Name</label>
              <input type="text" name="user_name" class="form-control" id="inputEmail4" placeholder="user name">
            </div>
            <div class="form-group col-md-6">
              <label for="inputEmail4">Email</label>
              <input type="email" name="email" class="form-control" id="inputEmail4" placeholder="Email">
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
            <input type="text" name="address" class="form-control" id="inputAddress" placeholder="Uttara Sector 10">
          </div>
         
          <div class="form-row">
            <div class="form-group col-md-12">
              <label for="inputCity">City</label>
              <input type="text" name="city" class="form-control" placeholder="Dhaka" id="inputCity">
            </div>
          </div>
          <div class="form-row">
             <div class="form-group col-md-12">
              <label for="roles">Assign Role</label>
              <select class="form-control col-md-12" name="roles" id="roles">
                <option value="" disabled="" selected="">--- Select Category ---</option>
                @foreach($roles as $role)
                    <option value="{{ $role->name }}">{{ $role->name }}</option>
                @endforeach
            </select>
             </div>

          </div>

       
          <button type="submit" class="btn btn-primary">Add user</button>
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