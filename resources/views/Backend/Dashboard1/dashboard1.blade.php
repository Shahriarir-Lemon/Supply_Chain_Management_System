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
                @else
                @endif
            </span>
        </li>
        <li>
            <i class='bx bxs-dollar-circle' ></i>
            <span class="text">
                <h3>70,000 .BDT</h3>
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
                <h3>Recent Orders</h3>
                
            </div>
            <table>
                <thead>
                    <tr>
                        <th>User</th>
                        <th>Date Order</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>
                            <img src="img/people.png">
                            <p>Shahriair Lemon</p>
                        </td>
                        <td>01-10-2021</td>
                        <td><span class="status completed">Completed</span></td>
                    </tr>
                    <tr>
                        <td>
                            <img src="img/people.png">
                            <p>Shahriair Alam</p>
                        </td>
                        <td>01-10-2021</td>
                        <td><span class="status pending">Pending</span></td>
                    </tr>
                    <tr>
                        <td>
                            <img src="img/people.png">
                            <p>Hello</p>
                        </td>
                        <td>01-10-2021</td>
                        <td><span class="status process">Process</span></td>
                    </tr>
                    <tr>
                        <td>
                            <img src="img/people.png">
                            <p>Lemon</p>
                        </td>
                        <td>01-10-2021</td>
                        <td><span class="status pending">Pending</span></td>
                    </tr>
                    
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






   