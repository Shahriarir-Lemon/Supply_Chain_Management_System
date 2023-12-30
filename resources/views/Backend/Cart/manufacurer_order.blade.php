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
    .pdf
    {
        margin-left: 810px;
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
           
          


            <div class="pdf">
                <form action="{{ route('supplier_report') }}" method="post" class="d-flex">
                    @csrf
                    <div class="form-group mr-2">
                        <select  style="width:90px;border:rgb(88, 75, 75) solid 1px;" class="form-control" id="reportType" name="report">
                            <option value="daily">Daily</option>
                            <option value="weekly">Weekly</option>
                            <option value="monthly">Monthly</option>
                        </select>
                    </div>
        
                    <button style="width: 200px;height:39px;" type="submit" class="btn btn-primary">Download Report</button>
                </form>
            </div>
        
            
            <!-- Table to display product information -->
            <h3 class="mt-0 text-center"><u>Manufacturer Order List</u></h3>
            <table class="table table-bordered ">
                <thead>
                    <tr style="background: grey;" class="a bg-secondary text-white">
                        <th style="background: grey;color:white;" scope="col">ID</th>
                        <th style="background: grey;color:white;">Customer Name</th>
                        <th style="background: grey;color:white;">Mobile</th>
                        <th style="background: grey;color:white;">Address</th>
                        <th style="background: grey;color:white;">Product Name</th>
                        <th style="background: grey;color:white;">Quantity</th>
                        <th style="background: grey;color:white;">Subtotal</th>
                        <th style="background: grey;color:white;">Total Price</th>
                        <th style="background: grey;color:white;">Order Status</th>
                        <th style="background: grey;color:white;">Payment Status</th>
                        <th style="background: grey;color:white;">Delevery Status</th>
                    </tr>
                    
                </thead>
                <tbody>

         

             @php $prevCustomerId = null; @endphp


   

        @foreach ($orders as $key => $order)

                    {{-- scope="row">{{$key+1}}</th> --}}
                    <tr class="s">
            


              @if ($prevCustomerId !== $order->manu_order->id)

                        <th scope="row">{{ $order->manu_order->id }}</th>
                        <td>{{ $order->manu_order->name }}</td>
                        <td>{{ $order->manu_order->mobile }}</td>
                        <td>{{ $order->manu_order->address }}</td>

             @else
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                @endif
                    
                
                        <td>{{ $order->product_name }}</td>
                        <td>{{ $order->quantity }}</td>
                        <td>{{ $order->subtotal }}</td>
                  
             @if ($prevCustomerId !== $order->manu_order->id)
                        <td>{{ $order->manu_order->total_price }}</td>




                       
                            
                  
                        <td>
                            <form action="{{ route('manufacturer_status_change',$order->id) }}" method="post">
                               @csrf
                               @method('PUT')
                                <select style="height:40px;width:120px;" name="status" required class="form-control">
                                    <option value="{{ $order->manu_order->order_status }}" selected>{{ $order->manu_order->order_status }}</option>
                                    <option value="Pending">Pending</option>
                                    <option value="Canceled">Canceled</option>
                                    <option value="Approved">Approved</option>
                                    
                                </select>
                                <button style="width:120px;" type="submit" class="btn btn-success">
                                   <span>Update</span>
                                </button>
                            </form>
                        
                           

                        </td>
                     


                        <td style="color: #28a745; font-weight:500">Cash</td>

                        <td>
                            <form action="{{ route('delivery_status_change',$order->id) }}" method="post">
                                @csrf
                                @method('PUT')
                                 <select style="height:40px;width:120px;" name="status" required class="form-control">
                                     <option value="{{ $order->manu_order->delevery_status }}" selected>{{ $order->manu_order->delevery_status }}</option>
                                     <option value="Pending">Pending</option>
                                     <option value="Progressing">Progressing</option>
                                     <option value="Done">Done</option>
                                     
                                 </select>
                                 <button style="width:120px;" type="submit" class="btn btn-success">
                                    <span>Update</span>
                                 </button>
                             </form>
                        </td>
                            
                @else
                        <td></td>
                        <td></td>
                        <td></td>
                        
                    @endif     
    
                        
                    
    
                    </tr>

         @php $prevCustomerId = $order->manu_order->id; @endphp
 @endforeach
 
                  
                </tbody>
                
                
            </table>
    
           
        </div>
    </div>

@endsection