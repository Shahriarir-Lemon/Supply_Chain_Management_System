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

    /* log in*/
    .login {
        display: inline-block;
        padding: 10px 20px;
        text-align: center;

        border: none;
        cursor: pointer;
        border-radius: 12px;
        font-weight: bold;
        color: white;
        /* Set text color to white */
    }

    .login-sign-in {
        background-color: gainsboro;
        /* Blue background color for Sign in */
        font-size: 16px;
    }

    .login-sign-up {
        background-color: gainsboro;
        /* Green background color for Sign up */
        font-size: 16px;
    }

    .login:hover {
        opacity: 0.8;
    }

    /*end log in */

    /*  table */
    .m {

        margin-left: 300px;
    }
</style>

<body>
    <!-- Sidebar -->

    <section id="sidebar">
        <a href="#" class="side">
            <i class="bx bxs-smile"></i>
            <span class="text">Home Page</span>
        </a>
        <ul class="side-menu top">
            <li class="active">
                <a href="#">
                    <i class="bx bxs-dashboard"></i>
                    <span class="text">Business Articles</span>
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
                    <span class="text">Our Team</span>
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
                    <span class="text">Overview</span>
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


            <a href="{{ route('getlogin') }}" class="login login-sign-in">
                <span><b>Sign in</b></span>
            </a>

            <a href="{{ route('reg') }}" class="login login-sign-up">
                <span><b>Sign up</b></span>
            </a>


        </nav>

        <!--End Navbar-->

        <!--Main-->
        <main>
            <div class="head-title">
                <div class="left">
                    <h1>Home Page</h1>
                    <ul class="next">
                        <li>
                            <a href="#">Home</a>
                        </li>
                        <li><i class="bx bx-chevron-right"></i></li>
                        <li>
                            <a href="#" class="active">Articles</a>
                        </li>
                    </ul>
                </div>
                <a href="#" class="btn-download">
                    <i class="bx bxs-cloud-download"></i>
                    <span class="text">Download Articles</span>
                </a>
            </div>
        </main>
    </section>
    <!--End content-->
   {{--   <div class="m">
        <table class="table table-bordered w-50">
            <thead>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col"> Email</th>
            </thead>
            <tbody>

                @foreach ($products as $item)
                    <tr>
                        <th scope="row">{{ $item->id }}</th>
                        <td>{{ $item->Name }}</td>
                        <td>{{ $item->Email }}</td>

                    </tr>
                @endforeach
            </tbody>
        </table>


    </div>  --}}


    <script src="{{ asset('Dashboard/script.js') }}"></script>

    <script>
        let subMenu = document.getElementById("subMenu");

        function toggleMenu() {
            subMenu.classList.toggle("open-menu");
        }
    </script>
</body>

</html>
