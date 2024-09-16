<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

    <link rel="stylesheet" href="css/style.css">

</head>

<body>
    <header class="header">

        <a href="#" class="logo"> <i class="fas fa-utensils"></i> Food Fox </a>

        <form action="" class="search-form">
            <input type="search" name="" placeholder="search here..." id="searchBox">
            <label for="searchBox" class="fas fa-search"></label>
        </form>

        <div class="icons">
            <a href="resturent/login.php">
                <div class="fa-solid fa-shop"></div>
            </a>
            <!-- cart symbol -->
            <div class="fas fa-cart-plus"></div>
            <a href="simple php system\index.php">
                <div class="fas fa-user" id="login-btn"></div>
            </a>
            <div class="fas fa-bars" id="menu-btn"></div>
        </div>

        <nav class="navbar">
            <a href="#home">home</a>
            <a href="#famous">famous food</a>
            <a href="#services">services</a>
            <a href="#pricing">pricing</a>
            <a href="#review">review</a>
            <a href="#contact">contact</a>
        </nav>
    </header>

    <!-- header section ends -->
    <!-- home section starts  -->

    <section class="home" id="home">

        <div class="image" data-aos="fade-down">
            <img src="https://cdn.vox-cdn.com/thumbor/8hZcUxUOBb4GV1JiDsz1USpT29w=/385x352:1561x1061/1200x800/filters:focal(831x620:1137x926)/cdn.vox-cdn.com/uploads/chorus_image/image/70609268/Burger_King_Plant_based_Double_Cheeezeburger.0.jpg"
                alt="">
        </div>
        <div class="content" data-aos="fade-up">
            <h3>Most Tasty Burger For You</h3>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Veritatis explicabo eius inventore reprehenderit
                alias eos facilis, ipsa est asperiores repellendus!</p>
            <a href="#" class="btn">explore now</a>
        </div>

    </section>

    <section class="famous" id="famous">

        <h1 class="heading"> famous <span>Foods</span> </h1>

        <div class="box-container">

            <div class="box" data-aos="fade-up">
                <div class="image">
                    <img src="images/blog-1.jpg" alt="">
                    <h3> <i class="fas fa-utensils"></i> Burger </h3>
                </div>
                <div class="content">
                    <div class="price"> 299 <span>350.99</span> </div>
                    <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Vero, vitae.</p>
                    <!-- <a href="#"class="btn"> Order now</a> -->
                </div>
            </div>

            <div class="box" data-aos="fade-up">
                <div class="image">
                    <img src="images/blog-2.jpg" alt="">
                    <h3> <i class="fas fa-utensils"></i> Burger </h3>
                </div>
                <div class="content">
                    <div class="price"> 290.99 <span>350.99</span> </div>
                    <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Vero, vitae.</p>
                    <!-- <a href="#" class="btn"> Order now</a> -->
                </div>
            </div>

            <div class="box" data-aos="fade-up">
                <div class="image">
                    <img src="images/blog-3.jpg" alt="">
                    <h3> <i class="fas fa-utensils"></i> Dabeli </h3>
                </div>
                <div class="content">
                    <div class="price"> 30.00 <span>50.00</span> </div>
                    <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Vero, vitae.</p>
                    <!-- <a href="#" class="btn"> Order now</a> -->
                </div>
            </div>

            <div class="box" data-aos="fade-up">
                <div class="image">
                    <img src="images/blog-4.jpg" alt="">
                    <h3> <i class="fas fa-utensils"></i> Veg Pulav </h3>
                </div>
                <div class="content">
                    <div class="price"> 70.00 <span>100.00</span> </div>
                    <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Vero, vitae.</p>
                    <!-- <a href="#" class="btn"> Order now</a> -->
                </div>
            </div>

            <div class="box" data-aos="fade-up">
                <div class="image">
                    <img src="images/blog-5.jpg" alt="">
                    <h3> <i class="fas fa-utensils"></i> Mug Pulav </h3>
                </div>
                <div class="content">
                    <div class="price">70.00 <span>100.00</span> </div>
                    <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Vero, vitae.</p>
                    <!-- <a href="#" class="btn"> Order now</a> -->
                </div>
            </div>

            <div class="box" data-aos="fade-up">
                <div class="image">
                    <img src="images/blog-6.jpg" alt="">
                    <h3> <i class="fas fa-utensils"></i> Puff </h3>
                </div>
                <div class="content">
                    <div class="price"> 25.00 <span>35.00</span> </div>
                    <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Vero, vitae.</p>
                    <!-- <a href="#" class="btn"> Order now</a> -->
                </div>
            </div>

        </div>

    </section>

    <!-- restaurants  show customer  -->
    <section class="resto" id="resto">
        <h1 class="heading"> near <span>restaurants</span> </h1>
        <div class="restoallbox">
            <?php
            require 'resturent/menu/connect.php';
            $sql = "SELECT * FROM users";
            $result = $conn->query($sql);

            while ($row = $result->fetch_assoc()) {
                $resto = $row["restaurant_name"];
                echo "<a href='resturent/resto/{$resto}.php'>";
            ?>

                <div class="box-container">
                    <div class="box" data-aos="zoom-in-up">
                        <img src="images/r1">
                        <?php echo "<h3>{$resto}  </h3>" ?></a>
                    </div>
                    </div>
                <?php
            }
                ?>
                
    </section>

    <!-- pricing section ends -->

    <!-- review section starts  -->

    <section class="review" id="review">

        <h1 class="heading"> client's <span>review</span> </h1>

        <div class="swiper-container review-slider" data-aos="zoom-in">

            <div class="swiper-wrapper">

                <div class="swiper-slide slide">
                    <img src="images/pic-1.png" alt="">
                    <h3>Aryan</h3>
                    <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Pariatur sunt eligendi est, dicta
                        maiores amet nihil perferendis, incidunt maxime aspernatur exercitationem laboriosam odio
                        dolores magnam ratione atque, quasi odit. Hic!</p>
                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                    </div>
                </div>

                <div class="swiper-slide slide">
                    <img src="images/pic-2.png" alt="">
                    <h3>Vasu</h3>
                    <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Pariatur sunt eligendi est, dicta
                        maiores amet nihil perferendis, incidunt maxime aspernatur exercitationem laboriosam odio
                        dolores magnam ratione atque, quasi odit. Hic!</p>
                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                    </div>
                </div>

                <div class="swiper-slide slide">
                    <img src="images/pic-3.bmp" alt="">
                    <h3>Jay</h3>
                    <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Pariatur sunt eligendi est, dicta
                        maiores amet nihil perferendis, incidunt maxime aspernatur exercitationem laboriosam odio
                        dolores magnam ratione atque, quasi odit. Hic!</p>
                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                    </div>
                </div>

                <div class="swiper-slide slide">
                    <img src="images/pic-4.png" alt="">
                    <h3>samrth</h3>
                    <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Pariatur sunt eligendi est, dicta
                        maiores amet nihil perferendis, incidunt maxime aspernatur exercitationem laboriosam odio
                        dolores magnam ratione atque, quasi odit. Hic!</p>
                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                    </div>
                </div>
                <div class="swiper-slide slide">
                    <img src="images/pic-5.jpg" alt="">
                    <h3>path</h3>
                    <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Pariatur sunt eligendi est, dicta
                        maiores amet nihil perferendis, incidunt maxime aspernatur exercitationem laboriosam odio
                        dolores magnam ratione atque, quasi odit. Hic!</p>
                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                    </div>
                </div>

            </div>



        </div>

    </section>


    <section class="contact" id="contact">

        <h1 class="heading"> <span>contact</span> us </h1>

        <form action="" data-aos="zoom">

            <div class="inputBox">
                <input type="text" placeholder="name" data-aos="fade-up">
                <input type="email" placeholder="email" data-aos="fade-up">
            </div>

            <div class="inputBox">
                <input type="number" placeholder="number" data-aos="fade-up">
                <input type="text" placeholder="subject" data-aos="fade-up">
            </div>

            <textarea name="" placeholder="your message" id="" cols="30" rows="10" data-aos="fade-up"></textarea>

            <input type="submit" value="send message" class="btn">

        </form>

    </section>





    <!-- footer section starts  -->

    <section class="footer">

        <div class="box-container">

            <div class="box" data-aos="fade-up">
                <h3>our branches</h3>
                <a href="#"> <i class="fas fa-map-marker-alt"></i> india </a>

            </div>

            <div class="box" data-aos="fade-up">
                <h3>quick links</h3>
                <a href="#home"> <i class="fas fa-chevron-right"></i>home</a>
                <a href="#famous"> <i class="fas fa-chevron-right"></i>famous food</a>
                <a href="#services"> <i class="fas fa-chevron-right"></i>services</a>
                <a href="#resto"> <i class="fas fa-chevron-right"></i>pricing</a>
                <a href="#review"> <i class="fas fa-chevron-right"></i>review</a>
                <a href="#contact"> <i class="fas fa-chevron-right"></i>contact</a>
            </div>

            <div class="box" data-aos="fade-up">
                <h3>contact info</h3>
                <a> <i class="fas fa-phone"></i> 6356382734 </a>
                <a> <i class="fas fa-phone"></i> 9999999999 </a>
                <a> <i class="fas fa-envelop"></i> 23ce062@charusat.edu.in</a>
                <a> <i class="fas fa-map-marker-alt"></i> anand,gujrat </a>
            </div>

            <div class="box" data-aos="fade-up">
                <h3>follow us</h3>
                <a href="#"> <i class="fab fa-facebook-f"></i> facebook </a>
                <a href="#"> <i class="fab fa-twitter"></i> twitter </a>
                <a href="#"> <i class="fab fa-instagram"></i> instagram </a>
                <a href="#"> <i class="fab fa-linkedin"></i> linkedin </a>
                <a href="#"> <i class="fab fa-pinterest"></i> pinterest </a>
            </div>

        </div>

        <div class="credit"> creadet by <span>Food fox Team</span> | all rights reserved </div>

    </section>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>

    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

    <!-- custom js file link  -->
    <script src="js/script.js"></script>
    <script src="order/script.js"></script>

    <script>
        AOS.init({
            duration: 800,
            delay: 400
        });
    </script>

</body>

</html>