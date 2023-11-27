@extends('Frontend.master')
@section('content')


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="{{ asset('frontend/card.css') }}" rel="stylesheet">
</head>

<body>
    <div class="container py-5">
        <h1 class="text-center">Popular Items</h1>
        <div class="row row-cols-1 row-cols-md-3 g-4 py-5">


            @foreach ($products as $product)


            <div class="col">
                <div class="card">
                    <img src="{{ $product->Product_Image }}" class="card-img-top" alt="Product Image" style="width: auto; height: 250px;">

                    <div class="card-body">
                        <h5 class="card-title">{{ $product->Product_Name }}</h5>
                        <p class="card-text text-center text-justify">Lorem ipsum dolor sit amet consectetur adipisicing elit. Laboriosam
                           </p>
                    </div>
                    <div class="mb-5 d-flex justify-content-around">
                        <h3>{{ $product->Price }} .tk</h3>
                        <a class="btn btn-outline-dark mt-auto text-white" href="#" style="background-color:black; border-radius: 10px;">Add to cart</a>
                    </div>
                    
                    
                </div>
            </div>

            @endforeach
         

            


          

         


        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
</body>

</html>

@endsection