




<header class="header fixed-top">
   
    <a class="Logo" href="{{ route('home') }}">Bakary<span>Gallery</span></a>

    <nav class="navbar">
       <a href="#Home" class="active">Home</a>
       <a href="#Categories">Categories</a>
       <a href="#Popular Items">Popular Items</a>
       <a href="#New Arivals">New Arivals</a>
    </nav>
    
    <div class="activity-section">
     <i class="bx bx-search"></i>
     <i class="bx bx-heart"></i>
     <i class="bx bx-cart"></i>
    </div>
    @guest('customer')
 <a href="{{ route('customer_login_page') }}"><button class="btna">Sign in</button></a> 
 <a href="{{ route('customer_registration_form')}}#Sign Up "> <button class="btna">Sign Up</button></a>

@endguest


@auth('customer')
   
{{--  <a href="{{ route('customer_logout') }}"><button class="btna">Log out</button></a> --}}

<div class="profile-container">
   <img src="https://cdn.pixabay.com/photo/2019/03/28/22/23/link-4088190_1280.png" alt="Profile Image">
   <div class="profile-dropdown">
     <a href="#" class="dropdown-item"><i class='bx bxs-user-circle'></i>  Profile</a>
     <a href="{{ route('customer_profile_edit') }}" class="dropdown-item"><i class='bx bxs-cog'></i>  Settings</a>
     <a href="{{ route('customer_logout') }}" class="dropdown-item"><i class='bx bxs-log-out-circle'></i>  Logout</a>
   </div>
 </div>

@endauth

</header>