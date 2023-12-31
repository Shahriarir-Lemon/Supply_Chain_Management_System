<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('Dashboard/style.css') }}" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8sh+WyTG62sB9SB6j6p8qpv+tnL0b9IHcuuBfN" crossorigin="anonymous">

    <title>System</title>
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

</style>

<body>
    <!-- Sidebar -->

    <section id="sidebar">
        
        <a href="#" class="side">
            <i class="bx bxs-smile"></i>
            <span class="text"><b>Admin Panel</b></span>
        </a>
        <ul class="side-menu top">
            <li class="active">
                <a href="{{ route('dash') }}">
                    <i class="bx bxs-dashboard"></i>
                    <span class="text">Dashboard</span>
                </a>
            </li>
            <li>
                <a href="{{ route('raw_material_list') }}">
                    <img src="{{ asset('Dashboard/img/raw.png') }}">
                    <span class="text">Raw Matrials</span>
                </a>
            </li>
            <li>
                <a href="{{ route('product_list') }}">
                    <img src="{{ asset('Dashboard/img/product.png') }}">
                    <span class="text">Products</span>
                </a>
            </li>
            <li>
                <a href="{{ route('category_list') }}">
                    <img src="{{ asset('Dashboard/img/manage.png') }}">
                    <span class="text">Manage Category</span>
                </a>
            </li>


           
            <li>
                <a href="{{ route('unit_list') }}">
                    <img src="{{ asset('Dashboard/img/manage.png') }}">
                    <span class="text">Manage Unit</span>
                </a>
            </li>
            <li class="dropdown">
                <a href="#" class="logout">
                    <img src="{{ asset('Dashboard/img/user.png') }}" alt="User Icon">
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
                <a href="#">
                    <img src="{{ asset('Dashboard/img/order.png') }}">
                    <span class="text">Orders</span>
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
        <div class="">
        <nav class="fixed-top">
            <i class="bx bx-menu"></i>
            <a href="#" class="nav-link">Categories</a>
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
          
            <div class="dropdown">
                <a href="#" class="only-img" id="profile-dropdown">
                    <img src="{{ asset('Dashboard/img/a.png') }}" onclick="toggleMenu()" />
                </a>
                <div class="dropdown-content" id="dropdown-content">
                    <div class="sub-menu-wrap" id="subMenu">
                        <div class="sub-menu">
                            <div class="user-info">
                                <img src="{{ asset('Dashboard/img/a.png') }}" />
                                <h3>&nbsp;&nbsp;&nbsp;<b> </b></h3>
                            </div>
                            <hr />
{{--  {{ auth()->user()->name }} --}}
                            <a href="#" class="sub-menu-link">
                                <img src="{{ asset('Dashboard/img/profile.png') }}" />
                                <p>Edit Profile</p>
                                <span>></span>
                            </a>
                            <a href="#" class="sub-menu-link">
                                <img src="{{ asset('Dashboard/img/setting.png') }}" />
                                <p>Settings</p>
                                <span>></span>
                            </a>
                            <a href="#" class="sub-menu-link">
                                <img src="{{ asset('Dashboard/img/help.png') }}" />
                                <p>Help & Support</p>
                                <span>></span>
                            </a>
                            <a href="{{ route('admin_logout') }}" class="sub-menu-link">
                                <img src="{{ asset('Dashboard/img/logout.png') }}" />
                                <p>Log out</p>
                                <span>></span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
    </div>

        <!--End Navbar-->

        <!--Main-->
        <main>
            
 <!-- Button  -->
               
 


<!-- end Button  -->


<!-- Table  -->
  
      
<!-- end Table  -->
        </main>
      
       
    </section>
    <!--End content-->



   {{--  <div class="m" >
        <form action="{{ route('store.data') }}" method="post">
            @csrf
            <div class="form-group">
                <label for="">Enter Name</label>
                <input type="text" name="name" class="form-control" placeholder="Enter name">

            </div>
            <div class="form-group">
                <label for="">Enter mail</label>
                <input type="email" name="email" class="form-control" placeholder="example@gmail.com">
            </div>

            <button type="submit" class="btn btn-success">Submit</button>
        </form>
    </div>    --}} 




    <script src="{{ asset('Dashboard/script.js') }}"></script>

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
</body>

</html>
