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
    .sub-menu-wrap {
        position: absolute;
        top: 100%;
        margin-top: -1px;
        right: 1%;
        width: 250px;
        max-height: 0px;
        overflow: hidden;
        transition: max-height 0.5s;
    }

    .sub-menu-wrap.open-menu {
        max-height: 400px;
    }

    .sub-menu {
        background: #fff;
        padding: 20px;
        margin: 10px;
    }

    .user-info {
        display: flex;
        align-items: center;
    }

    .user-info h3 {
        font-weight: 500;
        border-radius: 50%;
        margin-right: 10px;
    }

    .sub-menu hr {
        border: 0;
        height: 1px;
        width: 100%;
        background: #ccc;
        margin: 15px 0 10px;
    }

    .sub-menu-link {
        display: flex;
        align-items: center;
        text-decoration: none;
        color: #525252;
        margin: 12px 0;
    }

    .sub-menu-link p {
        width: 100%;
    }

    .sub-menu-link img {
        width: 40px;
        background: #e5e5e5;
        border-radius: 50%;
        padding: 8px;
        margin-right: 15px;
    }

    .sub-menu-link span {
        font-size: 22px;
        transform: transform 0.5s;
    }

    .sub-menu-link:hover span {
        transform: translateX(5px);
    }

    .sub-menu-link:hover p {
        font-weight: 600;
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
                <a href="{{ route('land') }}">
                    <i class="bx bxs-dashboard"></i>
                    <span class="text">Dashboard</span>
                </a>
            </li>
            <li>
                <a href="#">
                    <i class="bx bx-store"></i>
                    <span class="text">Product</span>
                </a>
            </li>
            <li>
                <a href="#">
                    <i class="bx bxs-group"></i>
                    <span class="text">Team</span>
                </a>
            </li>
            <li>
                <a href="#">
                    <i class="bx bx-message-rounded-dots"></i>
                    <span class="text">Message</span>
                </a>
            </li>
            <li>
                <a href="#">
                    <i class="bx bxs-report"></i>
                    <span class="text">Report</span>
                </a>
            </li>
        </ul>

        <ul class="side-menu">
            <li>
                <a href="#">
                    <i class='bx bxs-report'></i>
                    <span class="text">Monthly Report</span>
                </a>
            </li>
            <li>
                <a href="#" class="logout">
                    <i class='bx bxs-bar-chart-alt-2'></i>
                    <span class="text">Status</span>
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
                <span class="num">3</span>
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
                                <h3>&nbsp;&nbsp;&nbsp;<b>{{ auth()->user()->name }}</b></h3>
                            </div>
                            <hr />

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
                            <a href="{{ route('land') }}" class="sub-menu-link">
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
            <div class="head-title">
                <div class="left">
                    <h1>Dashboard</h1>
                    <ul class="next">
                        <li>
                            <a href="#">Dashboard</a>
                        </li>
                        <li><i class="bx bx-chevron-right"></i></li>
                        <li>
                            <a href="#" class="active">Home</a>
                        </li>
                    </ul>
                </div>
                <a href="#" class="btn-download">
                    <i class="bx bxs-cloud-download"></i>
                    <span class="text">Download PDF</span>
                </a>
            </div>
        </main>
    </section>
    <!--End content-->

<div class="middle">


</div>



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
        let subMenu = document.getElementById("subMenu");

        function toggleMenu() {
            subMenu.classList.toggle("open-menu");
        }
    </script>
</body>

</html>
