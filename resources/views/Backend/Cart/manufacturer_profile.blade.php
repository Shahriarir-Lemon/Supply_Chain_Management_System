@extends('Backend.Dashboard1.main')
@section('content')


<style>

   
    .modal-content {
        margin: 20px auto;
    }
    
  
    .modal-body {
        padding: 20px;
    }
    
   
    .table {
        width: 100%;
    }
    
    
    .modal-footer {
        padding: 10px;
        text-align: center;
    }
    
 
    .product-image {
        max-width: 100%;
        height: auto;
        border: 1px solid #ddd;
        border-radius: 4px;
        padding: 5px;
    }
    
    
  
    .container {
           
            max-width: auto;
           
                background-color: white; 
                border: 1px solid #000;
                
              border-radius: 20px;
                align-content: center; 
                
            }
      
    
        .rounded-button {
        border-radius: 20px; 
        padding: 10px 20px; 
        color: #ffffff;
        border: none; 
        cursor: pointer; 
    }
    
    tr .s{
        height: 50px; 
        text-align: center;
        vertical-align: middle;
    }
    
    
    
    tr.a th {
      font-size: 15px; 
      height: 10px; 
      align-content: center;
    margin-left: -30px;
    margin-right: 20px;
    }
    
    
    
    
    
    
    .action-buttons {
      display: flex;
      gap: 5px; 
    }
    
    .action-button {
      padding: 5px 10px; 
      font-size: 12px; 
      text-decoration: none;
      border: 1px solid #ccc;
      border-radius: 6px;
    }
    
    .view-button {
      background-color: #28a745;
      color: #fff;
    }
    
    .edit-button {
      background-color: #ffc107;
      color: #000;
    }
    
    .delete-button {
      background-color: #dc3545;
      color: #fff;
    }
    
    
    </style>
    
    <body>
    
        @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    
      
    
    <div class="container">
        <div class="product_form"><br>
           
          
        
            
            <!-- Table to display product information -->
            <h3 class="mt-0 text-center"><u>My Orders</u></h3>
            <table class="table table-bordered ">
                <thead>
                    <tr style="background: grey;" class="a bg-secondary text-white">
                        <th style="background: grey;color:white;" scope="col">Order #</th>
                        <th style="background: grey;color:white;">Date</th>
                        <th style="background: grey;color:white;">Total</th>
                        <th style="background: grey;color:white;">Order Staus</th>
                        <th style="background: grey;color:white;">Payment Status</th>
                        <th style="background: grey;color:white;">Delivery Status</th>
                        <th style="background: grey;color:white;">Action</th>
                        <th style="background: grey;color:white;">Invoice</th>
                       
                    </tr>
                    
            </thead>

                <tbody style="border:1px solid black;">

                                @php
                                    $orderdetails = App\Models\CusOderDetail::all();
                                @endphp


                                @foreach ($orders as $key => $order)
                                    <tr style="border:1px solid black;">
                                        <td style="border:1px solid black;"><a class="navi-link" href="#order-details"
                                                data-toggle="modal">{{ $order->id }}</a></td>
                                        <td style="border:1px solid black;text-align:left;">April 04, 2017</td>
                                        <td style="border:1px solid black;">{{ $order->total_price }} BDT</span></td>

                                        

                                            <td style="border:1px solid black;">
                                                @if ($order->order_status == 'Pending')
                                                    <div class="spinner-border" role="status">
                                                        <span class="sr-only">Loading...</span>
                                                    </div>
                                                    Pending
                                                @elseif($order->order_status == 'Canceled')
                                                    <span style="color:red;">Canceled by Admin</span>
                                                @else
                                                    <span style="color:green;font-weight:700;">Approved</span>
                                                @endif
                                            </td>



                                <td style="border:1px solid black;color:green;font-weight:600;">Cash On Delivery</td>

                                <td style="border:1px solid black;">
                                @if ($order->order_status == 'Canceled')
                                    <span style="color:red;">Canceled by Admin</span>

                                    </td>

                                @elseif($order->delevery_status == 'Pending')
                                    <div class="spinner-border" role="status">
                                        <span class="sr-only">Loading...</span>
                                    </div>
                                    Pending
                                    </td>

                                @elseif($order->delevery_status == 'Progressing')
                                    <div class="spinner-border" role="status">
                                        <span class="sr-only">Loading...</span>
                                    </div>
                                    Progressing
                                    </td>

                                @else
                                    
                                        <span style="color: green;font-weight:700;">Done</span>
                                    </td>
                                @endif





                                @if ($order->order_status == 'Pending')
                                   
                                        <td style="border:1px solid black;"><a
                                                href="{{ route('manu_cancel_order', $order->id) }}">Cancel</td></a>
                                    @elseif($order->order_status !== 'Canceled')
                                        <td style="border:1px solid black;">Not Allowed</td>
                                    @else
                                    <td style="border:1px solid black;">Not Allowed</td>
                                @endif




                                @if ($order->order_status == 'Approved')
                                    <td style="border: 1px solid black;" class="text-center">
                                        <a href="{{ route('manu_invoice', $order->id) }}"><i class='bx bxs-download'></i>
                                            <br><span style="color: green;font-weight:800;">Download</span>
                                        </a>
                                    </td>
                                @else
                                    
                                @endif

                                </tr>
                                @endforeach

                            </tbody>
                
            </table>
    
           
        </div>
    </div>

@endsection