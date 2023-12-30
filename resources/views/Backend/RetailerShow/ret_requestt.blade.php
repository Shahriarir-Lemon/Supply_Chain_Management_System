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
        width: 100px;
        height: 100px;
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
    
    
    .pdf
    {
        margin-left: 810px;
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
    
      
   <div class="pdf">
        <form action="{{ route('manu_report') }}" method="post" class="d-flex">
            @csrf
            <div class="form-group mr-2">
                <select class="form-control" id="reportType" name="report">
                    <option value="daily">Daily</option>
                    <option value="weekly">Weekly</option>
                    <option value="monthly">Monthly</option>
                </select>
            </div>

            <button style="width: 200px;height:39px;" type="submit" class="btn btn-primary">Download Report</button>
        </form>
    </div>


 

    <div class="container">
        <div class="product_form"><br>
           
          
        
            
            <!-- Table to display product information -->
            <h3 class="mt-0 text-center"><u>All Request From Retailer</u></h3>
            <table class="table table-bordered ">
                <thead>
                    <tr style="background: grey;" class="a bg-secondary text-white">
                        <th style="background: grey;color:white;" scope="col"> #</th>
                        <th style="background: grey;color:white;">Name</th>
                        <th style="background: grey;color:white;">Phone</th>
                        <th style="background: grey;color:white;">Address</th>
                        <th style="background: grey;color:white;">Product Image</th>
                        <th style="background: grey;color:white;">Product Name</th>
                        <th style="background: grey;color:white;">Price</th>
                        <th style="background: grey;color:white;">Quantity</th>
                        <th style="background: grey;color:white;text-align:center;">Status</th>
                        <th style="background: grey;color:white;text-align:center;">Subtotal</th>
                       
                    </tr>
                    
            </thead>

                <tbody style="border:1px solid black;">

                                @php
                                    $orderdetails = App\Models\Cart1::all();
                                    $total=0;
                                @endphp


                                @foreach ($cart as $key => $detail)

                                    <tr style="border:1px solid black;">
                                        <td><a class="navi-link" href="#order-details"
                                                data-toggle="modal">{{ $detail->id }}</a></td>
                                        <td>{{ $detail->name }}</td>
                                        <td>{{ $detail->phone }}</span></td>

                                        

                                            <td>
                                        
                                                    <span>{{ $detail->address }}</span>
                                              
                                            </td>



                                            <td style="color:green;font-weight:600;">
                                                <img src="{{ $detail->image }}" alt="Product Image" class="product-image">
                                            </td>

                                <td>
                              
                                    <span>{{ $detail->product_name }}</span>

                                    </td>
                             

                                   
                                 <td>
                                    {{ $detail->price}} BDT</td>
                                      

                            
                                    <td class="text-center">
                                       {{ $detail->quantity }}
                                    </td>

                                    @if($detail->approve_status == 'Canceled')

                                       <td> <button class="btn btn-danger">Canceled</button></td>
                                    @elseif($detail->approve_status == 'Approved')
                                        
                                        <td> <button class="btn btn-success">Approved</button></td>
                                  
                                   @else
                                    <td style="text-align: center;">
                                        {{ $detail->approve_status }}<br><div class="spinner-border" role="status">
                                            <span class="visually-hidden">Loading...</span>
                                        </div><br>
                                        <a onclick="return confirm('Are You Sure to Approve the Request ? ')" href="{{ route('retailer_approve',$detail->id) }}"><button class="btn btn-success">Approve</button></a><br>
                                        <a onclick="return confirm('Are You Sure to Cancel the Request ? ')" href="{{ route('retailer_cancel',$detail->id) }}"><button style="width: 92px;" class="btn btn-danger">Cancel</button></a>
                                        
                                    </td>
                                  @endif
                               <td>{{ $detail->price * $detail->quantity }} BDT</td>

                                </tr>
                   
                            @if($detail->approve_status == 'Approved')
                                @php
                                    $total= $total + $detail->price;
                                @endphp
                                @endif
                                @endforeach

                            </tbody>
                

            </table>
    


           
           
            <table class="table table-bordered">
                <thead>
                    <tr class=" text-white">
                        
                    
                        <th class="col-11" style="text-align: right;">Total Price = </th>
                        <th class="col-1" style="color: #28a745">{{ $total }} BDT</th>
                     
                    
                    </tr>
                </thead>
             
    
                
            </table>
        



        </div>
    </div>

@endsection