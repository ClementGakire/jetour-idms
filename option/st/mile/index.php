<?php
include 'conn.php';
if (!isset($_COOKIE['user'])) {
   
?>
<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="250milestore">
    <meta name="keywords" content="Ogani, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>404 Stores| Home</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;600;900&display=swap" rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="css/jquery-ui.min.css" type="text/css">
    <link rel="stylesheet" href="css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="css/style.css" type="text/css">
    <style>
        @media screen and (max-width: 375px){
           .mix{
            width: 180px;
            height: 300px;
           } 
           .categories__item{
            width: auto;
            height: 250px;
            align-items: center;
           }
        }
          @media screen and (max-width: 414px){
           .mix{
            width: 180px;
            height: 300px;
           } 
           .categories__item{
            width: auto;
            height: 250px;
            align-items: center;
           }
        }
          @media screen and (max-width: 430px){
           .mix{
            width: 180px;
            height: 300px;
           } 
           .categories__item{
            width: auto;
            height: 250px;
            align-items: center;
           }
        }
          @media screen and (max-width: 540px){
           .mix{
            width: 180px;
            height: 300px;
           } 
           .categories__item{
            width: auto;
            height: 250px;
            align-items: center;
           }
        }
          @media screen and (max-width: 280px){
           .mix{
            width: 180px;
            height: 300px;
           } 
           .categories__item{
            width: auto;
            height: 250px;
            align-items: center;
           }
        }
    </style>
</head>
<!--Start of Tawk.to Script-->
<script>
    (function (w, d, s, u) {
    w.gbwawc = {
    url: u,
    options: {
            waId: "+250 793042909",
            siteName: "404 Store",
            siteTag: "Online",
            siteLogo: "https://assets.gallabox.com/gb-home/wa-chat-widget/bot+avatars/1.png",
            widgetPosition: "RIGHT",
            triggerMessage: "Help Center",
            welcomeMessage: "Welcome To 404 Store How we may help you?",
            brandColor: "#363636",
            messageText: "",
            replyOptions: ['How to make purchase?','How to make Order?'],
        },
    };
    var h = d.getElementsByTagName(s)[0],
    j = d.createElement(s);
    j.async = true;
    j.src = u + "/whatsapp-widget.min.js?_=" + Math.random();
    h.parentNode.insertBefore(j, h);
    })(window, document, "script", "https://waw.gallabox.com");
</script>
<!--End of Tawk.to Script-->
<body>
    <!-- Page Preloder -->
   
    <!-- Humberger Begin -->
    <div class="humberger__menu__overlay"></div>
    <div class="humberger__menu__wrapper">
        <div class="humberger__menu__logo">
            <!--<h1>250milestore</h1>-->
           <!-- <img src="img/logo.png" alt=""> --><!-- 250mstores -->
        </div>
        <div class="humberger__menu__cart">
            <!-- <ul>
                <li><a href="#"><i class="fa fa-heart"></i> <span>1</span></a></li>
                <li><a href="#"><i class="fa fa-shopping-bag"></i> <span>3</span></a></li>
            </ul> -->
            <!-- <div class="header__cart__price">item: <span>$150.00</span></div> -->
        </div>
        <div class="humberger__menu__widget">
            <!-- <div class="header__top__right__language">
                <img src="img/language.png" alt="">
                <div>English</div>
                <span class="arrow_carrot-down"></span>
                <ul>
                    <li><a href="#">Spanis</a></li>
                    <li><a href="#">English</a></li>
                </ul> 
            </div> -->
            <div class="header__top__right__auth">
                <a href="logout.php"><i class="fa fa-user"></i> Logout</a> 
            </div>
        </div>
        <nav class="humberger__menu__nav mobile-menu">
            <ul>
                <li class="active"><a href="./index.php">Home</a></li>
                <li><a href="./shop-grid.php">Shop</a></li>
                <!-- <li><a href="#">Pages</a>
                    <ul class="header__menu__dropdown">
                        <li><a href="./shop-details.html">Shop Details</a></li>
                        <li><a href="./shoping-cart.html">Shoping Cart</a></li>
                        <li><a href="./checkout.html">Check Out</a></li>
                        <li><a href="./blog-details.html">Blog Details</a></li>
                    </ul>
                </li> -->
                <!-- <li><a href="./blog.html">Blog</a></li> -->
                <li><a href="./contact.php">Contact</a></li>
            </ul>
        </nav>
        <div id="mobile-menu-wrap"></div>
        <div class="header__top__right__social">
            <a href="#"><i class="fa fa-facebook"></i></a>
            <a href="#"><i class="fa fa-twitter"></i></a>
            <a href="#"><i class="fa fa-linkedin"></i></a>
            <a href="#"><i class="fa fa-pinterest-p"></i></a>
        </div>
        <div class="humberger__menu__contact">
            <ul>
                <li><i class="fa fa-envelope"></i> info@domain.com</li>
                <li>Free Shipping in Rwanda</li>
            </ul>
        </div>
    </div>
    <!-- Humberger End -->

    <!-- Header Section Begin -->
    <header class="header">
        <div class="header__top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <div class="header__top__left">
                            <ul>
                                <li><i class="fa fa-envelope"></i> info@domain.com</li>
                                <li>Free Shipping in Rwanda</li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="header__top__right">
                            <div class="header__top__right__social">
                                <a href="#"><i class="fa fa-facebook"></i></a>
                                <a href="#"><i class="fa fa-twitter"></i></a>
                                <a href="#"><i class="fa fa-linkedin"></i></a>
                                <a href="#"><i class="fa fa-pinterest-p"></i></a>
                            </div>
                         <!--    <div class="header__top__right__language">
                                <img src="img/language.png" alt="">
                                <div>English</div>
                                <span class="arrow_carrot-down"></span>
                                <ul>
                                    <li><a href="#">Spanis</a></li>
                                    <li><a href="#">English</a></li>
                                </ul>
                            </div> -->
                            <div class="header__top__right__auth">
                                <a href="login.php"><i class="fa fa-user"></i> Login</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="header__logo">
                        <h2>404 Stores</h2>
                    </div>
                </div>
                <div class="col-lg-6">
                    <nav class="header__menu">
                        <ul>
                            <li class="active"><a href="./index.php">Home</a></li>
                            <li><a href="./shop-grid.php">Shop</a></li>
                            <!-- <li><a href="#">Pages</a>
                                <ul class="header__menu__dropdown">
                                    <li><a href="./shop-details.html">Shop Details</a></li>
                                    <li><a href="./shoping-cart.html">Shoping Cart</a></li>
                                    <li><a href="./checkout.html">Check Out</a></li>
                                    <li><a href="./blog-details.html">Blog Details</a></li>
                                </ul>
                            </li> -->
                            <!-- <li><a href="./blog.html">Blog</a></li> -->
                            <li><a href="./contact.php">Contact</a></li>
                        </ul>
                    </nav>
                </div>
                <div class="col-lg-3">
                    <!-- <div class="header__cart">
                        <ul>
                            <li><a href="#"><i class="fa fa-heart"></i> <span>1</span></a></li>
                            <li><a href="#"><i class="fa fa-shopping-bag"></i> <span>3</span></a></li>
                        </ul>
                        <div class="header__cart__price">item: <span>$150.00</span></div>
                    </div> -->
                </div>
            </div>
            <div class="humberger__open">
                <i class="fa fa-bars"></i>
            </div>
        </div>
    </header>
    <!-- Header Section End -->

    <!-- Hero Section Begin -->
    <section class="hero">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="hero__categories">
                        <div class="hero__categories__all">
                            <i class="fa fa-bars"></i>
                            <span>All departments</span>
                        </div>
                        <ul>
                            <li><a href="cars.php">Cars</a></li>
                            <li><a href="spare.php">Spareparts</a></li>
                            <li><a href="menc.php">Men Clothes</a></li>
                            <li><a href="womenc.php">Women Clothes</a></li>
                            <li><a href="office.php">Offfice Supplies</a></li>
                            <li><a href="elect.php">Electronics</a></li>
                            <li><a href="body.php">Body Care & Lotion</a></li>
                            <li><a href="mena.php">Men Accessories</a></li>
                            <li><a href="womena.php">Women Accessories</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="hero__search">
                        <div class="hero__search__form">
                            <form action="search.php" method="POST">
                                <div class="hero__search__categories">
                                    All Categories
                                    <span class="arrow_carrot-down"></span>
                                </div>
                                <input type="text" placeholder="What are you looking for?" name="sea" required="">
                                <button type="submit" class="site-btn" name="search">SEARCH</button>
                            </form>
                        </div>
                        <div class="hero__search__phone">
                            <div class="hero__search__phone__icon">
                                <i class="fa fa-phone"></i>
                            </div>
                            <div class="hero__search__phone__text">
                                <h5>+250 788 658 900</h5>
                                <span>support 24/7 time</span>
                            </div>
                        </div>
                    </div>
                    <div class="hero__item set-bg" data-setbg="img/hero/car-5.jpg">
                        <div class="hero__text">
                           <h5 style="color: white"><b>Free Pickup and Delivery Available in Rwanda</b></h5>
                            <h2 style="color: white">New Car <br />50% Discount</h2>
                            
                            <a href="contact.php" class="primary-btn">CONTACT US!</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Hero Section End -->

    <!-- Categories Section Begin -->
    <!--<section class="categories">-->
    <!--    <div class="container">-->
    <!--        <div class="row">-->
    <!--            <div class="categories__slider owl-carousel">-->
    <!--                <div class="col-lg-3">-->
    <!--                    <div class="categories__item set-bg" data-setbg="img/categories/girl-dress.png">-->
    <!--                        <h5><a href="#">Women Clothes</a></h5>-->
    <!--                    </div>-->
    <!--                </div>-->
    <!--                <div class="col-lg-3">-->
    <!--                    <div class="categories__item set-bg" data-setbg="img/categories/office-desk.png">-->
    <!--                        <h5><a href="#">Office Supplies</a></h5>-->
    <!--                    </div>-->
    <!--                </div>-->
                   
    <!--                <div class="col-lg-3">-->
    <!--                    <div class="categories__item set-bg" data-setbg="img/categories/laptop-notebook-25.png">-->
    <!--                        <h5><a href="#">Electronics</a></h5>-->
    <!--                    </div>-->
    <!--                </div>-->
    <!--                <div class="col-lg-3">-->
    <!--                    <div class="categories__item set-bg" data-setbg="img/categories/honda-cars-11.png">-->
    <!--                        <h5><a href="#">Cars</a></h5>-->
    <!--                    </div>-->
    <!--                </div>-->
    <!--            </div>-->
    <!--        </div>-->
    <!--    </div>-->
    <!--</section>-->
    <!-- Categories Section End -->

    <!-- Featured Section Begin -->
    <section class="featured spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h2>Featured Product</h2>
                    </div>
                    <div class="featured__controls">
                        <ul>
                            <li class="active" data-filter="*">All</li>
                            <li data-filter=".oranges">Top Deals</li>
                            <li data-filter=".fresh-meat">Discount</li>
                            <li data-filter=".vegetables">Top Trends</li>
                            <li data-filter=".fastfood">New Arrivals</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row featured__filter">
            

                 <?php
$sqli=mysqli_query($conn,"SELECT * FROM product ORDER BY id ASC limit 2");
while ($ro=mysqli_fetch_array($sqli)) {
   
            ?>
            
                <div class="mix oranges" style="width: 120px;margin: 20px 20px 20px 20px;height: 170px;margin-top:50px">
                    <div class="featured__item">
                        <a style="display: none;" href="shop-details.php?id=<?php echo $ro['id']?>"><div class="featured__item__pic set-bg" data-setbg="<?php echo $ro['photo']?>">
                            <ul class="featured__item__pic__hover">
                                <li><a href="shop-details.php?id=<?php echo $ro['id']?>"><i class="fa fa-heart"></i></a></li>
                               
                               <li><a href="shop-details.php?id=<?php echo $ro['id']?>"><i class="fa fa-shopping-cart"></i></a></li>
                            </ul>
                        </div>
                        <div class="featured__item__text">
                            <h6><a href="shop-details.php?id=<?php echo $ro['id']?>"><?php echo $ro['name']?></a></h6>
                            <h5><?php echo $ro['price']." "."RWF"?></h5>
                        </div>
                    </div></a>
                </div>
            <?php } ?>
                       <?php
$sq=mysqli_query($conn,"SELECT * FROM product ORDER BY id DESC limit 2");
while ($r=mysqli_fetch_array($sq)) {
   
            ?>
            
                <div class="mix fresh-meat" style="width: 120px;margin: 20px 20px 20px 20px;height: 170px;margin-top:50px">
                    <div class="featured__item">
                        <div class="featured__item__pic set-bg" data-setbg="<?php echo $r['photo']?>">
                            <ul class="featured__item__pic__hover">
                                <li><a href="shop-details.php?id=<?php echo $r['id']?>"><i class="fa fa-heart"></i></a></li>
                               
                               <li><a href="shop-details.php?id=<?php echo $r['id']?>"><i class="fa fa-shopping-cart"></i></a></li>
                            </ul>
                        </div>
                        <div class="featured__item__text">
                            <h6><a href="shop-details.php?id=<?php echo $r['id']?>"><?php echo $r['name']?></a></h6>
                            <h5><?php echo $r['price']." "."RWF"?></h5>
                        </div>
                    </div>
                </div>
            <?php } ?>
                       <?php
$qld=mysqli_query($conn,"SELECT * FROM product where id>11 ORDER BY id ASC limit 2");
while ($fetch=mysqli_fetch_array($qld)) {
   
            ?>
            
                <div class="mix vegetables" style="width: 120px;margin: 20px 20px 20px 20px;height: 170px;margin-top:50px">
                    <div class="featured__item">
                        <div class="featured__item__pic set-bg" data-setbg="<?php echo $fetch['photo']?>">
                            <ul class="featured__item__pic__hover">
                                <li><a href="shop-details.php?id=<?php echo $fetch['id']?>"><i class="fa fa-heart"></i></a></li>
                               
                               <li><a href="shop-details.php?id=<?php echo $fetch['id']?>"><i class="fa fa-shopping-cart"></i></a></li>
                            </ul>
                        </div>
                        <div class="featured__item__text">
                            <h6><a href="shop-details.php?id=<?php echo $fetch['id']?>"><?php echo $fetch['name']?></a></h6>
                            <h5><?php echo $fetch['price']." "."RWF"?></h5>
                        </div>
                    </div>
                </div>
            <?php } ?>
                    <?php
$new=mysqli_query($conn,"SELECT * FROM product where id>15 ORDER BY id  DESC limit 2");
while ($ne=mysqli_fetch_array($new)) {
   
            ?>
            
                <div class="mix fastfood" style="width: 120px;margin: 20px 20px 20px 20px;height: 170px;margin-top:50px">
                    <div class="featured__item">
                        <div class="featured__item__pic set-bg" data-setbg="<?php echo $ne['photo']?>">
                            <ul class="featured__item__pic__hover">
                                <li><a href="shop-details.php?id=<?php echo $ne['id']?>"><i class="fa fa-heart"></i></a></li>
                               
                               <li><a href="shop-details.php?id=<?php echo $ne['id']?>"><i class="fa fa-shopping-cart"></i></a></li>
                            </ul>
                        </div>
                        <div class="featured__item__text">
                            <h6><a href="shop-details.php?id=<?php echo $ne['id']?>"><?php echo $ne['name']?></a></h6>
                            <h5><?php echo $ne['price']." "."RWF"?></h5>
                        </div>
                    </div>
                </div>
            <?php } ?>
               
            </div>
        </div>
    </section>
    <!-- Featured Section End -->

    <!-- Banner Begin -->
    <!-- <div class="banner">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="banner__pic">
                        <img src="img/banner/banner-1.jpg" alt="">
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="banner__pic">
                        <img src="img/banner/banner-2.jpg" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div> -->
    <!-- Banner End -->

    <!-- Latest Product Section Begin -->
    <section class="latest-product spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="latest-product__text">
                        <h4>Latest Products</h4>
                        <div class="latest-product__slider owl-carousel">
                            <?php 
   $select=mysqli_query($conn,"SELECT * FROM product ORDER BY id desc limit 6");
   while ($lat=mysqli_fetch_array($select)) {
       
                            ?>
                            <div class="latest-prdouct__slider__item">
                                <a href="shop-details.php?id=<?php echo $lat['id']?>" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="<?php echo $lat['photo']?>" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6><?php echo $lat['name']?></h6>
                                        <span><?php echo $lat['price']." "."RWF"?></span>
                                    </div>
                                </a>
                              
                            </div>
                        <?php } ?>
                           
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="latest-product__text">
                        <h4>Top Rated Products</h4>
                        <div class="latest-product__slider owl-carousel">
                            <?php
$related=mysqli_query($conn,"SELECT * FROM product ORDER by id ASC limit 6");
while ($top=mysqli_fetch_array($related)) {

                            ?>
                            <div class="latest-prdouct__slider__item">
                                <a href="shop-details.php?id=<?php echo $top['id']?>" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="<?php echo $top['photo']?>" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6><?php echo $top['name']?></h6>
                                        <span><?php echo $top['price']." "."RWF"?></span>
                                    </div>
                                </a>
                               
                               
                            </div>
                        <?php } ?>
                            
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="latest-product__text">
                        <h4>Review Products</h4>
                        <div class="latest-product__slider owl-carousel">
                            <?php
$rev=mysqli_query($conn,"SELECT * FROM product ORDER BY id DESC limit 6");
while ($review=mysqli_fetch_array($rev)) {

                            ?>
                            <div class="latest-prdouct__slider__item">
                                <a href="shop-details.php?id=<?php echo $review['id']?>" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="<?php echo $review['photo']?>" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6><?php echo $review['name']?></h6>
                                        <span><?php echo $review['price']." "."RWF"?></span>
                                    </div>
                                </a>
                               
                               
                            </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Latest Product Section End -->

    <!-- Blog Section Begin -->
    <!-- <section class="from-blog spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title from-blog__title">
                        <h2>From The Blog</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-6">
                    <div class="blog__item">
                        <div class="blog__item__pic">
                            <img src="img/blog/blog-1.jpg" alt="">
                        </div>
                        <div class="blog__item__text">
                            <ul>
                                <li><i class="fa fa-calendar-o"></i> May 4,2019</li>
                                <li><i class="fa fa-comment-o"></i> 5</li>
                            </ul>
                            <h5><a href="#">Cooking tips make cooking simple</a></h5>
                            <p>Sed quia non numquam modi tempora indunt ut labore et dolore magnam aliquam quaerat </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6">
                    <div class="blog__item">
                        <div class="blog__item__pic">
                            <img src="img/blog/blog-2.jpg" alt="">
                        </div>
                        <div class="blog__item__text">
                            <ul>
                                <li><i class="fa fa-calendar-o"></i> May 4,2019</li>
                                <li><i class="fa fa-comment-o"></i> 5</li>
                            </ul>
                            <h5><a href="#">6 ways to prepare breakfast for 30</a></h5>
                            <p>Sed quia non numquam modi tempora indunt ut labore et dolore magnam aliquam quaerat </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6">
                    <div class="blog__item">
                        <div class="blog__item__pic">
                            <img src="img/blog/blog-3.jpg" alt="">
                        </div>
                        <div class="blog__item__text">
                            <ul>
                                <li><i class="fa fa-calendar-o"></i> May 4,2019</li>
                                <li><i class="fa fa-comment-o"></i> 5</li>
                            </ul>
                            <h5><a href="#">Visit the clean farm in the US</a></h5>
                            <p>Sed quia non numquam modi tempora indunt ut labore et dolore magnam aliquam quaerat </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> -->
    <!-- Blog Section End -->

    <!-- Footer Section Begin -->
    <footer class="footer spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="footer__about">
                        <div class="footer__about__logo">
                            <a href="./index.html"><!-- <img src="img/logo.png" alt=""> --></a>
                        </div>
                        <ul>
                            <li>Address: Kn Ave 12 Kigali Rwanda</li>
                            <li>Phone: +250 798 566 776</li>
                            <li>Email: info@domain.com</li>
                        </ul>
                    </div>
                </div>
                <!-- <div class="col-lg-4 col-md-6 col-sm-6 offset-lg-1">
                    <div class="footer__widget">
                        <h6>Useful Links</h6>
                        <ul>
                            <li><a href="#">About Us</a></li>
                            <li><a href="#">About Our Shop</a></li>
                            <li><a href="#">Secure Shopping</a></li>
                            <li><a href="#">Delivery infomation</a></li>
                            <li><a href="#">Privacy Policy</a></li>
                            <li><a href="#">Our Sitemap</a></li>
                        </ul>
                        <ul>
                            <li><a href="#">Who We Are</a></li>
                            <li><a href="#">Our Services</a></li>
                            <li><a href="#">Projects</a></li>
                            <li><a href="#">Contact</a></li>
                            <li><a href="#">Innovation</a></li>
                            <li><a href="#">Testimonials</a></li>
                        </ul>
                    </div>
                </div> -->
               <!--  <div class="col-lg-4 col-md-12">
                    <div class="footer__widget">
                        <h6>Join Our Newsletter Now</h6>
                        <p>Get E-mail updates about our latest shop and special offers.</p>
                        <form action="#">
                            <input type="text" placeholder="Enter your mail">
                            <button type="submit" class="site-btn">Subscribe</button>
                        </form>
                        <div class="footer__widget__social">
                            <a href="#"><i class="fa fa-facebook"></i></a>
                            <a href="#"><i class="fa fa-instagram"></i></a>
                            <a href="#"><i class="fa fa-twitter"></i></a>
                            <a href="#"><i class="fa fa-pinterest"></i></a>
                        </div>
                    </div>
                </div> -->
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="footer__copyright">
                        <div class="footer__copyright__text"><p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
 404 Stores Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved <!--  This template is made with <i class="fa fa-heart" aria-hidden="true"></i> by --> <a href="https://colorlib.com" target="_blank"></a>
  <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p></div>
                        <!-- <div class="footer__copyright__payment"><img src="img/payment-item.png" alt=""></div> -->
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- Footer Section End -->

    <!-- Js Plugins -->
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.nice-select.min.js"></script>
    <script src="js/jquery-ui.min.js"></script>
    <script src="js/jquery.slicknav.js"></script>
    <script src="js/mixitup.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/main.js"></script>



</body>

</html>
<?php } 

else{
    $user=$_COOKIE['user'];
    
?>

<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="250milestore">
    <meta name="keywords" content="Ogani, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>404 Stores| Home</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;600;900&display=swap" rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="css/jquery-ui.min.css" type="text/css">
    <link rel="stylesheet" href="css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="css/style.css" type="text/css">
    <style>
        @media screen and (max-width: 375px){
           .mix{
            width: 180px;
            height: 300px;
           } 
           .categories__item{
            width: auto;
            height: 250px;
            align-items: center;
           }
        }
          @media screen and (max-width: 414px){
           .mix{
            width: 180px;
            height: 300px;
           } 
           .categories__item{
            width: auto;
            height: 250px;
            align-items: center;
           }
        }
          @media screen and (max-width: 430px){
           .mix{
            width: 180px;
            height: 300px;
           } 
           .categories__item{
            width: auto;
            height: 250px;
            align-items: center;
           }
        }
          @media screen and (max-width: 540px){
           .mix{
            width: 180px;
            height: 300px;
           } 
           .categories__item{
            width: auto;
            height: 250px;
            align-items: center;
           }
        }
          @media screen and (max-width: 280px){
           .mix{
            width: 180px;
            height: 300px;
           } 
           .categories__item{
            width: auto;
            height: 250px;
            align-items: center;
           }
        }
    </style>
</head>
<!--Start of Tawk.to Script-->
<script>
    (function (w, d, s, u) {
    w.gbwawc = {
    url: u,
    options: {
            waId: "+250 793042909",
            siteName: "404 Store",
            siteTag: "Online",
            siteLogo: "https://assets.gallabox.com/gb-home/wa-chat-widget/bot+avatars/1.png",
            widgetPosition: "RIGHT",
            triggerMessage: "Help Center",
            welcomeMessage: "Welcome To 404 Store How we may help you?",
            brandColor: "#363636",
            messageText: "",
            replyOptions: ['How to make purchase?','How to make Order?'],
        },
    };
    var h = d.getElementsByTagName(s)[0],
    j = d.createElement(s);
    j.async = true;
    j.src = u + "/whatsapp-widget.min.js?_=" + Math.random();
    h.parentNode.insertBefore(j, h);
    })(window, document, "script", "https://waw.gallabox.com");
</script>
<!--End of Tawk.to Script-->
<body>
    <!-- Page Preloder -->
   
    <!-- Humberger Begin -->
    <div class="humberger__menu__overlay"></div>
    <div class="humberger__menu__wrapper">
        <div class="humberger__menu__logo">
            <!--<h1>250milestore</h1>-->
           <!-- <img src="img/logo.png" alt=""> --><!-- 250mstores -->
        </div>
        <div class="humberger__menu__cart">
            <ul>
                <li><a href="wishlist.php"><i class="fa fa-heart"></i><span style="background-color: #363636"><?php
 $viv=mysqli_query($conn,"SELECT COUNT(id) as cab FROM wishlist WHERE user_id='$user'");
 while ($zidd=mysqli_fetch_array($viv)) {
 
                            ?><?php echo $zidd['cab']?></span><?php } ?></a></li>
                <li><a href="shoping-cart.php"><i class="fa fa-shopping-bag"></i><span style="background-color: #363636"><?php
 $vi=mysqli_query($conn,"SELECT COUNT(id) as ca FROM cart WHERE user_id='$user'");
 while ($zid=mysqli_fetch_array($vi)) {
 
                            ?><?php echo $zid['ca']?></span><?php } ?></a></li>
            </ul> 
         
        </div>
        <div class="humberger__menu__widget">
            <!-- <div class="header__top__right__language">
                <img src="img/language.png" alt="">
                <div>English</div>
                <span class="arrow_carrot-down"></span>
                <ul>
                    <li><a href="#">Spanis</a></li>
                    <li><a href="#">English</a></li>
                </ul> 
            </div> -->
            <div class="header__top__right__auth">
                <a href="logout.php"><i class="fa fa-user"></i> Logout</a> 
            </div>
        </div>
        <nav class="humberger__menu__nav mobile-menu">
            <ul>
                <li class="active"><a href="./index.php">Home</a></li>
                <li><a href="./shop-grid.php">Shop</a></li>
                <!-- <li><a href="#">Pages</a>
                    <ul class="header__menu__dropdown">
                        <li><a href="./shop-details.html">Shop Details</a></li>
                        <li><a href="./shoping-cart.html">Shoping Cart</a></li>
                        <li><a href="./checkout.html">Check Out</a></li>
                        <li><a href="./blog-details.html">Blog Details</a></li>
                    </ul>
                </li> -->
                <!-- <li><a href="./blog.html">Blog</a></li> -->
                <li><a href="./contact.php">Contact</a></li>
            </ul>
        </nav>
        <div id="mobile-menu-wrap"></div>
        <div class="header__top__right__social">
            <a href="#"><i class="fa fa-facebook"></i></a>
            <a href="#"><i class="fa fa-twitter"></i></a>
            <a href="#"><i class="fa fa-linkedin"></i></a>
            <a href="#"><i class="fa fa-pinterest-p"></i></a>
        </div>
        <div class="humberger__menu__contact">
            <ul>
                <li><i class="fa fa-envelope"></i> info@domain.com</li>
                <li>Free Shipping in Rwanda</li>
            </ul>
        </div>
    </div>
    <!-- Humberger End -->

    <!-- Header Section Begin -->
    <header class="header">
        <div class="header__top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <div class="header__top__left">
                            <ul>
                                <li><i class="fa fa-envelope"></i> info@domain.com</li>
                                <li>Free Shipping in Rwanda</li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="header__top__right">
                            <div class="header__top__right__social">
                                <a href="#"><i class="fa fa-facebook"></i></a>
                                <a href="#"><i class="fa fa-twitter"></i></a>
                                <a href="#"><i class="fa fa-linkedin"></i></a>
                                <a href="#"><i class="fa fa-pinterest-p"></i></a>
                            </div>
                         <!--    <div class="header__top__right__language">
                                <img src="img/language.png" alt="">
                                <div>English</div>
                                <span class="arrow_carrot-down"></span>
                                <ul>
                                    <li><a href="#">Spanis</a></li>
                                    <li><a href="#">English</a></li>
                                </ul>
                            </div> -->
                            <div class="header__top__right__auth">
                                <a href="logout.php"><i class="fa fa-user"></i>Logout </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="header__logo">
                        <h2>404 Stores</h2>
                    </div>
                </div>
                <div class="col-lg-6">
                    <nav class="header__menu">
                        <ul>
                            <li class="active"><a href="./index.php">Home</a></li>
                            <li><a href="./shop-grid.php">Shop</a></li>
                            <!-- <li><a href="#">Pages</a>
                                <ul class="header__menu__dropdown">
                                    <li><a href="./shop-details.html">Shop Details</a></li>
                                    <li><a href="./shoping-cart.html">Shoping Cart</a></li>
                                    <li><a href="./checkout.html">Check Out</a></li>
                                    <li><a href="./blog-details.html">Blog Details</a></li>
                                </ul>
                            </li> -->
                            <!-- <li><a href="./blog.html">Blog</a></li> -->
                            <li><a href="./contact.php">Contact</a></li>
                        </ul>
                    </nav>
                </div>
                <div class="col-lg-3">
                   <div class="header__cart">
                        <ul>
                            <li><a href="wishlist.php"><i class="fa fa-heart"></i><span style="background-color: #363636"><?php
 $viv=mysqli_query($conn,"SELECT COUNT(id) as cab FROM wishlist WHERE user_id='$user'");
 while ($zidd=mysqli_fetch_array($viv)) {
 
                            ?><?php echo $zidd['cab']?></span><?php } ?></a></li>
                            <li><a href="shoping-cart.php"><i class="fa fa-shopping-bag"></i><span style="background-color: #363636"><?php
 $vi=mysqli_query($conn,"SELECT COUNT(id) as ca FROM cart WHERE user_id='$user'");
 while ($zid=mysqli_fetch_array($vi)) {
 
                            ?><?php echo $zid['ca']?></span><?php } ?></a></li>
                        </ul>
                        <?php
        $tel=mysqli_query($conn,"SELECT * FROM cart WHERE user_id='$user'");
        $pu=0;
        while ($nm=mysqli_fetch_array($tel)) {
            $pu+=$nm['tot'];
            $GLOBALS['pu'];
            }?> 
                        <div class="header__cart__price">Total: <span><?php echo $pu." "."RWF"?></span></div>
                    </div> 
                </div>
            </div>
            <div class="humberger__open">
                <i class="fa fa-bars"></i>
            </div>
        </div>
    </header>
    <!-- Header Section End -->

    <!-- Hero Section Begin -->
    <section class="hero">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="hero__categories">
                        <div class="hero__categories__all">
                            <i class="fa fa-bars"></i>
                            <span>All departments</span>
                        </div>
                        <ul>
                            <li><a href="cars.php">Cars</a></li>
                            <li><a href="spare.php">Spareparts</a></li>
                            <li><a href="menc.php">Men Clothes</a></li>
                            <li><a href="womenc.php">Women Clothes</a></li>
                            <li><a href="office.php">Offfice Supplies</a></li>
                            <li><a href="elect.php">Electronics</a></li>
                            <li><a href="body.php">Body Care & Lotion</a></li>
                            <li><a href="mena.php">Men Accessories</a></li>
                            <li><a href="womena.php">Women Accessories</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="hero__search">
                        <div class="hero__search__form">
                             <form action="search.php" method="POST">
                                <div class="hero__search__categories">
                                    All Categories
                                    <span class="arrow_carrot-down"></span>
                                </div>
                                <input type="text" placeholder="What are you looking for?" name="sea" required="">
                                <button type="submit" class="site-btn" name="search">SEARCH</button>
                            </form>
                        </div>
                        <div class="hero__search__phone">
                            <div class="hero__search__phone__icon">
                                <i class="fa fa-phone"></i>
                            </div>
                            <div class="hero__search__phone__text">
                                <h5>+250 788 658 900</h5>
                                <span>support 24/7 time</span>
                            </div>
                        </div>
                    </div>
                    <div class="hero__item set-bg" data-setbg="img/hero/car-5.jpg">
                        <div class="hero__text">
                           <h5 style="color: white"><b>Free Pickup and Delivery Available in Rwanda</b></h5>
                            <h2 style="color: white">New Car <br />50% Discount</h2>
                            
                            <a href="contact.php" class="primary-btn">CONTACT US!</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Hero Section End -->

    <!-- Categories Section Begin -->
    <!--<section class="categories">-->
    <!--    <div class="container">-->
    <!--        <div class="row">-->
    <!--            <div class="categories__slider owl-carousel">-->
    <!--                <div class="col-lg-3">-->
    <!--                    <div class="categories__item set-bg" data-setbg="img/categories/girl-dress.png">-->
    <!--                        <h5><a href="#">Women Clothes</a></h5>-->
    <!--                    </div>-->
    <!--                </div>-->
    <!--                <div class="col-lg-3">-->
    <!--                    <div class="categories__item set-bg" data-setbg="img/categories/office-desk.png">-->
    <!--                        <h5><a href="#">Office Supplies</a></h5>-->
    <!--                    </div>-->
    <!--                </div>-->
                   
    <!--                <div class="col-lg-3">-->
    <!--                    <div class="categories__item set-bg" data-setbg="img/categories/laptop-notebook-25.png">-->
    <!--                        <h5><a href="#">Electronics</a></h5>-->
    <!--                    </div>-->
    <!--                </div>-->
    <!--                <div class="col-lg-3">-->
    <!--                    <div class="categories__item set-bg" data-setbg="img/categories/honda-cars-11.png">-->
    <!--                        <h5><a href="#">Cars</a></h5>-->
    <!--                    </div>-->
    <!--                </div>-->
    <!--            </div>-->
    <!--        </div>-->
    <!--    </div>-->
    <!--</section>-->
    <!-- Categories Section End -->

    <!-- Featured Section Begin -->
    <section class="featured spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h2>Featured Product</h2>
                    </div>
                    <div class="featured__controls">
                        <ul>
                            <li class="active" data-filter="*">All</li>
                            <li data-filter=".oranges">Top Deals</li>
                            <li data-filter=".fresh-meat">Discount</li>
                            <li data-filter=".vegetables">Top Trends</li>
                            <li data-filter=".fastfood">New Arrivals</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row featured__filter">
            

                 <?php
$sqli=mysqli_query($conn,"SELECT * FROM product ORDER BY id ASC limit 2");
while ($ro=mysqli_fetch_array($sqli)) {
   
            ?>
            
                <div class="mix oranges" style="width: 120px;margin: 20px 20px 20px 20px;height: 170px;margin-top:50px">
                    <div class="featured__item">
                        <a style="display: none;" href="shop-details.php?id=<?php echo $ro['id']?>"><div class="featured__item__pic set-bg" data-setbg="<?php echo $ro['photo']?>">
                            <ul class="featured__item__pic__hover">
                                <li><a href="shop-details.php?id=<?php echo $ro['id']?>"><i class="fa fa-heart"></i></a></li>
                               
                               <li><a href="shop-details.php?id=<?php echo $ro['id']?>"><i class="fa fa-shopping-cart"></i></a></li>
                            </ul>
                        </div>
                        <div class="featured__item__text">
                            <h6><a href="shop-details.php?id=<?php echo $ro['id']?>"><?php echo $ro['name']?></a></h6>
                            <h5><?php echo $ro['price']." "."RWF"?></h5>
                        </div>
                    </div></a>
                </div>
            <?php } ?>
                       <?php
$sq=mysqli_query($conn,"SELECT * FROM product ORDER BY id DESC limit 2");
while ($r=mysqli_fetch_array($sq)) {
   
            ?>
            
                <div class="mix fresh-meat" style="width: 120px;margin: 20px 20px 20px 20px;height: 170px;margin-top:50px">
                    <div class="featured__item">
                        <div class="featured__item__pic set-bg" data-setbg="<?php echo $r['photo']?>">
                            <ul class="featured__item__pic__hover">
                                <li><a href="shop-details.php?id=<?php echo $r['id']?>"><i class="fa fa-heart"></i></a></li>
                               
                               <li><a href="shop-details.php?id=<?php echo $r['id']?>"><i class="fa fa-shopping-cart"></i></a></li>
                            </ul>
                        </div>
                        <div class="featured__item__text">
                            <h6><a href="shop-details.php?id=<?php echo $r['id']?>"><?php echo $r['name']?></a></h6>
                            <h5><?php echo $r['price']." "."RWF"?></h5>
                        </div>
                    </div>
                </div>
            <?php } ?>
                       <?php
$qld=mysqli_query($conn,"SELECT * FROM product where id>11 ORDER BY id ASC limit 2");
while ($fetch=mysqli_fetch_array($qld)) {
   
            ?>
            
                <div class="mix vegetables" style="width: 120px;margin: 20px 20px 20px 20px;height: 170px;margin-top:50px">
                    <div class="featured__item">
                        <div class="featured__item__pic set-bg" data-setbg="<?php echo $fetch['photo']?>">
                            <ul class="featured__item__pic__hover">
                                <li><a href="shop-details.php?id=<?php echo $fetch['id']?>"><i class="fa fa-heart"></i></a></li>
                               
                               <li><a href="shop-details.php?id=<?php echo $fetch['id']?>"><i class="fa fa-shopping-cart"></i></a></li>
                            </ul>
                        </div>
                        <div class="featured__item__text">
                            <h6><a href="shop-details.php?id=<?php echo $fetch['id']?>"><?php echo $fetch['name']?></a></h6>
                            <h5><?php echo $fetch['price']." "."RWF"?></h5>
                        </div>
                    </div>
                </div>
            <?php } ?>
                    <?php
$new=mysqli_query($conn,"SELECT * FROM product where id>15 ORDER BY id  DESC limit 2");
while ($ne=mysqli_fetch_array($new)) {
   
            ?>
            
                <div class="mix fastfood" style="width: 120px;margin: 20px 20px 20px 20px;height: 170px;margin-top:50px">
                    <div class="featured__item">
                        <div class="featured__item__pic set-bg" data-setbg="<?php echo $ne['photo']?>">
                            <ul class="featured__item__pic__hover">
                                <li><a href="shop-details.php?id=<?php echo $ne['id']?>"><i class="fa fa-heart"></i></a></li>
                               
                               <li><a href="shop-details.php?id=<?php echo $ne['id']?>"><i class="fa fa-shopping-cart"></i></a></li>
                            </ul>
                        </div>
                        <div class="featured__item__text">
                            <h6><a href="shop-details.php?id=<?php echo $ne['id']?>"><?php echo $ne['name']?></a></h6>
                            <h5><?php echo $ne['price']." "."RWF"?></h5>
                        </div>
                    </div>
                </div>
            <?php } ?>
               
            </div>
        </div>
    </section>
    <!-- Featured Section End -->

    <!-- Banner Begin -->
    <!-- <div class="banner">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="banner__pic">
                        <img src="img/banner/banner-1.jpg" alt="">
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="banner__pic">
                        <img src="img/banner/banner-2.jpg" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div> -->
    <!-- Banner End -->

    <!-- Latest Product Section Begin -->
    <section class="latest-product spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="latest-product__text">
                        <h4>Latest Products</h4>
                        <div class="latest-product__slider owl-carousel">
                            <?php 
   $select=mysqli_query($conn,"SELECT * FROM product ORDER BY id desc limit 6");
   while ($lat=mysqli_fetch_array($select)) {
       
                            ?>
                            <div class="latest-prdouct__slider__item">
                                <a href="shop-details.php?id=<?php echo $lat['id']?>" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="<?php echo $lat['photo']?>" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6><?php echo $lat['name']?></h6>
                                        <span><?php echo $lat['price']." "."RWF"?></span>
                                    </div>
                                </a>
                              
                            </div>
                        <?php } ?>
                           
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="latest-product__text">
                        <h4>Top Rated Products</h4>
                        <div class="latest-product__slider owl-carousel">
                            <?php
$related=mysqli_query($conn,"SELECT * FROM product ORDER by id ASC limit 6");
while ($top=mysqli_fetch_array($related)) {

                            ?>
                            <div class="latest-prdouct__slider__item">
                                <a href="shop-details.php?id=<?php echo $top['id']?>" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="<?php echo $top['photo']?>" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6><?php echo $top['name']?></h6>
                                        <span><?php echo $top['price']." "."RWF"?></span>
                                    </div>
                                </a>
                               
                               
                            </div>
                        <?php } ?>
                            
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="latest-product__text">
                        <h4>Review Products</h4>
                        <div class="latest-product__slider owl-carousel">
                            <?php
$rev=mysqli_query($conn,"SELECT * FROM product ORDER BY id DESC limit 6");
while ($review=mysqli_fetch_array($rev)) {

                            ?>
                            <div class="latest-prdouct__slider__item">
                                <a href="shop-details.php?id=<?php echo $review['id']?>" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="<?php echo $review['photo']?>" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6><?php echo $review['name']?></h6>
                                        <span><?php echo $review['price']." "."RWF"?></span>
                                    </div>
                                </a>
                               
                               
                            </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Latest Product Section End -->

    <!-- Blog Section Begin -->
    <!-- <section class="from-blog spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title from-blog__title">
                        <h2>From The Blog</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-6">
                    <div class="blog__item">
                        <div class="blog__item__pic">
                            <img src="img/blog/blog-1.jpg" alt="">
                        </div>
                        <div class="blog__item__text">
                            <ul>
                                <li><i class="fa fa-calendar-o"></i> May 4,2019</li>
                                <li><i class="fa fa-comment-o"></i> 5</li>
                            </ul>
                            <h5><a href="#">Cooking tips make cooking simple</a></h5>
                            <p>Sed quia non numquam modi tempora indunt ut labore et dolore magnam aliquam quaerat </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6">
                    <div class="blog__item">
                        <div class="blog__item__pic">
                            <img src="img/blog/blog-2.jpg" alt="">
                        </div>
                        <div class="blog__item__text">
                            <ul>
                                <li><i class="fa fa-calendar-o"></i> May 4,2019</li>
                                <li><i class="fa fa-comment-o"></i> 5</li>
                            </ul>
                            <h5><a href="#">6 ways to prepare breakfast for 30</a></h5>
                            <p>Sed quia non numquam modi tempora indunt ut labore et dolore magnam aliquam quaerat </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6">
                    <div class="blog__item">
                        <div class="blog__item__pic">
                            <img src="img/blog/blog-3.jpg" alt="">
                        </div>
                        <div class="blog__item__text">
                            <ul>
                                <li><i class="fa fa-calendar-o"></i> May 4,2019</li>
                                <li><i class="fa fa-comment-o"></i> 5</li>
                            </ul>
                            <h5><a href="#">Visit the clean farm in the US</a></h5>
                            <p>Sed quia non numquam modi tempora indunt ut labore et dolore magnam aliquam quaerat </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> -->
    <!-- Blog Section End -->

    <!-- Footer Section Begin -->
    <footer class="footer spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="footer__about">
                        <div class="footer__about__logo">
                            <a href="./index.html"><!-- <img src="img/logo.png" alt=""> --></a>
                        </div>
                        <ul>
                            <li>Address: Kn Ave 12 Kigali Rwanda</li>
                            <li>Phone: +250 798 566 776</li>
                            <li>Email: info@domain.com</li>
                        </ul>
                    </div>
                </div>
                <!-- <div class="col-lg-4 col-md-6 col-sm-6 offset-lg-1">
                    <div class="footer__widget">
                        <h6>Useful Links</h6>
                        <ul>
                            <li><a href="#">About Us</a></li>
                            <li><a href="#">About Our Shop</a></li>
                            <li><a href="#">Secure Shopping</a></li>
                            <li><a href="#">Delivery infomation</a></li>
                            <li><a href="#">Privacy Policy</a></li>
                            <li><a href="#">Our Sitemap</a></li>
                        </ul>
                        <ul>
                            <li><a href="#">Who We Are</a></li>
                            <li><a href="#">Our Services</a></li>
                            <li><a href="#">Projects</a></li>
                            <li><a href="#">Contact</a></li>
                            <li><a href="#">Innovation</a></li>
                            <li><a href="#">Testimonials</a></li>
                        </ul>
                    </div>
                </div> -->
               <!--  <div class="col-lg-4 col-md-12">
                    <div class="footer__widget">
                        <h6>Join Our Newsletter Now</h6>
                        <p>Get E-mail updates about our latest shop and special offers.</p>
                        <form action="#">
                            <input type="text" placeholder="Enter your mail">
                            <button type="submit" class="site-btn">Subscribe</button>
                        </form>
                        <div class="footer__widget__social">
                            <a href="#"><i class="fa fa-facebook"></i></a>
                            <a href="#"><i class="fa fa-instagram"></i></a>
                            <a href="#"><i class="fa fa-twitter"></i></a>
                            <a href="#"><i class="fa fa-pinterest"></i></a>
                        </div>
                    </div>
                </div> -->
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="footer__copyright">
                        <div class="footer__copyright__text"><p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
 404 Stores Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved <!--  This template is made with <i class="fa fa-heart" aria-hidden="true"></i> by --> <a href="https://colorlib.com" target="_blank"></a>
  <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p></div>
                        <!-- <div class="footer__copyright__payment"><img src="img/payment-item.png" alt=""></div> -->
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- Footer Section End -->

    <!-- Js Plugins -->
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.nice-select.min.js"></script>
    <script src="js/jquery-ui.min.js"></script>
    <script src="js/jquery.slicknav.js"></script>
    <script src="js/mixitup.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/main.js"></script>



</body>

</html>
<?php 
}?>