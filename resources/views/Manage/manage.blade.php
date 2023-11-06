<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('Dashboard/style.css') }}" />
    
    <title>Manage</title>
</head>
<style>
@import url('https://fonts.googleapis.com/css2?family=Lato:wght@400;700&family=Poppins:wght@400;500;600;700&display=swap');
    .mid{
margin-left: 270px;

        
    }
</style>
<body>

   
   

@include('Admin_Master.admin')
<div class="mid">


    @include('sweetalert::alert')
   @include('Manage.manage_category');
</div>


    <script src="{{ asset('Dashboard/script.js') }}"></script>
</body>
</html>