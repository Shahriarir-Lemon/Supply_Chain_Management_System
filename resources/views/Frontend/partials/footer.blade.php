<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f8f9fa; /* Background color */
        }

        .footer {
            background-color: #343a40; /* Footer background color */
            color: #ffffff; /* Text color */
            padding: 40px 0;
            text-align: center;
        }

        .footer-content {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-around;
            align-items: flex-start;
        }

        .footer-section {
            flex: 1;
            margin: 20px;
            max-width: 300px;
            text-align: left;
        }

        .footer-section h4 {
            color: #61dafb; /* Accent color */
            margin-bottom: 20px;
        }

        .footer-section p {
            margin-bottom: 20px;
            opacity: 0.8;
        }

        .footer-section ul {
            list-style: none;
            padding: 0;
            margin-bottom: 20px;
        }

        .footer-section li {
            margin-bottom: 10px;
        }

        .footer-section a {
            color: #ffffff;
            text-decoration: none;
            opacity: 0.8;
            transition: opacity 0.3s ease;
        }

        .footer-section a:hover {
            opacity: 1;
        }

        .footer-social-icons {
            margin-top: 20px;
        }

        .social-icon {
            display: inline-block;
            margin-right: 15px;
            font-size: 24px;
            color: #ffffff;
            opacity: 0.8;
            transition: opacity 0.3s ease;
        }

        .social-icon:hover {
            opacity: 1;
        }


    /*  footer social icon */

    .footer-social-icons {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .social-icon {
            margin: 0 10px;
            color: #333;
            font-size: 24px;
            text-decoration: none;
        }
    </style>
    <title>E-commerce Footer</title>
</head>
<body>

<footer class="footer">
    <div class="container">
        <div class="footer-content">
            <div class="footer-section">
                <h4>About Us</h4>
                <p style="text-align: justify; width: 200px;">The Bakery Shop is one of the few surviving Craft Bakeries in Surrey. We have built our reputation on combining good quality traditional baking with good value for money. We offer our customers a full range of breads, speciality breads, morning goods, cakes and pastries.</p>
            </div>
            <div class="footer-section">
                <h4>Quick Links</h4>
                <ul>
                    <li><a href="#">Home</a></li>
                    <li><a href="#">Shop</a></li>
                    <li><a href="#">About</a></li>
                    <li><a href="#">Contact</a></li>
                </ul>
            </div>
            <div class="footer-section">
                <h4>Categories</h4>
                <ul>
                    <li><a href="#">Cake</a></li>
                    <li><a href="#">Biscuits</a></li>
                    <li><a href="#">Ban</a></li>
                    <li><a href="#">Pastary</a></li>
                </ul>
            </div>
            <div class="footer-section">
                <h4>Connect With Us</h4>
                <div class="footer-social-icons">
                    <a href="#" class="social-icon"><i class="fab fa-facebook"></i></a>
                    <a href="#" class="social-icon"><i class="fab fa-twitter"></i></a>
                    <a href="#" class="social-icon"><i class="fab fa-instagram"></i></a>
                </div>
            </div>
        </div>
    </div>
    
    <div class="container"><p class="m-0 text-center text-white">Copyright &copy; Bakery Shop 2023</p></div>
</footer>

</body>
</html>
