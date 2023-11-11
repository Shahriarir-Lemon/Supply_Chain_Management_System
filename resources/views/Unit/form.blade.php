<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Add Unit</title>
</head>
<style>
    .container {
        margin-left: 20px;
        max-width: 650px;
        /* Set your desired max width */
       
        /* Set your desired height */
        background-color: white;
        /* Optional: Change the background color */
        border: 1px solid black;
        /* Optional: Add a border */
        padding: 20px;
        margin-bottom: 20px;
        margin-top: 30px;
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





        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
            integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
        </script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
            integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
        </script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
            integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
        </script>

    </body>

</html>