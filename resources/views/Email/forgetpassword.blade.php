@extends('Frontend.master')

@section('category')

<section class="vh-100" style="background-color: #829ac6;">
    <div class="container py-5 h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-12 col-md-8 col-lg-6 col-xl-5">
          <div class="card shadow-2-strong" style="border-radius: 1rem;">
            <div class="card-body p-5 text-center">
  
              <h1 style="font-size: 20px;font-weight:700;margin-bottom:50px;">Please Enter Your Email : </h1>
  





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






          <form action="{{ route('take_email') }}" method="post" class="mb-4">
            @csrf
          
            <div class="form-outline">
                <input type="email" name="email" class="form-control form-control-lg" />
            </div>
        
                <button style="background: green;margin-top:30px;" class="btn btn-primary" type="submit">Submit</button>
        
        
            <hr class="my-4">
        </form>
          

            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection
