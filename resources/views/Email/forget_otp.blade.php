@extends('Frontend.master')

@section('category')

<section class="vh-100" style="background-color: #829ac6;">
    <div class="container py-5 h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-12 col-md-8 col-lg-6 col-xl-5">
          <div class="card shadow-2-strong" style="border-radius: 1rem;">
            <div class="card-body p-5 text-center">
  
              <h1 style="font-size: 20px;font-weight:700;margin-bottom:50px;">Please Enter Verification code: </h1>
  





              @if(session('success'))
              <div class="alert alert-success">
                  {{ session('success') }}
              </div>
          @endif
          
          @if($errors->any())
              <div class="alert alert-danger">
                  <ul>
                      @foreach($errors->all() as $error)
                          <li>{{ $error }}</li>
                      @endforeach
                  </ul>
              </div>
          @endif






         <form action="{{ route('forget_otp')}}" method="POST" class="mb-4">
            @csrf
            
            <div class="form-outline">
                <input type="text" name="otp" class="form-control form-control-lg" />
            </div>
        
            <div class="d-flex justify-content-between align-items-center mt-3">

                <button style="background: green;" class="btn btn-primary" type="submit">Verify</button>


            </form>
               
                <a href="{{ route('forget_resend') }}" style="background: green;" class="btn btn-primary" >Resend</a>
              
      
             
          </div>
        
            <hr class="my-4">
       
        
          
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection
