<?php session_start();
   if(isset($_POST['submit'])){
   $_SESSION['email'] = $_POST['email'];
   $_SESSION['password'] = $_POST['password'];
   }
   include 'connect.php';
   $err = " ";
   
   if(isset($_POST['submit'])) {
     if(empty($_POST['email'])) {
         $err = "Vui lòng nhập vào email";
     } elseif(empty($_POST['password'])) {
         $err = "Vui lòng nhập vào password";
     } else {
         // Lấy dữ liệu từ form
         $email = $_POST['email'];
         $password = md5($_POST['password']);
   
         $sql = "SELECT * FROM user WHERE email = '$email' AND pass = '$password'";
   
         $result = $con->query($sql);
   
         if(!$result){
   	echo "Lỗi: " . $con->error;
   }else{
         if($result->num_rows > 0) {
   	$row = $result->fetch_assoc();
             $id = $row['id'];
   	echo $id;
   	$_SESSION['id'] = $id;
   	echo '<div class="alert alert-success" role="alert">Đăng nhập thành công.</div>';
   	echo '<script>
   			setTimeout(function() {
   				window.location.href = "index.php";
   			}, 2000); // Chuyển hướng sau 2 giây
   		  </script>';
   } else {
   	echo '<div class="alert alert-danger" role="alert">Đăng nhập thất bại. Vui lòng thử lại.</div>';
   }
   }
         } 
     }
   ?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta name="description" content="">
      <meta name="author" content="">
      <title>Login | E-Shopper</title>
      <link href="css/bootstrap.min.css" rel="stylesheet">
      <link href="css/font-awesome.min.css" rel="stylesheet">
      <link href="css/prettyPhoto.css" rel="stylesheet">
      <link href="css/price-range.css" rel="stylesheet">
      <link href="css/animate.css" rel="stylesheet">
      <link href="css/main.css" rel="stylesheet">
      <link href="css/responsive.css" rel="stylesheet">
      <!--[if lt IE 9]>
      <script src="js/html5shiv.js"></script>
      <script src="js/respond.min.js"></script>
      <![endif]-->       
      <link rel="shortcut icon" href="images/ico/favicon.ico">
      <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
      <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
      <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
      <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
   </head>
   <!--/head-->
   <!-- <style>
      /* Thiết lập kiểu cho phần form */
      .login-form {
         background: #fff;
         padding: 20px;
         border-radius: 10px;
         box-shadow: 0px 0px 10px 0px rgba(0,0,0,0.1);
      }
      
      .login-form h2 {
         margin-bottom: 20px;
         color: #333;
      }
      
      .login-form input[type="email"],
      .login-form input[type="password"] {
         width: 100%;
         padding: 10px;
         margin-bottom: 15px;
         border: 1px solid #ccc;
         border-radius: 5px;
      }
      
      .login-form button {
         width: 100%;
         padding: 10px;
         background-color: #8B4513;
         color: #fff;
         border: none;
         border-radius: 5px;
         cursor: pointer;
      }
      
      .login-form button:hover {
         background-color: #0056b3;
      }
      
      .login-form span {
         display: block;
         margin-bottom: 15px;
      }
      
      .login-form .checkbox {
         margin-right: 10px;
      }
      
      .search_box {
         display: flex;
         align-items: center;
      }
      
      .search_box input[type="text"] {
      width: 100%; /* Chiều rộng 100% để trải dài ra */
         padding: 10px;
         border: 1px solid #ccc;
         border-radius: 5px;
      }
      
      .search_box input[type="text"]::placeholder {
         color: #999; /* Màu của văn bản gợi ý */
      }
      
      .search_box input[type="text"]:focus {
         border-color: #007bff; /* Màu viền khi input được focus */
         outline: none; /* Loại bỏ đường viền xung quanh input khi focus */
      }
      
      /* Nếu bạn muốn tuỳ chỉnh kiểu cho phần tìm kiếm, bạn có thể thêm các thuộc tính CSS khác tại đây */
      
      
      </style> -->
   <body>
      <h1>
         <?php
            if(isset($_SESSION['email'] )){
            $_SESSION['email'];
            }
            
            ?>
      </h1>
      <header id="header">
         <!--header-->
         <div class="header_top">
            <!--header_top-->
            <div class="container">
               <div class="row">
                  <div class="col-sm-6">
                     <div class="contactinfo">
                        <ul class="nav nav-pills">
                           <li><a href=""><i class="fa fa-phone"></i> +0794694769</a></li>
                           <li><a href=""><i class="fa fa-envelope"></i> Truyenmap420@gmail.com</a></li>
                        </ul>
                     </div>
                  </div>
                  <div class="col-sm-6">
                     <div class="social-icons pull-right">
                        <ul class="nav navbar-nav">
                           <li><a href=""><i class="fa fa-facebook"></i></a></li>
                           <li><a href=""><i class="fa fa-twitter"></i></a></li>
                           <li><a href=""><i class="fa fa-linkedin"></i></a></li>
                           <li><a href=""><i class="fa fa-dribbble"></i></a></li>
                           <li><a href=""><i class="fa fa-google-plus"></i></a></li>
                        </ul>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <!--/header_top-->
         <div class="header-middle">
            <!--header-middle-->
            <div class="container">
               <div class="row">
                  <div class="col-md-4 clearfix">
                     <div class="logo pull-left">
                        <a href="index.php"><img src="images/home/logo.png" alt="" width="150px"/></a>
                     </div>
                     <div class="btn-group pull-right clearfix">
                        <div class="btn-group">
                           <button type="button" class="btn btn-default dropdown-toggle usa" data-toggle="dropdown">
                           USA
                           <span class="caret"></span>
                           </button>
                           <ul class="dropdown-menu">
                              <li><a href="">Canada</a></li>
                              <li><a href="">UK</a></li>
                           </ul>
                        </div>
                        <div class="btn-group">
                           <button type="button" class="btn btn-default dropdown-toggle usa" data-toggle="dropdown">
                           DOLLAR
                           <span class="caret"></span>
                           </button>
                           <ul class="dropdown-menu">
                              <li><a href="">Canadian Dollar</a></li>
                              <li><a href="">Pound</a></li>
                           </ul>
                        </div>
                     </div>
                  </div>
                  <div class="col-md-8 clearfix">
                     <div class="shop-menu clearfix pull-right">
                        <ul class="nav navbar-nav">
                           <li><a href="" id="admin"><i class="fa fa-user"></i> Admin</a></li>
                           <li><a href=""><i class="fa fa-star"></i> Wishlist</a></li>
                           <li><a href="checkout.html"><i class="fa fa-crosshairs"></i> Checkout</a></li>
                           <li><a href="cart.php"><i class="fa fa-shopping-cart"></i> Cart</a></li>
                           <li><a href="login.html" id="login-link"><i class="fa fa-lock"></i> Login</a></li>
                        </ul>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <!--/header-middle-->
         <div class="header-bottom">
            <!--header-bottom-->
            <div class="container">
               <div class="row">
                  <div class="col-sm-9">
                     <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        </button>
                     </div>
                     <div class="mainmenu pull-left">
                        <ul class="nav navbar-nav collapse navbar-collapse">
                           <li><a href="index.php">Home</a></li>
                           <li><a href="404.html">404</a></li>
                           <li><a href="contact-us.html">Contact</a></li>
                           <li><a href="" id="list-product"></i> List</a></li>
                        </ul>
                     </div>
                  </div>
                  <div class="col-sm-3">
                     <div class="search_box pull-right">
                        <input type="text" placeholder="Search"/>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <!--/header-bottom-->
      </header>
      <!--/header-->
      <section id="form">
         <div class="container">
            <div class="row">
               <div class="col-sm-4 col-sm-offset-1">
                  <div class="login-form">
                     <h2>Login to your account</h2>
                     <form action="#" method="POST">
                        <input type="email" id="email" name="email" placeholder="Email" />
                        <input type="password" id="password" name="password" placeholder="Password" />
                        <span>
                        <input type="checkbox" class="checkbox"> 
                        Keep me signed in
                        </span>
                        <button type="submit" name="submit" class="btn btn-default">Login</button>
                     </form>
                     <br>
                     <p>Don't have an account? <a href="register.php">Sign up here</a></p>
                  </div>
               </div>
            </div>
         </div>
      </section>
      <!-- //+ chú y khi login xong thi tao 1 biến gi đó đưa vào SS, mình dựa vào biến SS này để check da login hay chua? -->
      <footer id="footer">
         <!--Footer-->
         <div class="footer-top">
            <div class="container">
               <div class="row">
                  <div class="col-sm-2">
                     <div class="companyinfo">
                        <h2><span>e</span>-shopper</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit,sed do eiusmod tempor</p>
                     </div>
                  </div>
                  <div class="col-sm-7">
                     <div class="col-sm-3">
                        <div class="video-gallery text-center">
                           <a href="#">
                              <div class="iframe-img">
                                 <img src="images/home/iframe1.png" alt="" />
                              </div>
                              <div class="overlay-icon">
                                 <i class="fa fa-play-circle-o"></i>
                              </div>
                           </a>
                           <p>Circle of Hands</p>
                           <h2>24 DEC 2014</h2>
                        </div>
                     </div>
                     <div class="col-sm-3">
                        <div class="video-gallery text-center">
                           <a href="#">
                              <div class="iframe-img">
                                 <img src="images/home/iframe2.png" alt="" />
                              </div>
                              <div class="overlay-icon">
                                 <i class="fa fa-play-circle-o"></i>
                              </div>
                           </a>
                           <p>Circle of Hands</p>
                           <h2>24 DEC 2014</h2>
                        </div>
                     </div>
                     <div class="col-sm-3">
                        <div class="video-gallery text-center">
                           <a href="#">
                              <div class="iframe-img">
                                 <img src="images/home/iframe3.png" alt="" />
                              </div>
                              <div class="overlay-icon">
                                 <i class="fa fa-play-circle-o"></i>
                              </div>
                           </a>
                           <p>Circle of Hands</p>
                           <h2>24 DEC 2014</h2>
                        </div>
                     </div>
                     <div class="col-sm-3">
                        <div class="video-gallery text-center">
                           <a href="#">
                              <div class="iframe-img">
                                 <img src="images/home/iframe4.png" alt="" />
                              </div>
                              <div class="overlay-icon">
                                 <i class="fa fa-play-circle-o"></i>
                              </div>
                           </a>
                           <p>Circle of Hands</p>
                           <h2>24 DEC 2014</h2>
                        </div>
                     </div>
                  </div>
                  <div class="col-sm-3">
                     <div class="address">
                        <img src="images/home/map.png" alt="" />
                        <p>505 S Atlantic Ave Virginia Beach, VA(Virginia)</p>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="footer-widget">
            <div class="container">
               <div class="row">
                  <div class="col-sm-2">
                     <div class="single-widget">
                        <h2>Service</h2>
                        <ul class="nav nav-pills nav-stacked">
                           <li><a href="">Online Help</a></li>
                           <li><a href="">Contact Us</a></li>
                           <li><a href="">Order Status</a></li>
                           <li><a href="">Change Location</a></li>
                           <li><a href="">FAQ’s</a></li>
                        </ul>
                     </div>
                  </div>
                  <div class="col-sm-2">
                     <div class="single-widget">
                        <h2>Quock Shop</h2>
                        <ul class="nav nav-pills nav-stacked">
                           <li><a href="">T-Shirt</a></li>
                           <li><a href="">Mens</a></li>
                           <li><a href="">Womens</a></li>
                           <li><a href="">Gift Cards</a></li>
                           <li><a href="">Shoes</a></li>
                        </ul>
                     </div>
                  </div>
                  <div class="col-sm-2">
                     <div class="single-widget">
                        <h2>Policies</h2>
                        <ul class="nav nav-pills nav-stacked">
                           <li><a href="">Terms of Use</a></li>
                           <li><a href="">Privecy Policy</a></li>
                           <li><a href="">Refund Policy</a></li>
                           <li><a href="">Billing System</a></li>
                           <li><a href="">Ticket System</a></li>
                        </ul>
                     </div>
                  </div>
                  <div class="col-sm-2">
                     <div class="single-widget">
                        <h2>About Shopper</h2>
                        <ul class="nav nav-pills nav-stacked">
                           <li><a href="">Company Information</a></li>
                           <li><a href="">Careers</a></li>
                           <li><a href="">Store Location</a></li>
                           <li><a href="">Affillate Program</a></li>
                           <li><a href="">Copyright</a></li>
                        </ul>
                     </div>
                  </div>
                  <div class="col-sm-3 col-sm-offset-1">
                     <div class="single-widget">
                        <h2>About Shopper</h2>
                        <form action="#" class="searchform">
                           <input type="text" placeholder="Your email address" />
                           <button type="submit" class="btn btn-default"><i class="fa fa-arrow-circle-o-right"></i></button>
                           <p>Get the most recent updates from <br />our site and be updated your self...</p>
                        </form>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="footer-bottom">
            <div class="container">
               <div class="row">
                  <p class="pull-left">Copyright © 2013 E-SHOPPER Inc. All rights reserved.</p>
                  <p class="pull-right">Designed by <span><a target="_blank" href="http://www.themeum.com">Themeum</a></span></p>
               </div>
            </div>
         </div>
      </footer>
      <script src="js/jquery.js"></script>
      <script src="js/price-range.js"></script>
      <script src="js/jquery.scrollUp.min.js"></script>
      <script src="js/bootstrap.min.js"></script>
      <script src="js/jquery.prettyPhoto.js"></script>
      <script src="js/main.js"></script>
      <?php if (!empty($err)) {
         echo "<p style='color: red;'>$err</p>";
          } ?>
   </body>
   <script>
      $(document).ready(function() {
      
      $('#login-link').on('click', function(event) {
              event.preventDefault(); // Ngăn chặn hành vi mặc định của liên kết
              window.location.href = 'login.php'; // Chuyển hướng tới trang login.php
          });
      
      $('#list-product').on('click', function(event) {
              event.preventDefault(); // Ngăn chặn hành vi mặc định của liên kết
              window.location.href = 'list-product.php'; // Chuyển hướng tới trang login.php
          });
      
      $('#logo').on('click', function(event) {
              event.preventDefault(); // Ngăn chặn hành vi mặc định của liên kết
              window.location.href = 'index.php'; // Chuyển hướng tới trang login.php
          });
      
      $('#home').on('click', function(event) {
              event.preventDefault(); // Ngăn chặn hành vi mặc định của liên kết
              window.location.href = 'index.php'; // Chuyển hướng tới trang login.php
          });
      
      $('#admin').on('click', function(event) {
              event.preventDefault(); // Ngăn chặn hành vi mặc định của liên kết
              window.location.href = 'add.php'; // Chuyển hướng tới trang login.php
          });
      
      });
   </script>
</html>