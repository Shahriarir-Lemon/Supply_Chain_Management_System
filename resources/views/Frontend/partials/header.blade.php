
@php
   $categories = App\Models\Category::all();
 
 
@endphp


 

<header class="header fixed-top">
   
    <a class="Logo" href="{{ route('home') }}">Bakary<span>Gallery</span></a>

    <nav class="navbar">
      <a href="{{ route('home') }}" class="active">Home</a>
      <div class="dropdown">
          <button class="dropbtn">Categories &#9662;</button>
          <div class="dropdown-content">


            @foreach ($categories as $key => $category) 

              <a href="{{ route('bakery_category', $category->id) }}">{{ $category->Category_Name }}</a>
            
              @endforeach



          </div>
      </div>
      <a href="{{ route('popular_items') }}">Popular Items</a>
      <a href="{{ route('new_arrivals') }}">New Arrivals</a>
  </nav>
  
    
    <div class="activity-section">
     
     <i class="bx bx-heart"></i>
     
    </div>
   <a href="{{ route('cus_cart_show') }}"> <button class="btn btn-outline-dark" type="submit">
      <i class="bi-cart-fill me-1"></i>
     
      <span class="badge bg-dark text-white ms-1 rounded-pill">


     @php
     if (Auth::guard('customer')->check())
     {
      $user = Auth::guard('customer')->user();

     }
        $product = App\Models\Product::all();
        $itema = App\Models\CCart::all();

     
        if($itema)
        if (Auth::guard('customer')->check())
     {

        $items = $itema->count() > 0 ? App\Models\CCart::where('user_id', $user->id)->count() : 0;
     }
    @endphp
    @php
        if (Auth::guard('customer')->check())
       
          echo $items; 
       
    @endphp
     
        </span>
  </button> 
 </a>



    @guest('customer')
 <a href="{{ route('customer_login_page') }}"><button class="btna">Sign in</button></a> 
 <a href="{{ route('customer_registration_form')}}#Sign Up "> <button class="btna">Sign Up</button></a>

@endguest


@auth('customer')
   
{{--  <a href="{{ route('customer_logout') }}"><button class="btna">Log out</button></a> --}}

<div class="profile-container">
   <img src="{{ Auth('customer')->user()->c_picture }}" alt="Profile Image">
   <div style="background:white;" class="profile-dropdown">
     <a href="{{ route('profile_view') }}" class="dropdown-item"><span><i class='bx bxs-user-circle'></i></span><span>Profile</span> </a>
     <a href="{{ route('customer_profile_edit_page') }}" class="dropdown-item"><span><i class='bx bxs-cog'></i></span><span>Settings</span>  </a>
     <a href="{{ route('customer_logout') }}" class="dropdown-item"><span><i class='bx bxs-log-out-circle'></i></span><span>Logout</span>  </a>
   </div>
 </div>

@endauth

</header>