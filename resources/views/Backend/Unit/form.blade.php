@extends('Backend.Dashboard1.main')
@section('content')


<style>
    .container {
       
        max-width: auto;
        /* Set your desired max width */
       
        /* Set your desired height */
        background-color: white;
        /* Optional: Change the background color */
        border: 1px solid black;
        /* Optional: Add a border */
        padding: 20px;
        margin-bottom: 20px;
      
        align-content: center;
        border-radius: 20px
            /* Optional: Add padding */
    }

    .for{
        margin-top: 50px;
    }
</style>






        <div class="container">
            <a href="{{ route('unit_list') }}">
                <button type="submit" class="btn btn-success rounded-o">See All Categories</button>

            </a>
           <div class="for"> 
            <div class="product_form">

                <h3 class="mt-1 text-center"><u>Enter Unit Type</u></h3><br><br>
                <form action="{{ route('store_unit') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="product:stock" style="color: black;"><b>Unit Name</b> :</label><br>
                            <input type="text" class="form-control" name="unit_name" placeholder="unit name"
                                required>
                        </div>

                    </div>

    

                    <button type="submit" class="btn btn-success">Add Unit</button>
                </form>

            </div>
        </div>
        </div>



        @endsection



      
