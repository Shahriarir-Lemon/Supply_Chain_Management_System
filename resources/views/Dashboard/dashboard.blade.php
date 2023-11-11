<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('Dashboard/style.css') }}" />
   
    <title>System</title>
</head>

<style>
    
.middle{
           
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
                <a href="{{route('raw_material_list')}}">
                    <img src="{{ asset('Dashboard/img/raw.png') }}">
                    <span class="text">Raw Matrials</span>
                </a>
            </li>
            <li>
                <a href="{{route('product_list')}}">
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
            <li>
                <a href="#" class="logout">
                    <img src="{{ asset('Dashboard/img/user.png') }}">
                    <span class="text">Users</span>
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
          
            <div class="dropdown">
                <a href="#" class="only-img" id="profile-dropdown">
                    <img src="{{ asset('Dashboard/img/a.png') }}" onclick="toggleMenu()" />
                </a>
                <div class="dropdown-content" id="dropdown-content">
                    <div class="sub-menu-wrap" id="subMenu">
                        <div class="sub-menu">
                            <div class="user-info">
                                <img src="{{ asset('Dashboard/img/a.png') }}" />
                                <h3>&nbsp;&nbsp;&nbsp;<b></b></h3>
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


        <!--End Navbar-->

        <!--Main-->
        <main>
            @include('Admin_Master.op')
 <!-- Button  -->
               
  @include('Admin_Master.button')


<!-- end Button  -->


<!-- Table  -->
  
      @include('Admin_Master.table')

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

   
</body>

</html>
