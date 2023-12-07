<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('Main1/style.css') }}" />


    {{-- favicon 
    <link type="image/x-icon" sizes="32x32" rel="icon" href="{{ asset('Main1/img/favicon.png') }}">

--}}
{{-- Raw materials table --}}
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
{{-- Raw materials form --}}
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

{{-- category cdn --}}
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
     <!-- Bootstrap JS and jQuery -->
     <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
     <!-- Font Awesome icons -->
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
   


    {{-- spinner --}}


    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />

    <title>System</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css" integrity="sha512-gOQQLjHRpD3/SEOtalVq50iDn4opLVup2TF8c4QPI3/NmUPNZOk2FG0ihi8oCU/qYEsw4P6nuEZT2lAG0UNYaw==" crossorigin="anonymous" referrerpolicy="no-referrer" />




   
</head>

<style>
    
.middle{
           
}
.dropdown {
        position: relative;
        display: inline-block;
    }

    .dropdown-content {
        display: none;
        position: absolute;
        background-color: #f9f9f9;
        min-width: 160px;
        box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
        z-index: 1;
    }

    .dropdown-content a {
        color: black;
        padding: 12px 16px;
        text-decoration: none;
        display: block;
    }

/*  profile */
.profile-container {
      position: relative;
      display: inline-block;
      cursor: pointer;
      margin-right: 35px;
    }

    .profile-dropdown {
      display: none;
      position: absolute;
      background-color: #e8e7e7;
      box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.4);
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
      background: light;
      
      font-weight: 500;
      color: white;
      height: 60px; 
      width: 150px; 
    }

    .dropdown-item:hover {
      background: rgb(247, 239, 239);
      color: white;
      
    }

</style>

<body>
    <!-- Sidebar -->

    

    <section id="sidebar">
        
       <div class="side">
            <i class="bx bxs-smile"></i>
            <span class="text"><b>{{ auth()->user()->Role }}</b></span>
        
       </div>
           
        <ul class="side-menu top">
            @if (Auth()->user()->can('edit.product'))
            <li>
                <a href="{{ route('dash') }}">
                    <i class="bx bxs-dashboard"></i>
                    <span class="text">Dashboard</span>
                </a>
            </li>
            @endif
            <li>
                <a href="{{route('raw_material_list')}}">
                    <img src="{{ asset('Main1/img/raw.png') }}">
                    <span class="text">Raw Matrials</span>
                </a>
            </li>
            <li>
                <a href="{{route('product_list')}}">
                    <img src="{{ asset('Main1/img/product.png') }}">
                    <span class="text">Products</span>
                </a>
            </li>
            <li>
                <a href="{{ route('category_list') }}">
                    <img src="{{ asset('Main1/img/manage.png') }}">
                    <span class="text">Manage Category</span>
                </a>
            </li>


           
            <li>
                <a href="{{ route('unit_list') }}">
                    <img src="{{ asset('Main1/img/manage.png') }}">
                    <span class="text">Manage Unit</span>
                </a>
            </li>
            <li class="dropdown">
                <a href="#" class="logout">
                    <img src="{{ asset('Main1/img/user.png') }}" alt="User Icon">
                    <span class="text">Users</span>
                </a>
                <div class="dropdown-content">
                    <a href="{{ route('role_list') }}">All Roles</a>
                    <a href="{{ route('user_list') }}">All Users</a>
                </div>
            </li>
        </ul>
    
        <ul class="side-menu">
            <li>
                <a href="{{ route('customer_order') }}">
                    <img src="{{ asset('Main1/img/order.png') }}">
                    <span class="text">Customer Orders</span>
                </a>
            </li>
            <li>
                <a href="#" class="logout">
                    <i class='bx bxs-report'></i>
                    <span class="text">Invoice</span>
                </a>
            </li>
          
        </ul>


    </section>
    <!--  end Sidebar -->


    <!--content-->

    <section id="content">
        <!--Navbar-->
        <nav>
            <i class="bx bx-menu"></i>
            <a href="#" class="nav-link"></a>
            <form action="#">
                <div class="form-input">
                    <input type="search" placeholder="Search..." />
                    <button type="submit" class="search-btn">
                        <i class="bx bx-search"></i>
                    </button>
                </div>
            </form>
            <a href="#" class="notification">
                <i class="bx bxs-bell"></i>
                <span class="num">2</span>
            </a>

         {{--  cart --}}

            <a href="{{ route('cart_show') }}"> <button class="btn btn-outline-dark" type="submit">
                <i class="bi-cart-fill me-1"></i>
               
                <span class="badge bg-dark text-white ms-1 rounded-pill">
                   
                 @php
                    $user = Auth::user();
                    $materials = App\Models\Material::all();
                    $items = $materials->count() > 0 ? App\Models\Cart::where('user_id', $user->id)->count() : 0;
                @endphp
                
              
                    {{ $items }}
                
                
                  </span>
            </button> 
         </a>
          
            {{-- Profile --}}


           


            <div class="profile-container">
                <img src="{{ asset('Main1/img/navigator.png') }}" alt="Profile Image">
                <div class="profile-dropdown">
                  <a href="#" class="dropdown-item"><i class='bx bxs-user-circle'></i>  Profile</a>
                  <a href="" class="dropdown-item"><i class='bx bxs-cog'></i>  Orders</a>
                  <a href="{{ route('admin_logout') }}" class="dropdown-item"><i class='bx bxs-log-out-circle'></i>  Logout</a>
                </div>
              
             
             
                    {{--  <div class="sub-menu-wrap" id="subMenu">
                        <div class="sub-menu">
                            <div class="user-info">
                                <img src="{{ asset('Main1/img/a.png') }}" />
                                <h3>&nbsp;&nbsp;&nbsp;<b></b></h3>
                            </div>
                            <hr />
                           {{--  {{ auth()->user()->name }} 
                            <a href="#" class="sub-menu-link">
                                <img src="{{ asset('Main1/img/profile.png') }}" />
                                <p>Edit Profile</p>
                                <span>></span>
                            </a>
                            <a href="#" class="sub-menu-link">
                                <img src="{{ asset('Main1/img/setting.png') }}" />
                                <p>Settings</p>
                                <span>></span>
                            </a>
                            <a href="#" class="sub-menu-link">
                                <img src="{{ asset('Main1/img/help.png') }}" />
                                <p>Help & Support</p>
                                <span>></span>
                            </a>
                            <a href="{{ route('admin_logout') }}" class="sub-menu-link">
                                <img src="{{ asset('Main1/img/logout.png') }}" />
                                <p>Log out</p>
                                <span>></span>
                            </a>
                        </div>
                    </div>   --}}


              
                    
                </div>
            </div>
        </nav>


        <!--End Navbar-->

        <!--Main-->
        
        <main>
            @include('Backend.Admin_Master.op')

            @include('notify::components.notify')
            @include('SweetAlert.success')

             @yield('content')
                 
           




        </main>
      
       
    </section>
    <!--End content-->



 
   


    <script src="{{ asset('Main1/script.js') }}"></script>

   
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            var dropdown = document.querySelector('.dropdown');
            var dropdownContent = dropdown.querySelector('.dropdown-content');
    
            dropdown.addEventListener('click', function (event) {
                event.stopPropagation(); // Prevents the click event from reaching the document
    
                dropdownContent.style.display = dropdownContent.style.display === 'block' ? 'none' : 'block';
            });
    
            document.addEventListener('click', function () {
                dropdownContent.style.display = 'none';
            });
        });
    </script>



{{-- profile --}}
<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>


   <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js" integrity="sha512-7VTiy9AhpazBeKQAlhaLRUk+kAMAb8oczljuyJHPsVPWox/QIXDFOnT9DUk1UC8EbnHKRdQowT7sOBe7LAjajQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
{{-- spinnrer --}}

{{-- sand --}}

<script>
    var obj = {};
    obj.cus_name = $('#customer_name').val();
    obj.cus_phone = $('#mobile').val();
    obj.cus_email = $('#email').val();
    obj.cus_addr1 = $('#address').val();
    obj.amount = $('#total_amount').val();
    
    $('#sslczPayBtn').prop('postdata', obj);
</script>


</body>

</html>
