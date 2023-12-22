<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Report of Selling Product</title>

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
                    <span>Product Report</span> <br>
                    <span>Date: {{ $today }}</span> <br>
                    <span>Zip code : 1230</span> <br>
                    <span>Address: Road: 12/b, Uttara Sector 10, Dhaka , Bangladesh</span> <br>
                </th>
            </tr>
          
        </thead>
     
    </table>

    <table>
        <thead>
            <tr>
                <th class="no-border text-start heading" colspan="5">
                    Product List
                </th>
            </tr>
            <tr class="bg-blue">
                <th>Customer Name</th>
                <th>Phone</th>
                <th>Address</th>
              
                <th>Product Name</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Subtotal</th>
            </tr>
        </thead>
        <tbody>
            @php
                $total = 0;
            @endphp


           
    @foreach ($orders as $order)
                
            
            <tr>
                
                <td>{{ $order->manu_order->name }}</td>
                <td>
                    {{ $order->manu_order->mobile }}
                </td>
                <td>{{ $order->manu_order->address }}</td>
               
                <td>{{ $order->product_name }}</td>
                <td>{{ $order->price  }} BDT</td>
                <td>{{ $order->quantity }}</td>
                <td>{{ $a= $order->price * $order->quantity }} BDT</td>
            </tr>
          
          @php
              $total = $total + $a;
          @endphp
            @endforeach
            <tr>
                <td colspan="6" class="total-heading text-right">Total Amount -                      <small></small> :</td>
                <td colspan="1" class="total-heading">{{ $total }} BDT</td>
            </tr>
        </tbody>
    </table>

    <br>
    

</body>
</html>