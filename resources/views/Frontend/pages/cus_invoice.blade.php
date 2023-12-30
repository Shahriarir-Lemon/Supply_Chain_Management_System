<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
     {{-- toastr cdn --}} 

 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" integrity="sha512-vKMx8UnXk60zUwyUnUPM3HbQo8QfmNx7+ltw8Pm5zLusl1XIfwcxo8DbWCqMGKaWeNxWA8yrx5v3SaVpMvR3CA==" crossorigin="anonymous" referrerpolicy="no-referrer" />


    <title>Invoice #{{ $orders->id }}</title>

    <style>
        html,
        body {
            margin: 10px;
            padding: 10px;
            font-family: sans-serif;
        }
        h1,h2,h3,h4,h5,h6,p,span,label {
            font-family: sans-serif;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 0px !important;
        }
        table thead th {
            height: 28px;
            text-align: left;
            font-size: 16px;
            font-family: sans-serif;
        }
        table, th, td {
            border: 1px solid #ddd;
            padding: 8px;
            font-size: 14px;
        }

        .heading {
            font-size: 24px;
            margin-top: 12px;
            margin-bottom: 12px;
            font-family: sans-serif;
        }
        .small-heading {
            font-size: 18px;
            font-family: sans-serif;
        }
        .total-heading {
            font-size: 18px;
            font-weight: 700;
            font-family: sans-serif;
        }
        .order-details tbody tr td:nth-child(1) {
            width: 20%;
        }
        .order-details tbody tr td:nth-child(3) {
            width: 20%;
        }

        .text-start {
            text-align: left;
        }
        .text-end {
            text-align: right;
        }
        .text-center {
            text-align: center;
        }
        .company-data span {
            margin-bottom: 4px;
            display: inline-block;
            font-family: sans-serif;
            font-size: 14px;
            font-weight: 400;
        }
        .no-border {
            border: 1px solid #fff !important;
        }
        .bg-blue {
            background-color: #414ab1;
            color: #fff;
        }
    </style>
</head>
<body>

    <table class="order-details">
        <thead>
            <tr>
                <th width="50%" colspan="2">
                    <h2 class="text-start">Bakery Shop</h2>
                </th>
                <th width="50%" colspan="2" class="text-end company-data">
                    <span>Invoice Id: #{{ $orders->id }}</span> <br>
                    <span>Date: {{ $today }}</span> <br>
                    <span>Zip code : 1230</span> <br>
                    <span>Address: Road: 12/b, Uttara Sector 10, Dhaka , Bangladesh</span> <br>
                </th>
            </tr>
            <tr class="bg-blue">
                <th width="50%" colspan="2">Order Details</th>
                <th width="50%" colspan="2">User Details</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Order Id:</td>
                <td>{{ $orders->id }}</td>

                <td>Full Name:</td>
                <td>{{ $orders->name }}</td>
            </tr>
            <tr>
                <td>Tracking Id/No.:</td>
                <td></td>

                <td>Email Id:</td>
                <td>{{ $orders->email }}</td>
            </tr>
            <tr>
                <td>Ordered Date:</td>
                <td>{{ $orders->created_at }}</td>

                <td>Phone:</td>
                <td>{{ $orders->mobile }}</td>
            </tr>
            <tr>
                <td>Payment Mode:</td>
                <td>{{ $orders->payment_status }}</td>

                <td>Address:</td>
                <td>{{ $orders->address }}</td>
            </tr>
            <tr>
                <td>Order Status:</td>
                <td>{{ $orders->order_status }}</td>

                <td>Pin code:</td>
                <td></td>
            </tr>
        </tbody>
    </table>

    <table>
        <thead>
            <tr>
                <th class="no-border text-start heading" colspan="5">
                    Order Items
                </th>
            </tr>
            <tr class="bg-blue">
                <th>ID</th>
                <th>Product Name</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Subtotal</th>
            </tr>
        </thead>
        <tbody>


         
    @foreach ($details as $detail )
                
            
            <tr>
                <td width="10%">{{ $detail->id }}</td>
                <td>
                    {{ $detail->product_name }}
                </td>
                <td width="10%">{{ $detail->price }} BDT</td>
                <td width="10%">{{ $detail->quantity }}</td>
                <td width="15%" class="fw-bold">{{ $detail->subtotal }} BDT</td>
            </tr>
          
           
  @endforeach
            <tr>
                <td colspan="4" class="total-heading text-right">Total Amount - <small>Inc. Shipping ( 70 BDT )</small> :</td>
                <td colspan="1" class="total-heading">{{ $detail->subtotal + 70 }} BDT</td>
            </tr>
        </tbody>
    </table>

    <br>
    <p class="text-center">
        Thank your for shopping...
    </p>


    {{-- toastr cdn --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>


  @include('SweetAlert.success')
  @include('SweetAlert.error')
  @include('SweetAlert.success1')

</body>
</html>