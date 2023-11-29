<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bakery Product Shop</title>
    <link rel="stylesheet" href="{{ asset('frontend/style.css') }}">
    <link href="https://unpkg.com/boxicons@latest/css/boxicons.min.css" rel="stylesheet">
    <!-- Link Swiper's CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
     <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="{{ asset('frontend/assets/favicon.ico') }}" />
        <!-- Bootstrap icons-->
    
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="{{ asset('frontend/css/styles.css') }}" rel="stylesheet" />
        
       <!--sweet alart notify -->

       <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css" integrity="sha512-gOQQLjHRpD3/SEOtalVq50iDn4opLVup2TF8c4QPI3/NmUPNZOk2FG0ihi8oCU/qYEsw4P6nuEZT2lAG0UNYaw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

        <!-- Bootstrap registration form-->

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
       
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="{{ asset('frontend/style.css') }}" rel="stylesheet" />
       
        {{-- cart --}}
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
   
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
        {{-- cart --}}
        <link href="{{ asset('frontend/cart.css') }}" rel="stylesheet" />

        @notifyCss


        {{-- modal --}}
        <link href="{{ asset('frontend/modal.css') }}" rel="stylesheet" />


    </head>

    <style>
      /* Styles remain the same as in the previous example */

      .profile-container {
      position: relative;
      display: inline-block;
      cursor: pointer;
    }

    .profile-dropdown {
      display: none;
      position: absolute;
      background-color: #e8e7e7;
      box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
      z-index: 1;
      right: 0;
    }

    .profile-container img {
      width: 40px;
      height: 40px;
      border-radius: 50%;
      margin-right: 10px;
    }

    .profile-container:hover .profile-dropdown {
      display: block;
    }

    .dropdown-item {
      padding: 20px 30px;
      background: black;
      
      font-weight: 500;
      color: #3c2e2e;
      height: 60px; 
      width: 150px; 
    }

    .dropdown-item:hover {
      background: #242222;
    }
    /* Dropdown  */



/* Style the dropdown button */
.dropbtn {
    display: inline-block;
    background-color: #e8e7e7;
    color:  #222;
    padding: 14px 16px;
    border: none;
    cursor: pointer;
    font-weight: 500;
    font-size: 18px;
}

/* Style the dropdown content */
.dropdown-content {
    display: none;
    position: absolute;
    background-color: #f9f9f9;
    box-shadow: 0 8px 16px 0 rgba(0, 0, 0, 0.2);
    z-index: 1;
    min-width: 160px; /* Set a minimum width for the dropdown */
}

/* Style the dropdown links */
.dropdown-content a {
    color: black;
    padding: 12px 16px;
    display: block;
    text-align: left;
    text-decoration: none;
}

/* Change color on hover */
.dropdown-content a:hover {
    background-color: #ddd;
}

/* Show the dropdown menu on hover */
.dropdown:hover .dropdown-content {
    display: block;
}
    



  </style>





<body>

  @include('notify::components.notify')
    
    <!--   header  -->

    
   
  @include('Frontend.partials.header')

<!--   End header  -->



      <!--First move picture start  Section-->

    
@include('Frontend.partials.header1')
     
<!--End move picture First Section-->







<!--card  start  Section-->





  @yield('content')

  @include('notify::components.notify')

 <!-- card End 2nd Section-->



<!--cheef start-->

@include('Frontend.partials.cheef')

<!--cheef end here-->


<!--start why bakery gallery here-->

 @include('Frontend.partials.facility')

<!--end why bakery gallery here-->


<!-- Start Review Section here-->


@include('Frontend.partials.review')


<!-- End Review Section here-->



<!-- Start footer Section here-->
    
@include('Frontend.partials.footer')
   
<!-- End footer Section here-->
    



<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>


  <!-- Swiper JS -->
  <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>


    <script src="{{ asset('frontend/style.js') }}"></script>
       <script src="{{ asset('frontend/js/scripts.js') }}"></script>


  <!-- notify JS -->

  <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js" integrity="sha512-7VTiy9AhpazBeKQAlhaLRUk+kAMAb8oczljuyJHPsVPWox/QIXDFOnT9DUk1UC8EbnHKRdQowT7sOBe7LAjajQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>




<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

@include('SweetAlert.error')


<!-- modal -->


<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>




@notifyJs

</body>
</html>