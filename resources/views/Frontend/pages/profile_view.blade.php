@extends('Frontend.master')


@section('category')



<style>

    .container3
    {

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
                    <div class="author-card-avatar"><img src="{{ auth('customer')->user()->c_picture }}" alt="Daniel Adams">
                    </div>
                    <div class="author-card-details">
                        <h5 class="author-card-name text-lg">Daniel Adams</h5><span class="author-card-position">Joined February 06, 2017</span>
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
                    </a><a class="list-group-item" href="https://www.bootdey.com/snippets/view/bs4-profile-settings-page" target="__blank"><i class="fa fa-user text-muted"></i>Profile Settings</a><a class="list-group-item" href="#"><i class="fa fa-map-marker text-muted"></i>Addresses</a>
                    <a class="list-group-item" href="https://www.bootdey.com/snippets/view/bs4-wishlist-profile-page" tagert="__blank">
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
                <table class="table table-hover mb-0" style="border:1px solid black;">
                    <thead style="border:1px solid black;">
                        <tr style="border:1px solid black;">
                            <th style="border:1px solid black;">Order #</th>
                            <th style="border:1px solid black;">Date Purchased</th>
                            <th style="border:1px solid black;">Status</th>
                            <th style="border:1px solid black;">Total</th>
                            <th style="border:1px solid black;">Invoice</th>
                            <th style="border:1px solid black;">Action</th>
                        </tr>
                    </thead>
                    <tbody style="border:1px solid black;">
                      
                 
                       
                      
                        <tr style="border:1px solid black;">
                            <td style="border:1px solid black;"><a class="navi-link" href="#order-details" data-toggle="modal">502TR872W2</a></td>
                            <td style="border:1px solid black;">April 04, 2017</td>
                            <td style="border:1px solid black;"><span class="badge badge-success m-0">Delivered</span></td>
                            <td style="border:1px solid black;">$2,133.90</td>
                            <td style="border:1px solid black;">$2,133.90</td>
                            <td style="border:1px solid black;">$2,133.90</td>
                        </tr>
                       
                        
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

</div>
@endsection