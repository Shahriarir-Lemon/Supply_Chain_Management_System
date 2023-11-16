<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Bakery Product Shop</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Bootstrap icons-->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="{{ asset('frontend/style.css') }}" rel="stylesheet" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
        {{-- sider --}}

        <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/css/splide.min.css">
    </head>

    <style>


.button-container {
            text-align: center;
        }

        .sign-in-button, .sign-up-button {
            display: inline-block;
            padding: 10px 20px;
            margin: 10px;
            
            text-decoration: none;
            color: #fff;
            font-size: 13px;
            font-weight: bold;
            border-radius: 8px;
            transition: background-color 0.3s ease;
        }

        .sign-in-button {
            background-color: #7691a3;
            font
            
        }

        .sign-up-button {
            background-color: #87a292;
        }

        .sign-in-button:hover, .sign-up-button:hover {
            background-color: #0b93ee;
        }
.body
{
    background: gray;
}
       
    </style>
    <body>
        <!-- Navigation--><div class="dody">

        </div>
       @include('Frontend.partials.navbar')

<br>
<br>
        <!-- Header-->
      
@include('Frontend.partials.header')



        <!-- Section-->
        <section class="py-5">
            <div class="container px-4 px-lg-5 mt-5">
                

            @yield('content')


            </div>
        </section>





        <!-- Footer-->
       @include('Frontend.partials.footer')


 </div>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
        <script src="js/scripts.js"></script>



        {{-- slider --}}

        <script src="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/js/splide.min.js"></script>

<script type="text/javascript">

var splide = new Splide( '.splide', {
  perPage: 4,
  perMove:1,
  type:'loop',
  autoplay: true,
  autoplaySpeed: 500,
  gap    : '4rem',
  breakpoints: {
    640: {
      perPage: 2,
      gap    : '.7rem',
      height : '6rem',
    },
    480: {
      perPage: 1,
      gap    : '.7rem',
      height : '6rem',
    },
  },
} );

splide.mount();

</script>
    </body>
</html>
