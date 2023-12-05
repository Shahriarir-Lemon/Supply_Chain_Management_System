@extends('Frontend.master')

@section('category')

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
    <div class="container py-5 mt-5" id="Ad">
        <h1 class="text-center">Popular Items</h1>
        <div class="row row-cols-1 row-cols-md-3 g-4 py-5">


     @foreach ($products as $product)


            <div class="col">
                
                <div class="card">
                    <div class="text-center">
                        
                        <button class="btn btn-sm" data-toggle="modal" data-target="#pp{{$product->id}}">
                            <img src="{{ $product->Product_Image }}" class="card-img-top" alt="Product Image" style="width: auto; height: 250px;">    
                            </i>
                            </button>
                       
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">{{ $product->Product_Name }}</h5>
                        <p class="card-text text-center text-justify">Lorem ipsum dolor sit amet consectetur adipisicing elit. Laboriosam
                           </p>
                    </div> 
                    
                    <div class="mb-5 d-flex justify-content-around">
                        @if($product->Stock > 0)
                        <div class="alert alert-success">
                            Stock Available: {{ $product->Stock }} {{ $product->Unit_Type }}
                        </div>
                        @else
                            
                                <div class="alert alert-danger">
                                    Out of Stock
                                </div>
                                @endif

                    </div>
                    <div class="mb-5 d-flex justify-content-around">
                        <h3>{{ $product->Price }} .tk</h3>
                        <form action="{{ route('cus_add_cart',$product->id) }}" method="POST">
                            @csrf

                    <input type="hidden" value="1" required name="quantity" class="form-control" id="productPrice">

                      <button type="submit" class="btn btn-outline-green mt-auto text-white" style="background-color:green; border-radius: 10px;">Add to Cart</a></button>

                    </form>
                    </div>
                  
                    
                    
                </div>
             </div>

            @endforeach
         

    

        </div>
    </div>




    @foreach ($products as $product)



    
<div class="modal fade" id="pp{{$product->id}}" tabindex="-1" role="dialog" aria-labelledby="editStudentModalLabel{{$product->id}}"
    aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            
                
                <div class="modal-body">
                   
                    @include('Frontend.pages.productview')
                  
                   
                </div>
               
           
        </div>
    </div>
</div>

@endforeach


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
</body>

</html>




@endsection