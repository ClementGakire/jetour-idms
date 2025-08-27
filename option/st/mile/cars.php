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
    <title>404 Stores| Cars</title>

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
           .product__discount__item__pic{
            height: 270px;
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
           .product__discount__item__pic{
            height: 270px;
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
           .product__discount__item__pic{
            height: 270px;
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
           .product__discount__item__pic{
            height: 270px;
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
           .product__discount__item__pic{
            height: 270px;
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
            <!-- <h2>250milestore</h2> -->
        </div>
       <!--  <div class="humberger__menu__cart">
            <ul>
                <li><a href="#"><i class="fa fa-heart"></i> <span>1</span></a></li>
                <li><a href="#"><i class="fa fa-shopping-bag"></i> <span>3</span></a></li>
            </ul>
            <div class="header__cart__price">item: <span>$150.00</span></div>
        </div> -->
       <div class="humberger__menu__widget">
           <!--   <div class="header__top__right__language">
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
        <nav class="humberger__menu__nav mobile-menu">
            <ul>
                <li ><a href="./index.php">Home</a></li>
                <li class="active"><a href="./shop-grid.php">Shop</a></li>
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
                <li>Free Shipping for all Order in Rwanda</li>
            </ul>
        </div>
    </div>
    <!-- Humberger End -->

    <!-- Header Section Begin -->
    <header class="header">
        <div class="header__top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="header__top__left">
                            <ul>
                                <li><i class="fa fa-envelope"></i> info@domain.com</li>
                                <li>Free Shipping for all Order in Rwnda</li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="header__top__right">
                            <div class="header__top__right__social">
                                <a href="#"><i class="fa fa-facebook"></i></a>
                                <a href="#"><i class="fa fa-twitter"></i></a>
                                <a href="#"><i class="fa fa-linkedin"></i></a>
                                <a href="#"><i class="fa fa-pinterest-p"></i></a>
                            </div>
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
                            <li><a href="./index.php">Home</a></li>
                            <li class="active"><a href="./shop-grid.php">Shop</a></li>
                           <!--  <li><a href="#">Pages</a>
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
                <!-- <div class="col-lg-3">
                    <div class="header__cart">
                        <ul>
                            <li><a href="#"><i class="fa fa-heart"></i> <span>1</span></a></li>
                            <li><a href="#"><i class="fa fa-shopping-bag"></i> <span>3</span></a></li>
                        </ul>
                        <div class="header__cart__price">item: <span>$150.00</span></div>
                    </div>
                </div> -->
            </div>
            <div class="humberger__open">
                <i class="fa fa-bars"></i>
            </div>
        </div>
    </header>
    <!-- Header Section End -->

    <!-- Hero Section Begin -->
    <section class="hero hero-normal">
        <div class="container">
            <div class="row">
                
               <!-- <div class="col-lg-9">
                    <div class="hero__search">
                        <div class="hero__search__form">
                            <form action="#">
                                <div class="hero__search__categories">
                                    All Categories
                                    <span class="arrow_carrot-down"></span>
                                </div>
                                <input type="text" placeholder="What do yo u need?">
                                <button type="submit" class="site-btn">SEARCH</button>
                            </form>
                        </div>
                        <div class="hero__search__phone">
                            <div class="hero__search__phone__icon">
                                <i class="fa fa-phone"></i>
                            </div>
                            <div class="hero__search__phone__text">
                                <h5>+250 788 544 800</h5>
                                <span>support 24/7 time</span>
                            </div>
                        </div>
                    </div>
                </div>-->
            </div>
        </div>
    </section>
    <!-- Hero Section End -->

    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section set-bg" data-setbg="img/featured/car-11.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>404 Stores</h2>
                        <div class="breadcrumb__option">
                            <a href="./index.php">Home</a>
                            <span>Shop</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Product Section Begin -->
    <section class="product spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-5">
                    <div class="sidebar">
                        <!--<div class="">
                            
                            <ul>
                             <li><a href="#">Cars</a></li>
                            <li><a href="#">Spareparts</a></li>
                            <li><a href="#">Men Clothes</a></li>
                            <li><a href="#">Women Clothes</a></li>
                            <li><a href="#">Offfice Supplies</a></li>
                            <li><a href="#">Electronics</a></li>
                            <li><a href="#">Body Care & Lotion</a></li>
                            <li><a href="#">Men Accessories</a></li>
                            <li><a href="#">Women Accessories</a></li>
                            </ul>
                        </div>-->
                        <div class="sidebar__item featured1__controls">
                            <h4>FILTERS</h4>
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
                        <!-- <div class="sidebar__item">
                            <h4>Price</h4>
                            <div class="price-range-wrap">
                                <div class="price-range ui-slider ui-corner-all ui-slider-horizontal ui-widget ui-widget-content"
                                    data-min="10" data-max="540">
                                    <div class="ui-slider-range ui-corner-all ui-widget-header"></div>
                                    <span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default"></span>
                                    <span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default"></span>
                                </div>
                                <div class="range-slider">
                                    <div class="price-input">
                                        <input type="text" id="minamount">
                                        <input type="text" id="maxamount">
                                    </div>
                                </div>
                            </div>
                        </div> --><!-- 
                        <div class="sidebar__item sidebar__item__color--option">
                            <h4>Colors</h4>
                            <div class="sidebar__item__color sidebar__item__color--white">
                                <label for="white">
                                    White
                                    <input type="radio" id="white">
                                </label>
                            </div>
                            <div class="sidebar__item__color sidebar__item__color--gray">
                                <label for="gray">
                                    Gray
                                    <input type="radio" id="gray">
                                </label>
                            </div>
                            <div class="sidebar__item__color sidebar__item__color--red">
                                <label for="red">
                                    Red
                                    <input type="radio" id="red">
                                </label>
                            </div>
                            <div class="sidebar__item__color sidebar__item__color--black">
                                <label for="black">
                                    Black
                                    <input type="radio" id="black">
                                </label>
                            </div>
                            <div class="sidebar__item__color sidebar__item__color--blue">
                                <label for="blue">
                                    Blue
                                    <input type="radio" id="blue">
                                </label>
                            </div>
                            <div class="sidebar__item__color sidebar__item__color--green">
                                <label for="green">
                                    Green
                                    <input type="radio" id="green">
                                </label>
                            </div>
                        </div> -->
                        <!-- <div class="sidebar__item">
                            <h4>Popular Size</h4>
                            <div class="sidebar__item__size">
                                <label for="large">
                                    Large
                                    <input type="radio" id="large">
                                </label>
                            </div>
                            <div class="sidebar__item__size">
                                <label for="medium">
                                    Medium
                                    <input type="radio" id="medium">
                                </label>
                            </div>
                            <div class="sidebar__item__size">
                                <label for="small">
                                    Small
                                    <input type="radio" id="small">
                                </label>
                            </div>
                            <div class="sidebar__item__size">
                                <label for="tiny">
                                    Tiny
                                    <input type="radio" id="tiny">
                                </label>
                            </div>
                        </div> -->
                        <div class="sidebar__item">
                            <div class="latest-product__text">
                                <h4>Latest Products</h4>
                                <div class="latest-product__slider owl-carousel">
                                     <?php
$rev=mysqli_query($conn,"SELECT * FROM product WHERE category='Cars' ORDER BY id DESC limit 6");
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
                <div class="col-lg-9 col-md-7">
                      <center><h4 style="font-weight: 700">Cars</h4></center>
               
                    <div class="row featured__filter">
                     
                          <?php
$sq=mysqli_query($conn,"SELECT * FROM product WHERE category='Cars' ORDER BY id DESC limit 21");
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
    
               
            </div>
        </div>
    </section>
    <!-- Product Section End -->

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
<?php } else{

    ?>
    <!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="250milestore">
    <meta name="keywords" content="Ogani, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>404 Stores| Cars</title>

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
           .product__discount__item__pic{
            height: 270px;
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
           .product__discount__item__pic{
            height: 270px;
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
           .product__discount__item__pic{
            height: 270px;
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
           .product__discount__item__pic{
            height: 270px;
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
           .product__discount__item__pic{
            height: 270px;
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
            <!-- <h2>250milestore</h2> -->
        </div>
        <div class="humberger__menu__cart">
            
        </div> 
       <div class="humberger__menu__widget">
           <!--   <div class="header__top__right__language">
                <img src="img/language.png" alt="">
                <div>English</div>
                <span class="arrow_carrot-down"></span>
                <ul>
                    <li><a href="#">Spanis</a></li>
                    <li><a href="#">English</a></li>
                </ul>
            </div> -->
            <div class="header__top__right__auth">
                <a href="login.php"><i class="fa fa-user"></i> Logout</a>
            </div>
        </div>
        <nav class="humberger__menu__nav mobile-menu">
            <ul>
                <li ><a href="./index.php">Home</a></li>
                <li class="active"><a href="./shop-grid.php">Shop</a></li>
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
                <li>Free Shipping for all Order in Rwanda</li>
            </ul>
        </div>
    </div>
    <!-- Humberger End -->

    <!-- Header Section Begin -->
    <header class="header">
        <div class="header__top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="header__top__left">
                            <ul>
                                <li><i class="fa fa-envelope"></i> info@domain.com</li>
                                <li>Free Shipping for all Order in Rwnda</li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="header__top__right">
                            <div class="header__top__right__social">
                                <a href="#"><i class="fa fa-facebook"></i></a>
                                <a href="#"><i class="fa fa-twitter"></i></a>
                                <a href="#"><i class="fa fa-linkedin"></i></a>
                                <a href="#"><i class="fa fa-pinterest-p"></i></a>
                            </div>
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
                            <li><a href="./index.php">Home</a></li>
                            <li class="active"><a href="./shop-grid.php">Shop</a></li>
                           <!--  <li><a href="#">Pages</a>
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
                            
                          
                        </ul>
                        
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
    <section class="hero hero-normal">
        <div class="container">
            <div class="row">
                
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
                                <h5>+250 788 544 800</h5>
                                <span>support 24/7 time</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Hero Section End -->

    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section set-bg" data-setbg="img/featured/car-11.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>404 Stores</h2>
                        <div class="breadcrumb__option">
                            <a href="./index.php">Home</a>
                            <span>Cars</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Product Section Begin -->
    <section class="product spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-5">
                    <div class="sidebar">
                        <!--<div class="">
                            
                            <ul>
                             <li><a href="#">Cars</a></li>
                            <li><a href="#">Spareparts</a></li>
                            <li><a href="#">Men Clothes</a></li>
                            <li><a href="#">Women Clothes</a></li>
                            <li><a href="#">Offfice Supplies</a></li>
                            <li><a href="#">Electronics</a></li>
                            <li><a href="#">Body Care & Lotion</a></li>
                            <li><a href="#">Men Accessories</a></li>
                            <li><a href="#">Women Accessories</a></li>
                            </ul>
                        </div>-->
                        <div class="sidebar__item featured1__controls">
                            <h4>FILTERS</h4>
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
                        <!-- <div class="sidebar__item">
                            <h4>Price</h4>
                            <div class="price-range-wrap">
                                <div class="price-range ui-slider ui-corner-all ui-slider-horizontal ui-widget ui-widget-content"
                                    data-min="10" data-max="540">
                                    <div class="ui-slider-range ui-corner-all ui-widget-header"></div>
                                    <span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default"></span>
                                    <span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default"></span>
                                </div>
                                <div class="range-slider">
                                    <div class="price-input">
                                        <input type="text" id="minamount">
                                        <input type="text" id="maxamount">
                                    </div>
                                </div>
                            </div>
                        </div> --><!-- 
                        <div class="sidebar__item sidebar__item__color--option">
                            <h4>Colors</h4>
                            <div class="sidebar__item__color sidebar__item__color--white">
                                <label for="white">
                                    White
                                    <input type="radio" id="white">
                                </label>
                            </div>
                            <div class="sidebar__item__color sidebar__item__color--gray">
                                <label for="gray">
                                    Gray
                                    <input type="radio" id="gray">
                                </label>
                            </div>
                            <div class="sidebar__item__color sidebar__item__color--red">
                                <label for="red">
                                    Red
                                    <input type="radio" id="red">
                                </label>
                            </div>
                            <div class="sidebar__item__color sidebar__item__color--black">
                                <label for="black">
                                    Black
                                    <input type="radio" id="black">
                                </label>
                            </div>
                            <div class="sidebar__item__color sidebar__item__color--blue">
                                <label for="blue">
                                    Blue
                                    <input type="radio" id="blue">
                                </label>
                            </div>
                            <div class="sidebar__item__color sidebar__item__color--green">
                                <label for="green">
                                    Green
                                    <input type="radio" id="green">
                                </label>
                            </div>
                        </div> -->
                        <!-- <div class="sidebar__item">
                            <h4>Popular Size</h4>
                            <div class="sidebar__item__size">
                                <label for="large">
                                    Large
                                    <input type="radio" id="large">
                                </label>
                            </div>
                            <div class="sidebar__item__size">
                                <label for="medium">
                                    Medium
                                    <input type="radio" id="medium">
                                </label>
                            </div>
                            <div class="sidebar__item__size">
                                <label for="small">
                                    Small
                                    <input type="radio" id="small">
                                </label>
                            </div>
                            <div class="sidebar__item__size">
                                <label for="tiny">
                                    Tiny
                                    <input type="radio" id="tiny">
                                </label>
                            </div>
                        </div> -->
                        <div class="sidebar__item">
                            <div class="latest-product__text">
                                <h4>Latest Products</h4>
                                <div class="latest-product__slider owl-carousel">
                                     <?php
$rev=mysqli_query($conn,"SELECT * FROM product WHERE category='Cars' ORDER BY id DESC limit 6");
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
                <div class="col-lg-9 col-md-7">
                    
               
                    <div class="row featured__filter">
                       
                          <?php
$sq=mysqli_query($conn,"SELECT * FROM product WHERE category='Cars' ORDER BY id DESC limit 21");
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
    
               
            </div>
        </div>
    </section>
    <!-- Product Section End -->

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
<?php }?>