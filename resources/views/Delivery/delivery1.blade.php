@extends('Backend.Dashboard1.main')
@section('content')




<style>

.container {
      
        max-width: auto;
            background-color:light; 
            border: 1px solid #161111;    
            padding: 20px;  
            margin-bottom: 20px;  
         
            align-content: center; 
            border-radius: 20px   
        }
        .material-image {
        width: 200px; 

        height: auto; 
        border-radius: 0;
    }

    .rounded-button {
    border-radius: 20px; /* Adjust the value to control the roundness of the button */
    padding: 10px 20px; /* Add padding for better button appearance */
    color: #ffffff; /* Set text color */
    border: none; /* Remove border */
    cursor: pointer; /* Change cursor to a pointer on hover */
}

.head1
{
   background: grey;
}


tr .s{
    height: 100px; /* Adjust the height as needed */
    text-align: center;
    vertical-align: middle;
}
.material-image {
        width: 200px; 

        height: auto; 
        border-radius: 10%;
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





    

<div class="container">
    <div class="product_form">
        <div style="text-align: right;">
       
   

        <a href="{{ route('delivery_form1') }}">
            <button class="rounded-button btn btn-success">
                <i class="fas fa-plus"></i> Add Delivery Man
            </button>
        </a>
   
        </div>
        
        <!-- Table to display product information -->
        <h3 class="mt-0 text-center"><u>DeliveryMan List</u></h3>
        
        <table class="table table-bordered ">
            <thead class="head1 text-white">
                <tr class="text-white text-center">
                    <th class="bg-secondary text-white" scope="col">SL</th>
                    <th class="bg-secondary text-white">Name </th>
                    <th class="bg-secondary text-white">Email</th>
                    <th class="bg-secondary text-white">Phone</th>
                       
                    <th class="bg-secondary text-white">Status</th>
                    <th class="bg-secondary text-white">Task</th>
                    <th class="bg-secondary text-white">Action</th>
               
                
                </tr>
            </thead>
            <tbody>
               @foreach ($dataa as $key=>$user)
                {{-- scope="row">{{$key+1}}</th> --}}
                <tr class="s text-center">
                    <th scope="row">{{$user->id}}</th>
                    <td>{{ $user->user_name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->phone }}</td>
                    @if($user->status == 'Assigned')
                    <td><span style="background: red;font-weight:700;color:white;"> {{ $user->status }}</span></td>
                    @else
                    <td><span style="background: green;font-weight:700;color:white;">{{ $user->status }}</span></td>
                  @endif
               

                  @if($user->status == 'Assigned')
                   <td> <span style="background: grey;padding:5px;">Not Available</span></td>
                  @else
                  <td><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">Delivery</button>
                  </td>
                  @endif
       
                  <td>
                   
            
                    <form action="{{ route('delivery_delete1', $user->id ) }}" class="d-inline" method="POST" onsubmit="return confirm('Are you sure?')">
                     @csrf
                     @method('DELETE')
                     <button type="submit" class="btn btn-warning btn-sm" >
                         <i class="fas fa-trash"></i>
                     </button>
                 </form>
            
                 </td>
                 

            
                </tr>
       @endforeach
            </tbody>
            
            
        </table>

       
    </div>
</div>



{{-- modal --}}

<div class="modal" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" style="max-width: 90%;" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Modal Title</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
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
                        <th style="background: grey;color:white;">Task</th>

                    </tr>
                    
                </thead>
                <tbody>

         

             @php $prevCustomerId = null;
              $d = 1;
                      
              @endphp


   

        @foreach ($orders as $key => $order)

                    {{-- scope="row">{{$key+1}}</th> --}}
                    <tr class="s">
            


              @if ($prevCustomerId !== $order->cus_order->id)

                        <th scope="row">{{ $order->cus_order->id }}</th>
                        <td>{{ $order->cus_order->name }}</td>
                        <td>{{ $order->cus_order->mobile }}</td>
                        <td>{{ $order->cus_order->address }}</td>

             @else
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                @endif
                    
                
                        <td>{{ $order->product_name }}</td>
                        <td>{{ $order->quantity }}</td>
                        <td>{{ $order->subtotal }}</td>
                  
             @if ($prevCustomerId !== $order->cus_order->id)
                        <td>{{ $order->cus_order->total_price }}</td>




                       
                            
                  
                        <td>
                            <form action="{{ route('cus_status_change',$order->id) }}" method="post">
                               @csrf
                               @method('PUT')
                                <select style="height:40px;width:120px;" name="status" required class="form-control">
                                    @if($order->cus_order->order_status=='Approved')
                                    <option style="color: green;font-weight:700;background:green;" value="{{ $order->cus_order->order_status }}" selected><span style="background: greeen;">{{ $order->cus_order->order_status }}</span></option>
                                    @else
                                    <option value="{{ $order->cus_order->order_status }}" selected>{{ $order->cus_order->order_status }}</option>
                                    @endif
                                    <option value="Pending">Pending</option>
                                    <option value="Canceled">Canceled</option>
                                    <option style="color: green;font-weight:700;" value="Approved">Approved</option>
                                    
                                </select>
                                <button class="btn btn-success" style="width:120px;" type="submit">
                                   <span>Update</span>
                                </button>
                            </form>
                        
                           

                        </td>
                     


                        <td style="color: #28a745; font-weight:500">Cash</td>

                        <td>
                            <form action="{{ route('cus_delivery_change',$order->id) }}" method="post">
                                @csrf
                                @method('PUT')
                                 <select style="height:40px;width:120px;" name="status" required class="form-control">
                                     <option value="{{ $order->cus_order->delevery_status }}" selected>{{ $order->cus_order->delevery_status }}</option>
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
                    @if ($prevCustomerId !== $order->cus_order->id)

                    @if($user->id) 
                     @if($order->cus_order->man == $user->id)
                     <td>
                         <button style="background: grey;padding:4px; color:white;font-weight:700">Assigned</button> 

                     </td>
                     @else
                     <td>
                         <form action="{{ route('man_change1', ['id' => $d+1, 'idd' => $order->cus_order->id]) }}" method="get">
                             @csrf
                            
                         <button type="summit" style="background: grey;padding:4px; color:white;font-weight:700">Assign</button> 
                         </form>
                     </td>
                     @endif
                     @endif

                     @else
                     <td></td>


                     @php $prevCustomerId = $order->cus_order->id;
                     $d = $d +1;
                     
                @endphp
                     @endif

                         
                     
     
                        
                    
    
                    </tr>

         @php $prevCustomerId = $order->cus_order->id; @endphp
 @endforeach
 
                  
                </tbody>
                
                
            </table>
    
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <!-- Additional buttons if needed -->
        </div>
      </div>
    </div>
  </div>



@endsection