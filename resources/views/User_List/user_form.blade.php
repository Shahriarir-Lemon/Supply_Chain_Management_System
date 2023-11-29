@extends('Backend.Dashboard1.main')
@section('content')


<style>


    .container {
        
            max-width: auto; /* Set your desired max width */
            height: auto;    /* Set your desired height */
            background-color: rgb(235, 228, 228); /* Optional: Change the background color */
            border: 1px solid rgb(193, 179, 179);    /* Optional: Add a border */
            padding: 20px;  
            margin-bottom: 20px;  
            
            align-content: center; 
            border-radius: 20px     /* Optional: Add padding */
        }
</style>

   
   




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


@endsection






