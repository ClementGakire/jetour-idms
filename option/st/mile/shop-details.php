<?php
include 'conn.php';
$id=$_GET['id'];
if (!isset($_COOKIE['user'])) {
?>
<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="404 sotes">
    <meta name="keywords" content="Ogani, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>404 Stores| Product-Details</title>

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
     <style type="text/css">
        /* The Modal (background) */
.modal {
    display: none; /* Hidden by default */
    position: fixed;
    z-index: 1;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    overflow: auto;
    background-color: rgba(0, 0, 0, 0.7); /* Black with opacity */
}
/* Modal Content/Box */
.modal-content {
    background-color: #fefefe;
    margin: 15% auto;
    padding: 20px;
    border: 1px solid #888;
    width: 40%;
    text-align: center;
    color: red;
    font-weight: 700;
    text-transform: uppercase;
}
/* The Close Button */
.close {
    color: #aaa;
    float: right;
    font-size: 28px;
    font-weight: bold;
}
.close:hover,
.close:focus {
    color: black;
    text-decoration: none;
    cursor: pointer;
}
    </style>
</head>
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
<body>
   
    <!-- Humberger Begin -->
    <div class="humberger__menu__overlay"></div>
    <div class="humberger__menu__wrapper">
        <div class="humberger__menu__logo">
            <!-- <a href="#"><img src="img/logo.png" alt=""></a> -->
        </div>
        <!-- <div class="humberger__menu__cart">
            <ul>
                <li><a href="#"><i class="fa fa-heart"></i> <span>1</span></a></li>
                <li><a href="#"><i class="fa fa-shopping-bag"></i> <span>3</span></a></li>
            </ul>
            <div class="header__cart__price">item: <span>$150.00</span></div>
        </div> -->
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
                <a href="login.php"><i class="fa fa-user"></i> Login</a>
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
                <li><i class="fa fa-envelope"></i> info@your domain.com</li>
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
                                <li>Free Shipping for all Order in Rwanda</li>
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
               <!--  <div class="col-lg-3">
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
                </div>
            </div>
        </div>
    </section>
    <!-- Hero Section End -->

    <!-- Breadcrumb Section Begin -->
    <?php
$pro=mysqli_query($conn,"SELECT * FROM product WHERE id='$id'");
$k=mysqli_fetch_array($pro);
    ?>
    <section class="breadcrumb-section set-bg" data-setbg="img/featured/car-11.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2><?php echo $k['name']?></h2>
                        <div class="breadcrumb__option">
                            <a href="./index.php">Home</a>
                            <a href=""><?php echo $k['category']?></a>
                            <span><?php echo $k['name']?></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Product Details Section Begin -->
    <section class="product-details spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <div class="product__details__pic">
                        <div class="product__details__pic__item">
                            <img class="product__details__pic__item--large"
                                src="<?php echo $k['photo']?>" alt="">
                        </div>
                        <div class="product__details__pic__slider owl-carousel">
                            <img data-imgbigurl="img/product/details/product-details-2.jpg"
                                src="<?php echo $k['photo_1']?>" alt="">
                            <img data-imgbigurl="img/product/details/product-details-3.jpg"
                                src="<?php echo $k['photo_2']?>" alt="">
                            <img data-imgbigurl="img/product/details/product-details-5.jpg"
                                src="<?php echo $k['photo_3']?>" alt="">
                            <img data-imgbigurl="img/product/details/product-details-4.jpg"
                                src="<?php echo $k['photo_4']?>" alt="">
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="product__details__text">
                        <h3><?php echo $k['name']?></h3>
                        <div class="product__details__rating">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star-half-o"></i>
                            <?php
$count=mysqli_query($conn,"SELECT COUNT(id) as cou FROM likes WHERE product_id=$id");
while ($rer=mysqli_fetch_array($count)) {
  $result=$rer['cou'];
                            ?>
                            <span><?php echo $result?> Reviews</span>
                            <?php } ?>
                        </div>
                        <div class="product__details__price"><?php echo $k['price']." "."RWF"?></div>
                        <p><?php echo $k['description']?></p>
                        <div class="product__details__quantity">
                            <div class="quantity">
                                <div class="pro-qty">
                                    <input type="text" value="1">
                                </div>
                            </div>
                        </div>
                        <button class="primary-btn" id="myBtn" style="border: none;">ADD TO CART</button>
                        <button class="primary-btn" id="myBtn" style="border: none;">WISHLIST</button>
                        <a href="#" class="heart-icon" ><span class="icon_heart_alt"></span></a>
                        <ul>
                            <li><b>Availability</b> <span>In Stock</span></li>
                            <li><b>Shipping</b> <span>01-04 day(s) shipping. <samp>Free pickup in Rwanda</samp></span></li>
                            <li><b>Size</b> <span><?php echo $k['size']?></span></li>
                            <li><b>Color</b><span><?php echo $k['color']?></span>
                                
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Product Details Section End -->

    <!-- Related Product Section Begin -->
    <section class="related-product">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title related__product__title">
                        <h2>Related Product</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <?php
                $cat=$k['category'];
$rel=mysqli_query($conn,"SELECT * FROM product WHERE category='$cat' AND id!=$id Order by id desc limit 3");
if (mysqli_num_rows($rel)) {
  
while ($re=mysqli_fetch_array($rel)) {
           ?>
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="product__item">
                        <div class="product__item__pic set-bg" data-setbg="<?php echo $re['photo']?>">
                            <ul class="product__item__pic__hover">
                                <li><a href="shop-details.php?id=<?php echo $re['id']?>"><i class="fa fa-heart"></i></a></li>
                                <li><a href="shop-details.php?id=<?php echo $re['id']?>"><i class="fa fa-shopping-cart"></i></a></li>
                            </ul>
                        </div>
                        <div class="product__item__text">
                            <h6><a href="shop-details.php?id=<?php echo $re['id']?>"><?php echo $re['name']?></a></h6>
                            <h5><?php echo $re['price']." "."RWF"?></h5>
                        </div>
                    </div>
                </div><?php } } else{
                    echo "<h4 style='color:red;text-align:center'>No related Product</h4>";
                }?>
               
            </div>
        </div>
        <div id="myModal" class="modal">
    <!-- Modal content -->
    <div class="modal-content">
        <span class="close">×</span>
        <p>Sorry,You must Login First to Perform this action</p><center>
        <a href="login.php"><button class="primary-btn" style="border: none;width: 300px">Login</button></a></center>
    </div>
</div>
    </section>
    <!-- Related Product Section End -->

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
<script type="text/javascript">
    // Get the modal
const modal = document.getElementById("myModal");
// Get the button that opens the modal
const btn = document.getElementById("myBtn");
// Get the <span> element that closes the modal
const span = document.getElementsByClassName("close")[0];

// When the user clicks on the button, open the modal
btn.onclick = function () {
    modal.style.display = "block";
};

// When the user clicks on <span> (x), close the modal
span.onclick = function () {
    modal.style.display = "none";
};

// When the user clicks anywhere outside of the modal, close it
window.onclick = function (event) {
    if (event.target === modal) {
        modal.style.display = "none";
    }
};
</script>
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
    $idd=$_COOKIE['user'];
    $user=mysqli_query($conn,"SELECT * FROM users WHERE id=$id");
    $us=mysqli_fetch_array($user);
    $name=$us['fname'];
    $len=substr($name, 0,1);
    if (isset($_POST['add'])) {
        $section=mysqli_query($conn,"SELECT price FROM product WHERE id='$id'");
        $sect=mysqli_fetch_array($section);
        $qua=$_POST['quantity'];
        $tot=$sect['price'];
        $tut=$qua*$tot;
        $cart=mysqli_query($conn,"INSERT INTO cart(user_id,product_id,quantity,tot)VALUES('$idd','$id','$qua','$tut')");
        header("location:shoping-cart.php");
    }
     if (isset($_POST['save'])) {
        $date=date("Y-m-d");
        $cart=mysqli_query($conn,"INSERT INTO wishlist(user_id,product_id,duration)VALUES('$idd','$id','$date')");
        header("location:wishlist.php");
    }
?>

<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="404 sotes">
    <meta name="keywords" content="Ogani, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>404 Stores| Product-Details</title>

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
</head>
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
<body>
   
    <!-- Humberger Begin -->
    <div class="humberger__menu__overlay"></div>
    <div class="humberger__menu__wrapper">
        <div class="humberger__menu__logo">
            <!-- <a href="#"><img src="img/logo.png" alt=""></a> -->
        </div>
         <div class="humberger__menu__cart">
            <ul>
                <li><a href="wishlist.php"><i class="fa fa-heart"></i><span style="background-color: #363636"><?php
 $viv=mysqli_query($conn,"SELECT COUNT(id) as cab FROM wishlist WHERE user_id='$idd'");
 while ($zidd=mysqli_fetch_array($viv)) {
 
                            ?><?php echo $zidd['cab']?></span><?php } ?></a></li>
                <li><a href="shoping-cart.php"><i class="fa fa-shopping-bag"></i><span style="background-color: #363636"><?php
 $vi=mysqli_query($conn,"SELECT COUNT(id) as ca FROM cart WHERE user_id='$idd'");
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
                <li><i class="fa fa-envelope"></i> info@your domain.com</li>
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
                                <li>Free Shipping for all Order in Rwanda</li>
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
                          <li><a href="wishlist.php"><i class="fa fa-heart"></i><span style="background-color: #363636"><?php
 $viv=mysqli_query($conn,"SELECT COUNT(id) as cab FROM wishlist WHERE user_id='$idd'");
 while ($zidd=mysqli_fetch_array($viv)) {
 
                            ?><?php echo $zidd['cab']?></span><?php } ?></a></li>
                            <li><a href="shoping-cart.php"><i class="fa fa-shopping-bag"></i><span style="background-color: #363636"><?php
 $vi=mysqli_query($conn,"SELECT COUNT(id) as ca FROM cart WHERE user_id='$idd'");
 while ($zid=mysqli_fetch_array($vi)) {
 
                            ?><?php echo $zid['ca']?></span><?php } ?></a></li>
                        </ul>
                        <?php
        $tel=mysqli_query($conn,"SELECT * FROM cart WHERE user_id='$idd'");
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
    <section class="hero hero-normal">
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
                </div>
            </div>
        </div>
    </section>
    <!-- Hero Section End -->

    <!-- Breadcrumb Section Begin -->
    <?php
$pro=mysqli_query($conn,"SELECT * FROM product WHERE id='$id'");
$k=mysqli_fetch_array($pro);
    ?>
    <section class="breadcrumb-section set-bg" data-setbg="img/featured/car-11.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2><?php echo $k['name']?></h2>
                        <div class="breadcrumb__option">
                            <a href="./index.php">Home</a>
                            <a href=""><?php echo $k['category']?></a>
                            <span><?php echo $k['name']?></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Product Details Section Begin -->
    <section class="product-details spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <div class="product__details__pic">
                        <div class="product__details__pic__item">
                            <img class="product__details__pic__item--large"
                                src="<?php echo $k['photo']?>" alt="">
                        </div>
                        <div class="product__details__pic__slider owl-carousel">
                            <img data-imgbigurl="img/product/details/product-details-2.jpg"
                                src="<?php echo $k['photo_1']?>" alt="">
                            <img data-imgbigurl="img/product/details/product-details-3.jpg"
                                src="<?php echo $k['photo_2']?>" alt="">
                            <img data-imgbigurl="img/product/details/product-details-5.jpg"
                                src="<?php echo $k['photo_3']?>" alt="">
                            <img data-imgbigurl="img/product/details/product-details-4.jpg"
                                src="<?php echo $k['photo_4']?>" alt="">
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="product__details__text">
                        <h3><?php echo $k['name']?></h3>
                        <div class="product__details__rating">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star-half-o"></i>
                             <?php
$count=mysqli_query($conn,"SELECT COUNT(id) as cou FROM likes WHERE product_id=$id");
while ($rer=mysqli_fetch_array($count)) {
  $result=$rer['cou'];
                            ?>
                            <span><?php echo $result?> Reviews</span>
                            <?php } ?>
                        </div>
                        <div class="product__details__price"><?php echo $k['price']." "."RWF"?></div>
                        <p><?php echo $k['description']?></p>
                        <form method="POST">
                        <div class="product__details__quantity">
                            <div class="quantity">
                                <div class="pro-qty">
                                    <input type="text" value="1" name="quantity">
                                </div>
                            </div>
                        </div>
                        <input type="submit" class="primary-btn" name="add" value="ADD TO CART" style="border: none;">
                        <input type="submit" class="primary-btn" name="save" value="WISHLIST" style="border: none;">
                        <?php
     $like=mysqli_query($conn,"SELECT * FROM likes WHERE user_id='$idd' AND product_id='$id'");
     if (mysqli_num_rows($like)>0) {
                        ?>
                        <a href="like.php?idd=<?php echo $k['id']?>" class="heart-icon"><span class="icon_heart" style="color:red"></span></a><?php } else{ ?>
                            <a href="like.php?idd=<?php echo $k['id']?>" class="heart-icon"><span class="icon_heart_alt" ></span></a><?php }?></form>
                        <ul>
                            <li><b>Availability</b> <span>In Stock</span></li>
                            <li><b>Shipping</b> <span>01-04 day(s) shipping. <samp>Free pickup in Rwanda</samp></span></li>
                            <li><b>Size</b> <span><?php echo $k['size']?></span></li>
                            <li><b>Color</b><span><?php echo $k['color']?></span>
                                
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Product Details Section End -->

    <!-- Related Product Section Begin -->
    <section class="related-product">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title related__product__title">
                        <h2>Related Product</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <?php
                $cat=$k['category'];
$rel=mysqli_query($conn,"SELECT * FROM product WHERE category='$cat' AND id!=$id Order by id desc limit 3");
if (mysqli_num_rows($rel)) {
  
while ($re=mysqli_fetch_array($rel)) {
           ?>
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="product__item">
                        <div class="product__item__pic set-bg" data-setbg="<?php echo $re['photo']?>">
                            <ul class="product__item__pic__hover">
                                <li><a href="shop-details.php?id=<?php echo $re['id']?>"><i class="fa fa-heart"></i></a></li>
                                <li><a href="shop-details.php?id=<?php echo $re['id']?>"><i class="fa fa-shopping-cart"></i></a></li>
                            </ul>
                        </div>
                        <div class="product__item__text">
                            <h6><a href="shop-details.php?id=<?php echo $re['id']?>"><?php echo $re['name']?></a></h6>
                            <h5><?php echo $re['price']." "."RWF"?></h5>
                        </div>
                    </div>
                </div><?php } } else{
                    echo "<h4 style='color:red;text-align:center'>No related Product</h4>";
                }?>
               
            </div>
        </div>
    </section>
    <!-- Related Product Section End -->

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
 250Milestores Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved <!--  This template is made with <i class="fa fa-heart" aria-hidden="true"></i> by --> <a href="https://colorlib.com" target="_blank"></a>
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

}
?>