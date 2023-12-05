<footer class="footer">
    <div class="container">
        <div class="footer-content">
            <div class="footer-section">
                <h4>About Us</h4>
                <p style="text-align: justify; width: 200px;">The Bakery Shop is one of the few surviving Craft Bakeries in Surrey. We have built our reputation on combining good quality traditional baking with good value for money. We offer our customers.</p>
            </div>
            <div class="footer-section">
                <h4>Quick Links</h4>
                <ul>
                    <li><a href="#Ad">Home</a></li>
                    <li><a href="#Ad">All Categories</a></li>
                    <li><a href="{{ route('popular_items') }}">Popular Items</a></li>
                    <li><a href="{{ route('new_arrivals') }}">New Arivals</a></li>
                </ul>
            </div>
            <div class="footer-section">
                <h4>Products</h4>
                <ul>



 @php
   $categories = App\Models\Category::all();
   $a=0;
 
@endphp
                 @foreach ($categories as $key => $category) 

                    <li><a href="{{ route('bakery_category', $category->id) }}">{{ $category->Category_Name }}</a></li>
                   @php
                       $a=$a+1;
                       if($a===4)
                       break;
                   @endphp

                   @endforeach



                   
                </ul>
            </div>
            <div class="footer-section">
                <h4>Connect With Us</h4>
                <span>Dhaka ,Bangladesh</span><br>
                <span>Uttara , Sector 10</span><br>
                <span>12/B , 73/C</span>
               <br><br><br>
                    <a href="https://www.facebook.com/shahriair.lemon/" class="social-icon"><i class="fab fa-facebook"></i></a>
                    <a href="https://twitter.com/Shahriair65" class="social-icon"><i class="fab fa-twitter"></i></a>
                    <a href="#" class="social-icon"><i class="fab fa-instagram"></i></a>
                
            </div>
        </div>
    </div>
    
    <div class="container"><p class="m-0 text-center text-white">Copyright &copy; Bakery Shop 2023</p></div>
</footer>