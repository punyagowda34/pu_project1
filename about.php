<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>About - Flix</title>
    <link rel="stylesheet" href="app.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" />
    <link href="https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css" rel="stylesheet" />
    <style>
        body {
            background-color: #111;
            color: #eee;
            font-family: 'Cairo', sans-serif;
            margin: 0;
            padding: 0;
        }
        .about-container {
            max-width: 95vw;
            margin: 40px auto;
            padding: 20px;
            background-color: #1e1e1e;
            border-radius: 12px;
        }
        .about-container h1 {
            color: rgb(243, 18, 18);
            margin-bottom: 25px;
            font-size: 3rem;
            text-align: center;
        }
        .about-container p {
            font-size: 1.2rem;
            line-height: 1.6;
            color: #ccc;
            margin-bottom: 25px;
        }

        /* OUR VISION SECTION */
        .vision {
            margin-top: 60px;
            text-align: center;
        }
        .vision h2 {
            font-size: 2.5rem;
            color: rgb(243, 18, 18);
            margin-bottom: 40px;
        }
        .vision-cards {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 30px;
        }
        .vision-card {
            background-color: #292929;
            padding: 25px;
            border-radius: 12px;
            box-shadow: 0 0 15px rgba(31, 131, 237, 0.4);
            max-width: 300px;
            flex: 1;
            min-width: 250px;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        .vision-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 0 25px rgb(31, 131, 237);
        }
        .vision-card i {
            font-size: 2.5rem;
            color: rgb(31, 131, 237);
            margin-bottom: 15px;
        }
        .vision-card h3 {
            font-size: 1.4rem;
            margin-bottom: 10px;
            color: #eee;
        }
        .vision-card p {
            color: #ccc;
            font-size: 1rem;
            line-height: 1.5;
        }

        @media screen and (max-width: 768px) {
            .about-container h1 {
                font-size: 2.4rem;
            }
            .vision h2 {
                font-size: 2rem;
            }
            .vision-cards {
                flex-direction: column;
                align-items: center;
            }
        }

        /* FOOTER STYLES */
        footer.section {
            background-color: #222;
            color: #bbb;
            padding: 40px 20px 20px;
            font-family: 'Cairo', sans-serif;
        }
        footer .container {
            max-width: 1200px;
            margin: auto;
        }
        footer .logo {
            font-size: 2.5rem;
            font-weight: 900;
            color:rgb(255, 255, 255);
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 6px;
        }
        footer .main-color {
            color:rgb(31, 131, 237);
        }
        footer p {
            margin: 15px 0 25px;
            line-height: 1.5;
            color: #ccc;
            max-width: 320px;
        }
        footer .social-list {
            display: flex;
            gap: 15px;
        }
        footer .social-item {
            color: rgb(31, 131, 237);
            font-size: 1.5rem;
            transition: color 0.3s ease;
        }
        footer .social-item:hover {
            color: #f31212;
        }
        footer .footer-menu {
            list-style: none;
            padding: 0;
            margin: 0;
        }
        footer .footer-menu li {
            margin-bottom: 10px;
        }
        footer .footer-menu li a {
            color: #bbb;
            text-decoration: none;
            transition: color 0.3s ease;
        }
        footer .footer-menu li a:hover {
            color: #f31212;
        }
        footer .content p, footer .content ul {
            margin: 0;
        }
        footer .footer-bottom {
            text-align: center;
            margin-top: 30px;
            font-size: 0.9rem;
            color: #666;
            border-top: 1px solid #333;
            padding-top: 15px;
        }
        footer .content b {
            color:rgb(248, 250, 252);
        }
        footer .app-downloads {
            display: flex;
            gap: 10px;
            margin-top: 10px;
        }
        footer .app-downloads img {
            width: 120px;
            height: auto;
            border-radius: 8px;
            transition: transform 0.3s ease;
        }
        footer .app-downloads img:hover {
            transform: scale(1.05);
        }
    </style>
</head>
<body>

<?php include 'navbar.php'; ?>

<div class="about-container">
    <h1>About Flix</h1>
    <p>
        Flix is your premier destination to explore the world of movies and series — curated with passion and crafted with care. From the latest blockbusters to timeless classics, we bring a seamless experience to movie lovers worldwide.
    </p>
    <p>
        Our mission is to provide you with the most comprehensive and engaging streaming guide — designed to make your entertainment journey smooth, intuitive, and fun.
    </p>
    <p>
        Join our community and dive into the world of stories that move you.
    </p>

    <div class="vision">
        <h2>Our Vision</h2>
        <div class="vision-cards">
            <div class="vision-card">
                <i class="fas fa-film"></i>
                <h3>Entertainment, Redefined</h3>
                <p>We aim to deliver cinema-quality storytelling, accessible to everyone, anywhere. Stream what you love, without compromise.</p>
            </div>
            <div class="vision-card">
                <i class="fas fa-users"></i>
                <h3>Community First</h3>
                <p>Flix is built around its users. We listen, adapt, and evolve — creating an experience shaped by what you want to see next.</p>
            </div>
            <div class="vision-card">
                <i class="fas fa-rocket"></i>
                <h3>Innovation at Core</h3>
                <p>From smart recommendations to immersive interfaces, Flix brings innovation to your fingertips for effortless browsing.</p>
            </div>
        </div>
    </div>
</div>

<!-- FOOTER SECTION -->
<footer class="section">
    <div class="container">
        <div class="row" style="display:flex; flex-wrap:wrap;">
            <div class="col-4 col-md-6 col-sm-12" style="flex:1; min-width:250px; margin-bottom:20px;">
                <div class="content">
                    <a href="#" class="logo">
                        <i class='bx bx-movie-play bx-tada main-color'></i>Fl<span class="main-color">i</span>x
                    </a>
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aut veniam ex quos hic id nobis beatae earum sapiente!
                    </p>
                    <div class="social-list">
                        <a href="#" class="social-item"><i class="bx bxl-facebook"></i></a>
                        <a href="#" class="social-item"><i class="bx bxl-twitter"></i></a>
                        <a href="#" class="social-item"><i class="bx bxl-instagram"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-8 col-md-6 col-sm-12" style="flex:2; min-width:300px;">
                <div class="row" style="display:flex; flex-wrap:wrap; gap: 20px;">
                    <div class="col-3 col-md-6 col-sm-6" style="flex:1; min-width:130px;">
                        <div class="content">
                            <p><b>Flix</b></p>
                            <ul class="footer-menu">
                                <li><a href="#">About us</a></li>
                                <li><a href="#">My profile</a></li>
                                <li><a href="#">Pricing plans</a></li>
                                <li><a href="#">Contacts</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-3 col-md-6 col-sm-6" style="flex:1; min-width:130px;">
                        <div class="content">
                            <p><b>Browse</b></p>
                            <ul class="footer-menu">
                                <li><a href="#">Movies</a></li>
                                <li><a href="#">Series</a></li>
                                <li><a href="#">Genres</a></li>
                                <li><a href="#">New Releases</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-3 col-md-6 col-sm-6" style="flex:1; min-width:130px;">
                        <div class="content">
                            <p><b>Help</b></p>
                            <ul class="footer-menu">
                                <li><a href="#">FAQs</a></li>
                                <li><a href="#">Support</a></li>
                                <li><a href="#">Terms of Service</a></li>
                                <li><a href="#">Privacy Policy</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-3 col-md-6 col-sm-6" style="flex:1; min-width:130px;">
                        <div class="content">
                            <p><b>Download app</b></p>
                            <div class="app-downloads">
                                <a href="#"><img src="./images/google-play.png" alt="Google Play Store"></a>
                                <a href="#"><img src="./images/app-store.png" alt="Apple App Store"></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-bottom">
            &copy; 2025 Flix. All rights reserved.
        </div>
    </div>
</footer>

</body>
</html>
