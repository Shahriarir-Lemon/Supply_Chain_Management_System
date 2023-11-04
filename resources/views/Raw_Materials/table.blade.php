<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Raw Materials</title>
</head>
<style>

.container {
        margin-left: 2px;
        max-width: 910px;
            background-color: white; 
            border: 1px solid #161111;    
            padding: 20px;  
            margin-bottom: 20px;  
            margin-top: 30px; 
            align-content: center; 
            border-radius: 20px   
        }
        .material-image {
        width: 200px; 

        height: auto; 
        border-radius: 0;
    }

    .rounded-button {
    border-radius: 20px; /* Adjust the value to control the roundness of the button */
    padding: 10px 20px; /* Add padding for better button appearance */
    color: #ffffff; /* Set text color */
    border: none; /* Remove border */
    cursor: pointer; /* Change cursor to a pointer on hover */
}

tr .s{
    height: 100px; /* Adjust the height as needed */
    text-align: center;
    vertical-align: middle;
}



</style>

<body>



    @include('sweetalert::alert')

<div class="container">
    <div class="product_form">
        <a href="{{ route('add_raw_material') }}">
            <button class="rounded-button btn btn-success">Add Raw Materials</button>
        </a>
        
        
        <!-- Table to display product information -->
        <h3 class="mt-0 text-center"><u>Raw Material List</u></h3>
        <table class="table table-bordered ">
            <thead>
                <tr class="bg-secondary text-white">
                    <th scope="col">#</th>
                    <th>Material Image</th>
                    <th>Material Name</th>
                    <th> Price</th>
                    <th>Unit Type</th>
                    
                    <th>Stock</th>
                
                </tr>
            </thead>
            <tbody>
                @foreach ($materials as $key => $material)

                {{-- scope="row">{{$key+1}}</th> --}}
                <tr class="s">
                    <th scope="row">{{$material->id}}</th>
                    <td><img src="{{ asset($material->Material_Image) }}" class="material-image"></td>
                    <td>{{ $material->Material_Name }}</td>
                    <td>{{ $material->Price }} TK</td>
                    <td>{{ $material->Unit_Type }}</td>
                    <td>{{ $material->Stock }}</td>
                </tr>
                @endforeach
            </tbody>
            
            
        </table>

        {{ $materials->links() }}
    </div>
</div>



</body>
</html>
