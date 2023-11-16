<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('Dashboard/style.css') }}" />
    <title>Document</title>
</head>
<style>
    
    @import url('https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;500;600;700&display=swap');
/* MAIN */

</style>


<body>
    
<section id="section">
       <main>
    <div class="info-data">
        <div class="card">
            <div class="head">
                <i class='bx bx-category icon'></i>
              
                    <h2>Total Categories</h2><br>
            </div>
            <p><a href="#">34</a></p>
            
            
        </div>
        <div class="card">
            <div class="head">
                <i class='bx bx-store icon'></i>
                    <div class="item">
                        <h2>Total Items</h2>
                    </div>
                    
            </div>
            <p><a href="#">34</a></p>
            
            
        </div>
        <div class="card">
            <div class="head">
                <img src="{{ asset('Dashboard/img/tk.png') }}" class="change" />
                    <div class="item">
                        <h2>Total Sales</h2>
                    </div>
                    
            </div>
            <p><a href="#">34</a></p>
            
            
        </div>
        <div class="card">
            <div class="head">
                <i class='bx bxs-group icon'></i>
              
                <div class="item">
                    <h2>Total Users</h2>
                </div>
            
        
            </div>
        </div>
    </div>
</main>
</section>
    <script src="{{ asset('Dashboard/script.js') }}"></script>

</body>
</html>