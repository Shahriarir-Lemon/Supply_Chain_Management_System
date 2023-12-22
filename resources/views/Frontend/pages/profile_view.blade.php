@extends('Frontend.master')


@section('category')
    <style>
        .container3 {

            margin-top: 100px;




        }
    </style>


    <div class="container3">
        <div class="container mb-4 main-container mt-32" style="border: 1px solid black;border-radius:2px;">
            <div class="row">
                <div class="col-lg-4 pb-5">
                    <!-- Account Sidebar-->
                    <div class="author-card pb-3">
                        <div class="author-card-profile">
                            <div class="author-card-avatar"><img src="{{ auth('customer')->user()->c_picture }}"
                                    alt="Daniel Adams">
                            </div>
                            <div class="author-card-details mt-5">
                                <h5 class="author-card-name text-lg">
                                    <h2 style="font-size: 30px;font-weight:800">{{ auth('customer')->user()->c_fullname }}
                                    </h2>
                                </h5><span class="author-card-position">Joining Date:
                                    (({{ auth('customer')->user()->created_at }}))</span>
                            </div>
                        </div>
                    </div>
                    <div class="wizard">
                        <nav class="list-group list-group-flush">
                            <a class="list-group-item active" href="#">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div><i class="fa fa-shopping-bag mr-1 text-muted"></i>
                                        <div class="d-inline-block font-weight-medium text-uppercase">Orders List</div>
                                    </div><span class="badge badge-secondary">6</span>
                                </div>
                            </a>
                            <a class="list-group-item"
                                href="https://www.bootdey.com/snippets/view/bs4-profile-settings-page" target="__blank"><i
                                    class="fa fa-user text-muted"></i>Profile Settings</a><a class="list-group-item"
                                href="#"><i class="fa fa-map-marker text-muted"></i>Addresses</a>
                            <a class="list-group-item"
                                href="https://www.bootdey.com/snippets/view/bs4-wishlist-profile-page" tagert="__blank">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div><i class="fa fa-heart mr-1 text-muted"></i>
                                        <div class="d-inline-block font-weight-medium text-uppercase">My Wishlist</div>
                                    </div><span class="badge badge-secondary">3</span>
                                </div>
                            </a>
                            <a class="list-group-item" href="#">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div><i class="fa fa-tag mr-1 text-muted"></i>
                                        <div class="d-inline-block font-weight-medium text-uppercase">My Tickets</div>
                                    </div><span class="badge badge-secondary">4</span>
                                </div>
                            </a>
                        </nav>
                    </div>
                </div>
                <!-- Orders Table-->
                <div class="col-lg-8 pb-5">
                    <div class="d-flex justify-content-end pb-3">

                    </div>
                    <div class="table-responsive" style="border:1px solid black;">
                        <table class="table mb-0" style="border:1px solid black;">
                            <thead style="border:1px solid black;">
                                <tr style="border:1px solid black;">
                                    <th style="border:1px solid black;background:grey;color:white;">Order #</th>
                                    <th style="border:1px solid black;background:grey;color:white;">Date</th>
                                    <th style="border:1px solid black;background:grey;color:white;">Total</th>
                                    <th style="border:1px solid black;background:grey;color:white;">Order Status</th>
                                    <th style="border:1px solid black;background:grey;color:white;">Payment Status</th>
                                    <th style="border:1px solid black;background:grey;color:white;">Delivery Status</th>
                                    <th style="border:1px solid black;background:grey;color:white;">Action</th>
                                    <th style="border:1px solid black;background:grey;color:white;">Invoice</th>
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
                                                    <span style="color:green;">Approved</span>
                                                @endif
                                            </td>



                                <td style="border:1px solid black;color:green;font-weight:600;">Cash On Delivery</td>

                                <td style="border:1px solid black;">
                                @if ($order->order_status == 'Canceled')
                                    <span style="color:red;">Canceled by Admin</span>

                                    </td>
                                @else
                                    
                                        <div class="spinner-border" role="status">
                                            <span class="sr-only">Loading...</span>
                                        </div>
                                        Processing
                                    </td>
                                @endif





                                @if ($order->order_status == 'Pending')
                                   
                                        <td style="border:1px solid black;"><a
                                                href="{{ route('cus_cancel_order', $order->id) }}">Cancel</td></a>
                                    @elseif($order->order_status !== 'Canceled')
                                        <td style="border:1px solid black;">Not Allowed</td>
                                    @else
                                    <td style="border:1px solid black;">Not Allowed</td>
                                @endif




                                @if ($order->order_status == 'Approved')
                                    <td style="border: 1px solid black;" class="text-center">
                                        <a href="{{ route('cus_download', $order->id) }}"><i class='bx bxs-download'></i>
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
            </div>
        </div>

    </div>
@endsection
