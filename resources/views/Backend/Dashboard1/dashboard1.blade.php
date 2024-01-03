@extends('Backend.Dashboard1.main')

@section('content')



    {{-- button --}}
    <ul class="box-info">
                    
        <li>
            <i class='bx bxs-calendar-check' ></i>
            <span class="text">
                @if(auth()->user()->Role == 'Distributor' || auth()->user()->Role == 'Manufacturer')
                <h3>{{ $total }}</h3>
                <p>Total Request</p>
                @else
                <h3>{{ $total }}</h3>
                <p>Total Order</p>
                   
                @endif
                
            </span>
        </li>
        <li>
            <i class='bx bxs-group' ></i>
            <span class="text">
             @if(auth()->user()->Role == 'Admin' || auth()->user()->Role == 'Retailer')
                <h3>{{ $user }}</h3>
                <p>Customer</p>
            @elseif (auth()->user()->Role == 'Supplier')
                <h3>{{ $user }}</h3>
                <p>Manufacturer</p>
            @elseif (auth()->user()->Role == 'Manufacturer')
                <h3>{{ $user }}</h3>
                <p>Distributor</p>
            @elseif (auth()->user()->Role == 'Distributor')
                <h3>{{ $user }}</h3>
                <p>Retailer</p>
                @else
                @endif
            </span>
        </li>
        <li>
            <i class='bx bxs-dollar-circle' ></i>
            <span class="text">
                <h3>{{ $price }} .BDT</h3>
                <p>Total Sales</p>
            </span>
        </li>
    </ul>


    {{-- End button --}}




    {{-- table --}}

   
   

<div class="container">
<div class="row">
     <div class="col">        

    
    <div class="table-data">
        <div class="order">
            <div class="head">
                @if(auth()->user()->Role == 'Manufacturer' || auth()->user()->Role == 'Distributor')
                <h3>Recent Request</h3>
                @else
                <h3>Recent Orders</h3>
                @endif
                
            </div>
            <table>
                <thead>
                    <tr>
                        <th>Name</th>
                @if(auth()->user()->Role == 'Manufacturer' || auth()->user()->Role == 'Distributor')
                        <th>Date</th>
                @else
                <th>Date Order</th>

                @endif
                      <th>Status</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($recent as $cus)
                        
               
                    <tr>
                        <td>
                            <p>{{ $cus->name }}</p>
                        </td>

                        <td>{{ $cus->created_at->format('m F, Y') }}</td>

                        @if($cus->order_status == 'Canceled')

                        <td><span style="color:black;background:red;" class="status completed">{{ $cus->order_status }}</span></td>
                          
                        @elseif(auth()->user()->Role == 'Manufacturer' || auth()->user()->Role == 'Distributor' )
                       
                           
                             <td><span class="status completed">{{ $cus->approve_status }}</span></td>

                           
                          

                        @else

                        <td><span class="status completed">{{ $cus->order_status }}</span></td>

                        @endif
                    </tr>
                   
                    @endforeach
                  
                    
                </tbody>
            </table>
        </div>
    </div>
</div>



        <div class="col">

           @include('chat.chat')
                
        </div>




</div>
</div>


@endsection





    {{-- End table --}}






   