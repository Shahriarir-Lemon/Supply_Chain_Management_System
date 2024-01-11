<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="SSLCommerz">
    <title>Payment</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }
    </style>
</head>
<body class="bg-light">
<div class="container">
  
    
    @php
    

    $user = auth()->guard('customer')->user();

    $cartcc = App\Models\CCart::where('user_id', $user->id)->count();
    @endphp




    <div style="margin-top: 100px;" class="row">

        
        <div class="col order-md-2 mb-4">
            <h4 class="d-flex justify-content-between align-items-center mb-3">
                <span class="text-muted">Your cart</span>
                <span class="badge badge-secondary badge-pill">{{ $cartcc }}</span>
            </h4>
            <ul class="list-group mb-3">



                @php
    

                $user = auth()->guard('customer')->user();
            $total = 0;
                $cart = App\Models\CCart::where('user_id', $user->id)->get();
                @endphp



                @foreach ($cart as $carts)


                <li class="list-group-item d-flex justify-content-between lh-condensed">
                    <div>
                        <h6 class="my-0">{{ $carts->product_name }}</h6>
                        <small class="text-muted">Quantity:({{ $carts->quantity }}) x  Price: ({{ $carts->price / $carts->quantity }})</small>
                    </div>
                    <span class="text-muted">{{ $carts->price }}</span>
                </li>

                @php
                $total = $total + $carts->price;
            @endphp

            @endforeach




            <li class="list-group-item d-flex justify-content-between">
                <span>Shipping Cost</span>
                <strong>70 TK</strong>
            </li>
              
                <li class="list-group-item d-flex justify-content-between">
                    <span>Total (BDT)</span>
                    <strong>{{ $total +70 }} TK</strong>
                </li>
            </ul>
        </div>
           

               

              
    </div>

              
               
                <hr class="mb-4">
                <button class="btn btn-primary btn-lg btn-block" id="sslczPayBtn"
                        token="if you have any token validation"
                        postdata="your javascript arrays or objects which requires in backend"
                        order="If you already have the transaction generated for current order"
                        endpoint="{{ url('/pay-via-ajax') }}"> Pay Now
                </button>
       
   

   
</div>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>


<!-- If you want to use the popup integration, -->
<script>
    var obj = {};
    obj.cus_name = $('#customer_name').val();
    obj.cus_phone = $('#mobile').val();
    obj.cus_email = $('#email').val();
    obj.cus_addr1 = $('#address').val();
    obj.amount = $('#total_amount').val();

    $('#sslczPayBtn').prop('postdata', obj);

    (function (window, document) {
        var loader = function () {
            var script = document.createElement("script"), tag = document.getElementsByTagName("script")[0];
            // script.src = "https://seamless-epay.sslcommerz.com/embed.min.js?" + Math.random().toString(36).substring(7); // USE THIS FOR LIVE
            script.src = "https://sandbox.sslcommerz.com/embed.min.js?" + Math.random().toString(36).substring(7); // USE THIS FOR SANDBOX
            tag.parentNode.insertBefore(script, tag);
        };

        window.addEventListener ? window.addEventListener("load", loader, false) : window.attachEvent("onload", loader);
    })(window, document);
</script>
</html>
