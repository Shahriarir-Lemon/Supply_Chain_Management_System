




<header class="header fixed-top">
   
    <a class="Logo" href="{{ route('home') }}">Bakary<span>Gallery</span></a>

    <nav class="navbar">
      <a href="#Home" class="active">Home</a>
      <div class="dropdown">
          <button class="dropbtn">Categories &#9662;</button>
          <div class="dropdown-content">
              <a href="#Crackers">Crackers</a>
              <a href="#Doughnuts">Doughnuts</a>
              <a href="#Cookies">Cookies</a>
              <a href="#Biscuits">Biscuits</a>
              <a href="#Pastries">Pastries</a>
              <a href="#Bun">Bun</a>
              <a href="#Cakes">Cakes</a>
              <a href="#Bread">Bread</a>
          </div>
      </div>
      <a href="#Popular Items">Popular Items</a>
      <a href="#New Arivals">New Arrivals</a>
  </nav>
  
    
    <div class="activity-section">
     <i class="bx bx-search"></i>
     <i class="bx bx-heart"></i>
     
    </div>
   <a href="{{ route('view_cart') }}#Cart "> <button class="btn btn-outline-dark" type="submit">
      <i class="bi-cart-fill me-1"></i>
     
      <span class="badge bg-dark text-white ms-1 rounded-pill">
        @if(session()->has('view_card'))
          {{ count(session()->get('view_card')) }}
        @else
        0
        @endif
        
        </span>
  </button>  </a>

    @guest('customer')
 <a href="{{ route('customer_login_page') }}"><button class="btna">Sign in</button></a> 
 <a href="{{ route('customer_registration_form')}}#Sign Up "> <button class="btna">Sign Up</button></a>

@endguest


@auth('customer')
   
{{--  <a href="{{ route('customer_logout') }}"><button class="btna">Log out</button></a> --}}

<div class="profile-container">
   <img src="{{ Auth('customer')->user()->c_picture }}" alt="Profile Image">
   <div class="profile-dropdown">
     <a href="#" class="dropdown-item"><i class='bx bxs-user-circle'></i>  Profile</a>
     <a href="{{ route('customer_profile_edit_page') }}" class="dropdown-item"><i class='bx bxs-cog'></i>  Settings</a>
     <a href="{{ route('customer_logout') }}" class="dropdown-item"><i class='bx bxs-log-out-circle'></i>  Logout</a>
   </div>
 </div>

@endauth

</header>