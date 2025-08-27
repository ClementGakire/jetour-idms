
<?php
include 'conn.php';
session_start();
if (!isset($_SESSION['user'])) {
   header("location:login1.php");
}
error_reporting(false);
$id=$_GET['id'];


$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$target_file1 = $target_dir . basename($_FILES["fileToUpload1"]["name"]);
$target_file2 = $target_dir . basename($_FILES["fileToUpload2"]["name"]);
$target_file3 = $target_dir . basename($_FILES["fileToUpload3"]["name"]);
$target_file4 = $target_dir . basename($_FILES["fileToUpload4"]["name"]);

$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
if(isset($_POST["save"])) {
$b=$_POST['pname'];
$c=$_POST['desc'];
$d=$_POST['size'];
$e=$_POST['color'];
$j=$_POST['price'];
$k=$_POST['cat']; 
 $sql=mysqli_query($conn,"UPDATE product SET name='$b',description='$c',size='$d',color='$e',category='$k',price='$j' WHERE id='$id'");
}


if ($uploadOk == 0) {
  $mm ="<h6 style='color:red'>Sorry, your file was not uploaded.</h6>";
// if everything is ok, try to upload file
} else {
  if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)&&(move_uploaded_file($_FILES["fileToUpload1"]["tmp_name"], $target_file1))&&(move_uploaded_file($_FILES["fileToUpload2"]["tmp_name"], $target_file2))&&(move_uploaded_file($_FILES["fileToUpload3"]["tmp_name"], $target_file3))&&(move_uploaded_file($_FILES["fileToUpload4"]["tmp_name"], $target_file4))) {
    $cc ="<h6 style='color:green'>The Product ". $b. " has been uploaded.</h6>";
    
  } else {
    // $kk="<h6 style='color:red'>Sorry, there was an error uploading your file.</h6>";
  }
 
  if ($sql) {
     header('location:product.php');
  }
    
}
?>

<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Ogani Template">
    <meta name="keywords" content="Ogani, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>404 Stores| Change Product</title>

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
        a{
            color: #363636;
            text-decoration: none;

        }
        a hover:{
            color: red;
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
    <!-- Page Preloder -->
    

    <!-- Humberger Begin -->
    <div class="humberger__menu__overlay"></div>
    <div class="humberger__menu__wrapper">
        <div class="humberger__menu__logo">
            <a href="#"><!-- <img src="img/logo.png" alt=""> --></a>
        </div>
      <!--   <div class="humberger__menu__cart">
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
                <a href="logout1.php"><i class="fa fa-user"></i> Logout</a>
            </div>
        </div> 
        <nav class="humberger__menu__nav mobile-menu">
            <ul>
                <li class="active"><a href="./admin.php">Uploading</a></li>
                <li><a href="product.php">Products</a></li>
                <li><a href="view.php">Discounts</a></li>
               <!--  <li><a href="#">Pages</a>
                    <ul class="header__menu__dropdown">
                        <li><a href="./shop-details.html">Shop Details</a></li>
                        <li><a href="./shoping-cart.html">Shoping Cart</a></li>
                        <li><a href="./checkout.html">Check Out</a></li>
                        <li><a href="./blog-details.html">Blog Details</a></li>
                    </ul>
                </li> -->
                <!-- <li><a href="./blog.html">Blog</a></li> -->
                <!-- <li><a href="./contact.html">Contact</a></li> -->
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
                           <!--  <div class="header__top__right__language">
                                <img src="img/language.png" alt="">
                                <div>English</div>
                                <span class="arrow_carrot-down"></span>
                                <ul>
                                    <li><a href="#">Spanis</a></li>
                                    <li><a href="#">English</a></li>
                                </ul>
                            </div> -->
                            <div class="header__top__right__auth">
                                <a href="logout1.php"><i class="fa fa-user"></i> Logout</a>
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
                            <li><a href="./admin.php">Uploading</a></li>
                            <li><a href="product.php">Product</a></li>
                            <li><a href="view.php">Discounts</a></li>
                            <!-- <li><a href="#">Pages</a>
                                <ul class="header__menu__dropdown">
                                    <li><a href="./shop-details.html">Shop Details</a></li>
                                    <li><a href="./shoping-cart.html">Shoping Cart</a></li>
                                    <li><a href="./checkout.html">Check Out</a></li>
                                    <li><a href="./blog-details.html">Blog Details</a></li>
                                </ul>
                            </li> -->
                            <!-- <li><a href="./blog.html">Blog</a></li> -->
                            <!-- <li class="active"><a href="./contact.html">Contact</a></li> -->
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
                   
                </div>
                <div class="col-lg-9">
                    <div class="hero__search">
                        
                        <div class="hero__search__phone">
                            <div class="hero__search__phone__icon">
                                <i class="fa fa-phone"></i>
                            </div>
                            <div class="hero__search__phone__text">
                                <h5>+250 788 675 800</h5>
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
                        <h2>Change Product</h2>
                        <div class="breadcrumb__option">
                            <!-- <a href="./index.html">Home</a>
                            <span>Sign Up</span> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Contact Section Begin -->
    <!-- <section class="contact spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-3 col-sm-6 text-center">
                    <div class="contact__widget">
                        <span class="icon_phone" style="color: #363636"></span>
                        <h4>Phone</h4>
                        <p>+250 788 656 900</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 text-center">
                    <div class="contact__widget">
                        <span class="icon_pin_alt" style="color: #363636"></span>
                        <h4>Address</h4>
                        <p>Gacuriro Kigali</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 text-center">
                    <div class="contact__widget">
                        <span class="icon_clock_alt" style="color: #363636"></span>
                        <h4>Open time</h4>
                        <p>8:00 am to 23:00 pm</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 text-center">
                    <div class="contact__widget">
                        <span class="icon_mail_alt" style="color: #363636"></span>
                        <h4>Email</h4>
                        <p>info@domain.com</p>
                    </div>
                </div>
            </div>
        </div>
    </section> -->
    <!-- Contact Section End -->


    
            <section class="checkout spad">
        <div class="container">
            <div class="row">
               
            </div>
            <div class="checkout__form">
                <h4>Change Your Product Here</h4>

                <?php echo $kk; ?>
                <?php echo $cc; ?>
                <?php echo $mm ; ?>
                <form action="#" method="POST" enctype="multipart/form-data">
                    <p>Fields With <span style="color: red">*</span> are required</p>
                    <?php
                $cher=mysqli_query($conn,"SELECT * FROM product WHERE id='$id'");
                while ($wo=mysqli_fetch_assoc($cher)) {
                    
                    ?>
                    <div class="row">
                        <div class="col-lg-8 col-md-6">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>Drawing Image<span>*</span></p>
                                        <input type="file" name="fileToUpload" id="fileToUpload" value="<?php echo $wo['photo']?>" >
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>Product Name<span>*</span></p>
                                        <input type="text" name="pname" value="<?php echo $wo['name']?>" required="">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>Description<span>*</span></p>
                                        <input type="text" name="desc" value="<?php echo $wo['description']?>" required="">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>Size<span>*</span></p>
                                        <input type="text" name="size" value="<?php echo $wo['size']?>" required="">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>Color<span>*</span></p>
                                        <input type="text" name="color" value="<?php echo $wo['color']?>" required="">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>Photo<span>*</span></p>
                                        <input type="file" name="fileToUpload1" value="<?php echo $wo['photo_1']?>" id="fileToUpload">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>Photo<span>*</span></p>
                                        <input type="file" name="fileToUpload2" value="<?php echo $wo['photo_2']?>" id="fileToUpload">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>Photo<span>*</span></p>
                                        <input type="file" name="fileToUpload3" value="<?php echo $wo['photo_3']?>" id="fileToUpload">
                                    </div>
                                </div>
                            </div>
                              <div class="row">
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>Photo<span>*</span></p>
                                        <input type="file" name="fileToUpload4" value="<?php echo $wo['photo_4']?>" id="fileToUpload">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>Price <span>*</span>(Without $,RWF...)</p>
                                        <input type="number" name="price" value="<?php echo $wo['price']?>" required="">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>Category<span>*</span></p>
                                       <select name="cat" required="">
                                        <option><?php echo $wo['category']?></option>
                                           <option>Choose Category</option>
                                           <option>Cars</option>
                                           <option>Women Clothes</option>
                                           <option>Men Clothes</option>
                                           <option>Office Supplies</option>
                                           <option>Electronics</option>
                                           <option>Body Care & Lotion</option>
                                           <option>Men Accesories</option>
                                           <option>Women Accesories</option> 
                                           <option>Spare Parts</option>                                       


                                       </select>
                                    </div>
                                </div>
                            </div>
                            <div class="checkout__input__checkbox">
                                
                                </label>
                            </div>
                           <button type="submit" class="site-btn" name="save">Upload Product</button><br><br>
                          
                        </div>

                    </div>
                </form>
            </div>
        </div><?php }?>
    </section>
    
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
</body>

</html>
