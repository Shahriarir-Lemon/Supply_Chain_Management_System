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
    
      



 

    <div class="container">
        <div class="product_form"><br>
           
          
        
            
            <!-- Table to display product information -->
            <h3 class="mt-0 text-center"><u>Customer List</u></h3>
            <table class="table table-bordered ">
                <thead>
                    <tr style="background: grey;" class="a bg-secondary text-white">
                        <th style="background: grey;color:white;" scope="col"> #</th>
                        <th style="background: grey;color:white;">Customer Image</th>
                        <th style="background: grey;color:white;">Customer Name</th>
                        <th style="background: grey;color:white;">Username</th>
                        <th style="background: grey;color:white;">Email</th>
                        <th style="background: grey;color:white;">City</th>
                        <th style="background: grey;color:white;">Action</th>
                        
                       
                    </tr>
                    
            </thead>

                <tbody style="border:1px solid black;">

                                @php
                                    $orderdetails = App\Models\Cart1::all();
                                    $total=0;
                                @endphp


                                @foreach ($customers as $key => $detail)

                                    <tr style="border:1px solid black;">
                                        <td><a class="navi-link" href="#order-details"
                                                data-toggle="modal">{{ $detail->id }}</a>
                                            </td>

                                        <td style="color:green;font-weight:600;">
                                             <img src="{{ $detail->c_picture }}" alt="Product Image" class="product-image">
                                         </td>
                                        <td>{{ $detail->c_fullname }}</td>
                                        <td>{{ $detail->c_username }}</span></td>

                 
                                            <td>
                                        
                                                    <span>{{ $detail->c_email }}</span>
                                              
                                            </td>


                                   

                                       <td> {{ $detail->c_city }}</td>
                             

                                    <td>
                                       
                               
                                    <form action="{{ route('customer_delete', $detail->id) }}" class="d-inline" method="POST" onsubmit="return confirm('Are you sure?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-warning btn-sm" >
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                               
                                    </td>
                                
                                        
                                      
                             
                           
                                @endforeach

                            </tbody>
                

            </table>
    


        </div>
    </div>

@endsection