<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">


<title>Customer Profile Edit</title>
<link rel="stylesheet"
  href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
  <link rel="stylesheet"
  href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css" integrity="sha512-gOQQLjHRpD3/SEOtalVq50iDn4opLVup2TF8c4QPI3/NmUPNZOk2FG0ihi8oCU/qYEsw4P6nuEZT2lAG0UNYaw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.1/dist/css/bootstrap.min.css" rel="stylesheet">


 {{-- toastr cdn --}} 

 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" integrity="sha512-vKMx8UnXk60zUwyUnUPM3HbQo8QfmNx7+ltw8Pm5zLusl1XIfwcxo8DbWCqMGKaWeNxWA8yrx5v3SaVpMvR3CA==" crossorigin="anonymous" referrerpolicy="no-referrer" />


<style type="text/css">
    	body{
    margin-top:20px;
    background:#f8f8f8
}

/* Add some margin to the top to move it down a bit */
.toast-margin {
    margin-top: 50px; /* Adjust this value as needed */
}


    </style>
</head>
<body>
 
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
    <div class="container">
    <div class="row flex-lg-nowrap">
      <div class="col-12 col-lg-auto mb-3" style="width: 200px;">
        <div class="card p-3">
          <div class="e-navlist e-navlist--active-bg">
            <ul class="nav">
              <li class="nav-item"><a class="nav-link px-2 active" href="#"><i class="fa fa-fw fa-bar-chart mr-1"></i><span>Overview</span></a></li>
              <li class="nav-item"><a class="nav-link px-2" href="https://www.bootdey.com/snippets/view/bs4-crud-users" target="__blank"><i class="fa fa-fw fa-th mr-1"></i><span>CRUD</span></a></li>
              <li class="nav-item"><a class="nav-link px-2" href="https://www.bootdey.com/snippets/view/bs4-edit-profile-page" target="__blank"><i class="fa fa-fw fa-cog mr-1"></i><span>Settings</span></a></li>
            </ul>
          </div>
        </div>
      </div>
    
      <div class="col">
        <div class="row">
          <div class="col mb-3">
            <div class="card">
              <div class="card-body">
                <div class="e-profile">
                  <div class="row">
                                          
                    <div class="col-12 col-sm-auto mb-3">
                      <div class="mx-auto" style="width: 140px;">
                        <img src="{{ asset($customer->c_picture) }}" alt="Your Image Description" style="height: 140px; width: 140px;">
           
                                  </div>
                    </div>
                    <div class="col d-flex flex-column flex-sm-row justify-content-between mb-3">
                      <div class="text-center text-sm-left mb-2 mb-sm-0">
                        <h4 class="pt-sm-2 pb-1 mb-0 text-nowrap">{{ auth('customer')->user()->c_fullname }}</h4>
                        <p class="mb-0"><p class="mb-0">{{ '@' . auth('customer')->user()->c_username }}</p>
                        </p>
                        <div class="text-muted"><small style="color: green;">Change Profile Picture</small></div>

                       
                  
                  



           <form method="POST" action="{{ route('customer_profile_edit',$customer->id)}}"  enctype="multipart/form-data">
                  @csrf
                  @method('PUT')
                        <div class="mt-2">
                          <div class="custom-file">
                            <input type="file" name="c_picture" value="{{ asset($customer->c_picture) }}" class="form-control" required>
                            
                        </div>
                                                    
                        
                        </div>
                      </div>
                      <div class="text-center text-sm-right">
                        <span class="badge badge-secondary">Customer</span>
                        <div class="text-muted"><small>Joined 09 Nov 2023</small></div>
                      </div>
                    </div>
                  </div>
                  <ul class="nav nav-tabs">
                    <li class="nav-item"><a href="" class="active nav-link">Settings</a></li>
                  </ul>
                  <div class="tab-content pt-3">
                    <div class="tab-pane active">

               
                    
                        <div class="row">
                          <div class="col">
                            <div class="row">
                              
                              <div class="col">
                                <div class="form-group">


                                  @if ($errors->any())
                                  <div class="alert alert-danger">
                                      <ul>
                                          @foreach ($errors->all() as $error)
                                              <li>{{ $error }}</li>
                                          @endforeach
                                      </ul>
                                  </div>
                              @endif



                                  <label>Full Name</label>
                                  <input class="form-control" type="text" name="c_fullname"  value="{{ $customer->c_fullname }}">
                                </div>
                              </div>
                              <div class="col">
                                <div class="form-group">
                                  <label>Username</label>
                                  <input class="form-control" type="text" name="c_username" value="{{ $customer->c_username }}">
                                </div>
                              </div>
                              
                            </div>
                            <div class="row">
                              <div class="col mb-3">
                                <div class="form-group">
                                  <label>About</label>
                                  <textarea class="form-control" rows="5" name="c_about">{{ $customer->c_about }}</textarea>
                                </div>
                              </div>
                            </div>
                            <div class="row">
                              <div class="col">
                                <div class="form-group">
                                  <label>Email</label>
                                  <input class="form-control" type="email" name="c_email" value="{{ $customer->c_email }}" >
                                </div>
                              </div>
                            </div>
                            <div class="row">
                              <div class="col">
                                <div class="form-group">
                                  <label>Address</label>
                                  <input class="form-control" type="text" name="c_address" value="{{ $customer->c_address }}">
                                </div>
                              </div>
                            </div>
                           
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-12 col-sm-6 mb-3 mt-3">
                            <div class="mb-2"><b>Change Password</b></div>
                            <div class="row">
                              <div class="col">
                                <div class="form-group">
                                  <label>Current Password</label>
                                  <input class="form-control" name="password2" type="password" placeholder="••••••">
                                </div>
                              </div>
                            </div>
                            <div class="row">
                              <div class="col">
                                <div class="form-group">
                                  <label>New Password</label>
                                  <input class="form-control" name="password1" type="password" placeholder="••••••">
                                </div>
                              </div>
                            </div>
                            <div class="row">
                              <div class="col">
                                <div class="form-group">
                                  <label>Confirm <span class="d-none d-xl-inline">Password</span></label>
                                  <input class="form-control" name="password1_confirmation" type="password" placeholder="••••••"></div>
                              </div>
                            </div>
                          </div>
                          <div class="col-12 mt-3 col-sm-5 offset-sm-1 mb-3">
                            <div class="mb-2"><b>Update Address</b></div>
                            <div class="row">
                              <div class="col">
                                <label>City</label>
                             
                                  
                                <input class="form-control mb-3" name="c_city" value="{{ $customer->c_city }}" type="text" placeholder="••••••">                                    
                               
                                <label>Occupation</label>
                             
                                  
                                <select id="inputState" required name="c_occupation"  class="form-control">
                                  <option value="" disabled="" selected="">--- Select Occcupation ---</option>
                  
                                  <option value="General People" {{ ($customer->c_occupation) === 'General People' ? 'selected' : '' }}>General People</option>
                                  <option value="Student" {{ ($customer->c_occupation) === 'Student' ? 'selected' : '' }}>Student</option>
                                  <option value="Businessman" {{ ($customer->c_occupation) === 'Businessman' ? 'selected' : '' }}>Businessman</option>
                                  <option value="Teacher" {{ ($customer->c_occupation) === 'Teacher' ? 'selected' : '' }}>Teacher</option>
                              </select>
                                 
                               
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col d-flex justify-content-end">
                            <button class="btn btn-primary" type="submit">Save Changes</button>
                          </div>
                        </div>
             </form>

                  
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
    
          <div class="col-12 col-md-3 mb-3">
            <div class="card mb-3">
              <div class="card-body">
                <div class="px-xl-3">
                 <a href="{{ route('home') }}"><button class="btn btn-block btn-secondary">
                  <i class='bx bxs-arrow-back'></i>
                    <span>Back to Home</span>
                  </button></a>
                </div>
              </div>
              <hr>
              <div class="card-body">
                <div class="px-xl-3">
                 <a href="{{ route('customer_logout') }}"><button class="btn btn-block btn-secondary">
                    <i class="fa fa-sign-out"></i>
                    <span>Logout</span>
                  </button></a>
                </div>
              </div>
            </div>
            <div class="card">
              <div class="card-body">
                <h6 class="card-title font-weight-bold">Support</h6>
                <p class="card-text">Get fast, free help from our friendly assistants.</p>
                <button type="button" class="btn btn-primary">Contact Us</button>
              </div>
            </div>
          </div>
        </div>
    
      </div>
    </div>
    </div>
<script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.1/dist/js/bootstrap.bundle.min.js"></script>
<script type="text/javascript">
	
</script>




<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js" integrity="sha512-7VTiy9AhpazBeKQAlhaLRUk+kAMAb8oczljuyJHPsVPWox/QIXDFOnT9DUk1UC8EbnHKRdQowT7sOBe7LAjajQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>


  <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>


  @include('SweetAlert.success')
  @include('SweetAlert.error')

</body>
</html>