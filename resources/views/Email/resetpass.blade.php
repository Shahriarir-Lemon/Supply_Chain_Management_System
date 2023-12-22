@extends('Frontend.master')

@section('category')

<style>
    /* Custom CSS for left-aligned labels */
    .form-group label {
        text-align: left;
        display: block;
    }
</style>

<section class="vh-100" style="background-color: #829ac6;">
    <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                <div class="card shadow-2-strong" style="border-radius: 1rem;">
                    <div class="card-body p-5 text-center">

                        <h1 class="mb-4" style="font-size: 20px; font-weight: 700;">Reset Your Password</h1>

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

                        <form action="{{ route('reset_password') }}" method="POST" class="mb-4">
                            @csrf
                         
                            <div class="form-group">
                                <label>Enter New Password:</label>
                                <input type="password" name="password" class="form-control form-control-lg" />
                            </div>

                            <div class="form-group">
                                <label>Confirm New Password:</label>
                                <input type="password" name="password_confirmation" class="form-control form-control-lg" />
                            </div>

                            <button style="background: green; margin-top: 20px;" class="btn btn-primary" type="submit">Submit</button>

                            <hr class="my-4">
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
