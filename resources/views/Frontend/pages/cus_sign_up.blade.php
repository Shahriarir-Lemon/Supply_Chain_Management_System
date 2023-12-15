
@extends('Frontend.master')


@section('content')


<style>

.form1
{ 
   
   
    border: 1px solid #282222; /* Add a 1px solid border with a light gray color */
        padding: 50px 20%; /* Add padding as needed */
  
}
.form1 {
    background: #e8e7e7;
   padding-top: 30px;
   
}
.form1 h2
{
    padding-bottom: 70px;
}
label
{
    font-weight: 700;
    font-size: 18px;
}

</style>



<div id="Sign Up">
<div class="form1">
<form action="{{ route('customer_registration') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <h2><center><u>Customer Registration</u></center></h2>

    @if(Session::has('message'))
    <div class="alert alert-{{ Session::get('type') }}">
        {!! Session::get('message') !!}
    </div>
@endif




    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach



         







        </ul>
    </div>
@endif
    <div class="form-row inline">
        <div class="form-group col-md-12 inline">
          <label for="inputEmail4">Profile Picture :</label>
          <input required type="file" name="c_picture" class="form-control" id="inputEmail4" placeholder="Picture">
        </div>
      
      </div>
    <div class="form-row inline">
        <div class="form-group col-md-12 inline">
          <label for="inputEmail4">Full Name :</label>
          <input required type="text" name="c_fullname" class="form-control" id="inputEmail4" placeholder="full name">
        </div>
      
      </div>
    <div class="form-row inline">
      <div class="form-group col-md-6 inline">
        <label for="inputEmail4">User Name :</label>
        <input required type="text" name="c_username" class="form-control" id="inputEmail4" placeholder="user name">
      </div>
      <div class="form-group col-md-6">
        <label for="inputPassword4">Email :</label>
        <input required type="email" name="c_email" class="form-control" id="inputPassword4" placeholder="email">
      </div>
    </div>
    <div class="form-row inline">
        <div class="form-group col-md-6 inline">
          <label for="inputEmail4">Password :</label>
          <input required type="password" name="password" class="form-control" id="inputEmail4" placeholder="password">
        </div>
        <div class="form-group col-md-6">
          <label for="inputPassword4">Retype Passwor :</label>
          <input required type="password" name="password_confirmation" class="form-control" id="inputPassword4" placeholder="password">
        </div>
      </div>
    <div class="form-group">
      <label for="inputAddress">Address :</label>
      <input required type="text" name="c_address" class="form-control" id="inputAddress" placeholder="Road 12/b and ...">
    </div>
   
    <div class="form-row">
      <div class="form-group col-md-8">
        <label for="inputCity">City :</label>
        <input required type="text" name="c_city" class="form-control" id="inputCity" placeholder="Dhaka">
      </div>
     
      <div class="form-group col-md-4">
        <label for="inputZip">Zip :</label>
        <input required type="number" name="c_zip" class="form-control" id="inputZip" placeholder="1230">
      </div>
    </div>
    <div class="form-row">
        
            <label for="inputState">Occupation :</label>
            <select id="inputState" required name="c_occupation" class="form-control">
                <option value="" disabled="" selected="">--- Select Occcupation ---</option>

                <option value="General People">General People</option>
                <option value="Student">Student</option>
                <option value="Businessman">Businessman</option>
                <option value="Teacher">Teacher</option>
            </select>
          </div>
       
        <br>
        <div class="form-row">
            <div class="form-group col-md-10">
               <a href="{{ route('customer_login_page') }}"> <button type="button" data-toggle="modal" data-target="#login" class="btn btn-primary"><span style="background: green;">Already Registered?</span> </button></a>
            </div>
            
            <div class="form-group col-md-1">
                <a href=""><button type="submit" class="btn btn-primary"><span style="background: green;">Register</span></button></a>
            </div>
          </div>
    
  </form>
</div>
</div>





@endsection


