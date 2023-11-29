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



    <body>


        <div class="container">
            <a href="{{ route('category_list') }}">
                <button type="submit" class="btn btn-success rounded-o">See All Categories</button>

            </a>
           <div class="for"> 
            <div class="product_form">

                <h3 class="mt-1 text-center"><u>Enter Category Name</u></h3><br><br>
                <form action="{{ route('store_category') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="product:stock" style="color: black;"><b>Category Name:</b> :</label><br>
                            <input type="text" class="form-control" name="category_name" placeholder="category name"
                                required>
                        </div>

                    </div>

    

                    <button type="submit" class="btn btn-success">Add Category</button>
                </form>

            </div>
        </div>
        </div>




@endsection
       

