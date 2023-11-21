<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<style>
    .dd
    {
        font-weight: 800;
        color: black;
    }
    .nav-link
    {
        color: black;
    }

    /* Prifile icon  */



    #profile-container {
            position: relative;
            display: inline-block;
           
        }

        #profile-icon {
            width: 50px;
            height: 50px;
            background-color: #3498db;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #fff;
            font-size: 22px;
            cursor: pointer;
        }

        #dropdown-content {
            display: none;
            position: absolute;
            background-color: lightgray;
            
            z-index: 1;
            font-family: 'Arial', sans-serif;
        }

  
    #dropdown-content a {
    color: #333;
    padding: 12px 16px;
    text-decoration: none;
    display: inline-block; /* Change to inline */
    font-size: 14px; /* Adjust the font size as needed */
    white-space: nowrap; /* Prevent text from wrapping */
}

        

        #profile-container:hover #dropdown-content {
            display: block;
        }
</style>

<body>

<nav class="navbar navbar-expand-lg navbar-light fixed-top text-white" style="background-color:  RGB(247, 202, 201);">
    <div class="container dd px-4 px-lg-5">
        <a class="navbar-brand text-black" href="#!">Bakery Shop</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="drop collapse navbar-collapse text-white" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                <li class="nav-item"><a class="nav-link active text-black" aria-current="page" href="#!">Home</a></li>
                <li class="nav-item"><a class="nav-link text-black" href="#!">About</a></li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-black" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Categories</a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="#!">All Products</a></li>
                        <li><hr class="dropdown-divider" /></li>
                        <li><a class="dropdown-item" href="#!">Bread </a></li>
                        <li><a class="dropdown-item" href="#!">Cakes</a></li>
                        <li><a class="dropdown-item" href="#!">Bun </a></li>
                        <li><a class="dropdown-item" href="#!">Pastries</a></li>
                        <li><a class="dropdown-item" href="#!">Biscuits </a></li>
                        <li><a class="dropdown-item" href="#!">Cookies</a></li>
                        <li><a class="dropdown-item" href="#!">Doughnuts </a></li>
                        <li><a class="dropdown-item" href="#!">Crackers</a></li>
                    </ul>
                </li>
                <li class="nav-item"><a class="nav-link active text-black" aria-current="page" href="#!">Popular Items</a></li>
                <li class="nav-item"><a class="nav-link text-black bg-lght" href="#!">New Arrivals</a></li>
            </ul>
            <form class="d-flex">
                <button class="btn btn-outline-dark text-white" type="submit">
                    <i class="bi-cart-fill me-2"></i>
                    Cart
                    <span class="badge bg-dark text-white ms-1 rounded-pill">0</span>
                </button>&nbsp;
                @auth
                <div id="profile-container">
                    <div id="profile-icon" class="fas fa-user"></div>
                    <div id="dropdown-content">
                        <a href="#">Edit Profile</a>
                        <a href="{{ ('customer_logout') }}">Log Out</a>
                    </div>
                </div>&nbsp;&nbsp;
                @endauth
                @guest
              
                <a href="{{ route('customer_login_page') }}" class="btn btn-light ms-1">Sign In</a>&nbsp;&nbsp;
                <a href="{{ route('customer_registration_form') }}" class="btn btn-light ms-2">Sign Up</a>
                  
                @endguest
            </form>

            
        </div>
    </div>
</nav>

<br>
</body>
</html>
