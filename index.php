<?php
session_start();
include("pdoInc.php");
?>

<html>
<head>
    <title>VR LAB</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <!-- css -->
    <link rel="stylesheet" type="text/css" href="styles/team.css">
    <link rel="stylesheet" type="text/css" href="styles/index.css">
    <link rel="stylesheet" type="text/css" href="styles/bootstrap-expand.css">
    <!-- js -->
    <!--  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="js/chatroom.js"></script> -->
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
     <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
     <!-- Font awesome-->
     <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
    <!-- leaflet map api -->
     <link rel="stylesheet" href="https://unpkg.com/leaflet@1.4.0/dist/leaflet.css"
        integrity="sha512-puBpdR0798OZvTTbP4A8Ix/l+A4dHDD0DGqYW6RQ+9jxkRFclaxxQb/SJAWZfWAkuyeQUytO7+7N4QKrDh+drA=="
        crossorigin=""/>
     <script src="https://unpkg.com/leaflet@1.4.0/dist/leaflet.js"
        integrity="sha512-QVftwZFqvtRNi0ZyCtsznlKSWOStnDORoefr1enyq5mVL4tmKB3S/EnC3rRJcxCPavG10IcrVGSmPh6Qw5lwrg=="
        crossorigin=""></script>

</head>
<!-- <body style="font-family: 微軟正黑體 ; background-image: url(img/background.png)"> -->
<body style=" font-family: 微軟正黑體 ; background-color: #040C1B ; color:white; ">

<!-- ==========================================nav-bar==================================================-->
<!--參考網址：https://ithelp.ithome.com.tw/articles/10192870-->
<!-- .navbar-expand-{sm|md|lg|xl}決定在哪個斷點以上就出現漢堡式選單 -->
<!-- bg-dark -->
  <nav class="navbar navbar-expand-lg navbar-dark fixed-top" style="background-color: rgba(18,37,68,0.9);">
    <!-- .navbar-brand 左上LOGO位置 -->
    <a class="navbar-brand" href="index.php">
      <img src="img/logo_green.png" width="50" height="30" class="d-inline-block align-top" alt="">
      <span class="h3 mx-1"></span>
    </a>
    <!-- .navbar-toggler 漢堡式選單按鈕 -->
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <!-- .navbar-toggler-icon 漢堡式選單Icon -->
      <span class="navbar-toggler-icon"></span>
    </button>

    <!-- .collapse.navbar-collapse 用於外層中斷點群組和隱藏導覽列內容 -->
    <!-- 選單項目&漢堡式折疊選單 -->
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <!-- active表示當前頁面 -->
        <li class="nav-item">
          <a class="nav-link active" href="index.php">首頁 <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="functions.php"> 功能簡介 </a>
        </li>
        <!-- disable 訂死的選單 -->
        <!-- <li class="nav-item">
          <a class="nav-link disabled" href="#">Disabled</a>
        </li> -->
        <!-- .dropdown Navbar選項使用下拉式選單 -->
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="information.php" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> 相關資訊 </a>
          <!-- .dropdown-menu 下拉選單內容 -->
          <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            <a class="dropdown-item" href="information.php#a-part">a</a>
            <a class="dropdown-item" href="information.php#b-part">b</a>
            <a class="dropdown-item" href="information.php#c-part">c</a>
          </div>
        </li>

      </ul>
     <!--  <form class="form-inline my-2 my-lg-0">
        <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search
        </button>
      </form> -->
      <ul class="navbar-nav ml-auto" >
     <?php
         if(isset($_SESSION['account']) && $_SESSION['account'] != null){ //登入狀態
             //修改會員資料
             echo '<a href="member_info.php"><img src="img/profile.png" style="height:32px; margin:0px 5px;" onmouseover="this.src=\'img/profile_hover.png\'" onmouseleave="this.src=\'img/profile.png\'"></a>';
             //會員登出
             echo '<li class="nav-item"><a href="php_sess_logout.php"><img src="img/logout.png" style="height:32px; margin:0px 5px;" onmouseover="this.src=\'img/logout_hover.png\'" onmouseleave="this.src=\'img/logout.png\'" onclick="<?php echo \'<meta http-equiv=REFRESH CONTENT=0;url=index.php>\';?>"></a></li>';
         }
         else{  //登出狀態
             echo '<li class="nav-item"><a href="member.php"><img src="img/login.png" style="height:32px;" onmouseover="this.src=\'img/login_hover.png\'" onmouseleave="this.src=\'img/login.png\'"></a></li>';
         }
     ?>
 </ul>
    </div>
  </nav>
<!-- ==========================================nav-bar==================================================-->
<!-- ==============================Carousel Example================================= -->
<div id="demo" class="carousel slide" data-ride="carousel">

  <!-- Indicators -->
  <ul class="carousel-indicators">
    <li data-target="#demo" data-slide-to="0" class="active"></li>
    <li data-target="#demo" data-slide-to="1"></li>
    <li data-target="#demo" data-slide-to="2"></li>
  </ul>

  <!-- The slideshow -->
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="img/bgpage.png" alt="Los Angeles" width="100%" height="100%">
    </div>
    <div class="carousel-item">
      <img src="img/bgpage.png" alt="Chicago" height="100%" height="100%">
    </div>
    <div class="carousel-item">
      <img src="img/bgpage.png" alt="New York" width="100%">
    </div>
  </div>

  <!-- Left and right controls -->
  <a class="carousel-control-prev" href="#demo" data-slide="prev">
    <span class="carousel-control-prev-icon"></span>
  </a>
  <a class="carousel-control-next" href="#demo" data-slide="next">
    <span class="carousel-control-next-icon"></span>
  </a>
</div>


<!-- ==============================//Carousel Example================================= -->

<!-- ======================landing-page==================================================-->
  <!-- <div class="text-center" style="background-color:#002E5F;">
    <br><br><br> -->
    <!-- <div class="row"> -->
      <!-- <div class="col-12 col-xl-12 p-2"> -->
        <!-- <div class="w-50 mx-auto"> -->
          <!--<img src="img/logo.png" class="img-fluid"></div> -->
          <!-- <div class="p-4"> -->
            <!-- <h1 style="color:white">VR Chemistry Lab</h1> -->
            <!-- <div class="subTitle-top font-weight-bold padding-word">
                          這是一個...
            </div> -->
            <!-- <h5 style="color:white">Learn Chemistry by VR</h5> -->
            <!-- <a href="#index-motivation" class="m-2 btn btn-green btn-round" style="color:white">More info</a> -->
          <!-- </div> -->
      <!-- </div> -->
      <!-- <div class="col-12 col-xl-12">
        <div style="width: 100%; margin: auto;">
          <img src="img/bgpage.png" alt="" class="img-fluid">
        </div>
      </div>
    </div>
  </div>
</div>
<!-- ======================//landing-page================================================== -->
<!-- ======================landing-page-try==================================================-->
<!-- <header id="home" class="hero-area">
   <div class="overlay">
     <span></span>
     <span></span>
   </div>
   <nav class="navbar navbar-expand-md bg-inverse fixed-top scrolling-navbar">
     <div class="container">
       <a href="index.html" class="navbar-brand"><img src="img/logo.png" alt=""></a>
       <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
         <i class="lni-menu"></i>
       </button>
       <div class="collapse navbar-collapse" id="navbarCollapse">
         <ul class="navbar-nav mr-auto w-100 justify-content-end">
           <li class="nav-item">
             <a class="nav-link page-scroll" href="#home">Home</a>
           </li>
           <li class="nav-item">
             <a class="nav-link page-scroll" href="#services">About</a>
           </li>
           <li class="nav-item">
             <a class="nav-link page-scroll" href="#features">Services</a>
           </li>
           <li class="nav-item">
             <a class="nav-link page-scroll" href="#showcase">Showcase</a>
           </li>
           <li class="nav-item">
             <a class="nav-link page-scroll" href="#pricing">Pricing</a>
           </li>
           <li class="nav-item">
             <a class="nav-link page-scroll" href="#team">Team</a>
           </li>
           <li class="nav-item">
             <a class="nav-link page-scroll" href="#blog">Blog</a>
           </li>
           <li class="nav-item">
             <a class="nav-link page-scroll" href="#contact">Contact</a>
           </li>
           <li class="nav-item">
             <a class="btn btn-singin" href="#">Download</a>
           </li>
         </ul>
       </div>
     </div>
   </nav>
   <div class="container">
     <div class="row space-100">
       <div class="col-lg-6 col-md-12 col-xs-12">
         <div class="contents">
           <h2 class="head-title">Handcrafted Web Template <br>For Business and Startups</h2>
           <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab <br>dolores ea fugiat nesciunt quisquam.</p>
           <div class="header-button">
             <a href="#" class="btn btn-border-filled">Get Started</a>
             <a href="#contact" class="btn btn-border page-scroll">Contact Us</a>
           </div>
         </div>
       </div>
       <div class="col-lg-6 col-md-12 col-xs-12 p-0">
         <div class="intro-img">
           <img src="img/breaker.svg" alt="">
         </div>
       </div>
     </div>
   </div>
 </header> -->
 <!-- Header Section End -->

<!-- ======================//landing-page-try==================================================-->

<div class="container" id="index-motivation">
  <br><br><br>

  <h2 class="index-title">發想動機</h2>
  <br><br>
  <div class="row">
    <div class="col-sm-4"">
      <div class="motivation_box">
        <div class="enlarge">
          <img src="img/motivation1.png" height="140px">
          <br><br>
          <h4>原本的化學實驗搬進虛擬實驗室？</h4>
          <br>
          <p>內容......................內容......................內容......................</p>
        </div>
      </div>
    </div>
    <div class="col-sm-4">
      <div class="motivation_box"">
        <div class="enlarge">
          <img src="img/motivation2.png" height="140px">
          <br><br>
          <h4>書本的知識怎麼以更有趣的方式呈現？</h4>
          <br>
          <p>內容......................內容......................內容......................</p>
        </div>
      </div>
    </div>
    <div class="col-sm-4">
      <div class="motivation_box">
        <div class="enlarge">
          <img src="img/motivation3.png" height="140px">
          <br><br>
          <h4>如何與看不到的分子模型進行互動？</h4>
          <br>
          <p>內容......................內容......................內容......................</p>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="container text-center" id="index-situation">
  <br><br><br><br><br><br>
  <h2 class="index-title">現況</h2>
  <br>
  <p>hi</p>
  <p>hi</p>
  <br><br><br><br><br><br><br><br><br><br><br>
</div>


<div class="container text-center" id="index-unity">
  <h2 class="index-title">開發環境</h2>
  <br>
  <div class="row">
    <div class="col-sm-6">
      <div class="enlarge">
        <img src="img/unity.png" height="200px">
        <h5>Unity</h5>
      </div>
    </div>
    <div class="col-sm-6">
      <div class="enlarge">
        <img src="img/vive.png" height="200px">
        <h5>HTC Vive</h5>
      </div>
    </div>
  </div>
  <br><br>
</div>

<!-- ===========================team==============================-->
<!-- <div class="container text-center" id="team"> -->
  <!-- 備用參考網址：http://www.htmleaf.com/jQuery/Accordion/201802234987.html -->
<div class="team-section container text-center">
  <div class="inner-width">
    <h2 class="index-title">團隊</h2>
    <br>
    <div class="pers">
      <div class="pe">
        <img src="img/team-member1.png" alt="">
        <div class="p-name">Name1</div>
        <div class="p-des">Designer</div>
        <div class="p-sm">
          <a href="#"><i class="fab fa-facebook-f"></i></a>
          <a href="#"><i class="fab fa-twitter"></i></a>
          <a href="#"><i class="fab fa-instagram"></i></a>
        </div>
      </div>

      <div class="pe">
        <img src="img/team-member2.png" alt="">
        <div class="p-name">Name2</div>
        <div class="p-des">Designer</div>
        <div class="p-sm">
          <a href="#"><i class="fab fa-facebook-f"></i></a>
          <a href="#"><i class="fab fa-twitter"></i></a>
          <a href="#"><i class="fab fa-instagram"></i></a>
        </div>
      </div>

      <div class="pe">
        <img src="img/team-member3.png" alt="">
        <div class="p-name">Name3</div>
        <div class="p-des">Developer</div>
        <div class="p-sm">
          <a href="#"><i class="fab fa-facebook-f"></i></a>
          <a href="#"><i class="fab fa-twitter"></i></a>
          <a href="#"><i class="fab fa-instagram"></i></a>
        </div>
      </div>

      <div class="pe">
        <img src="img/team-member4.png" alt="">
        <div class="p-name">Name4</div>
        <div class="p-des">Developer</div>
        <div class="p-sm">
          <a href="#"><i class="fab fa-facebook-f"></i></a>
          <a href="#"><i class="fab fa-twitter"></i></a>
          <a href="#"><i class="fab fa-instagram"></i></a>
        </div>
      </div>

      <div class="pe">
        <img src="img/team-member5.png" alt="">
        <div class="p-name">Name5</div>
        <div class="p-des">Developer</div>
        <div class="p-sm">
          <a href="#"><i class="fab fa-facebook-f"></i></a>
          <a href="#"><i class="fab fa-twitter"></i></a>
          <a href="#"><i class="fab fa-instagram"></i></a>
        </div>
      </div>

    </div>

  </div>
</div>
<!-- </div> -->

<!-- ===========================//team==============================-->
<!-- ===========================map==========================-->
    <!-- 地圖map參考：https://leafletjs.com/examples/quick-start/
                    https://leafletjs.com/reference-1.4.0.html#map-example
                    https://noob.tw/openstreetmap/ -->

<!-- <div class="container-fluid"> -->

<!-- ===========================//map==========================-->
<!-- ===========================footer==========================-->

    <!-- Footer Section Start -->
    <footer>
      <!-- Footer Area Start -->
      <section id="footer-Content">
        <div class="container">
          <!-- Start Row -->
          <div class="row">

          <!-- Start Col -->
            <div class="col-lg-5 col-md-6 col-sm-6 col-xs-6 col-mb-12">

              <div class="footer-logo">
               <img src="img/log" >
              </div>
            </div>
             <!-- End Col -->
              <!-- Start Col -->
            <div class="col-lg-3 col-md-6 col-sm-6 col-xs-6 col-mb-12">
              <div class="widget">
                <h3 class="block-title">Company</h3>
                <ul class="menu"  style="list-style-type:none">
                  <li><a href="#">- About Us</a></li>
                  <li><a href="#">- Career</a></li>
                  <li><a href="#">- Blog</a></li>
                  <li><a href="#">- Press</a></li>
                </ul>
              </div>
            </div>
             <!-- End Col -->
              <!-- Start Col -->
            <div class="col-lg-3 col-md-6 col-sm-6 col-xs-6 col-mb-12">
              <div class="widget">
                <h3 class="block-title">Download App</h3>
                <ul class="menu" style="list-style-type:none">
                  <li><a href="#">- Android App</a></li>
                  <li><a href="#">- IOS App</a></li>
                  <li><a href="#">- Windows App</a></li>
                  <li><a href="#">- Play Store</a></li>
                  <li><a href="#">- IOS Store</a></li>
                </ul>
              </div>
            </div>
              </div>
             <!-- End Col -->
             <div class="row">
               <div class="col-sm-1"></div>
               <div id='mapView' class="col-sm-10">
                  <div id="mapid" style="height: 250px; width: 100%; z-index: 10;">     <!-- 初始化設定地圖的寬和高 -->
                      <script type="text/javascript">

                          var map = L.map('mapid').setView([24.987567, 121.576072], 17);  //setView (初始化經緯度中心點，縮放大小)

                          L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                              attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
                          }).addTo(map);

                          var redIcon = new L.Icon({
                              iconUrl: 'https://cdn.rawgit.com/pointhi/leaflet-color-markers/master/img/marker-icon-2x-red.png',
                              shadowUrl: 'https://cdnjs.cloudflare.com/ajax/libs/leaflet/0.7.7/images/marker-shadow.png',
                              iconSize: [25, 41],
                              iconAnchor: [12, 41],
                              popupAnchor: [1, -34],
                              shadowSize: [41, 41]
                          });

                          L.marker([24.986771, 121.576697], {icon: redIcon})
                            .bindPopup('<strong>VR Chemistry Lab</strong><br>台北市文山區指南路二段64號<br>政治大學商學院5樓先進排程實驗室')
                            .openPopup()
                            .addTo(map);
                      </script>
                   </div>
                </div>
                <div class="col-sm-1"></div>
             </div>




          <!-- End Row -->
        </div>
        <!-- Copyright Start  -->

        <div class="copyright">
          <div class="container">
            <!-- Star Row -->
            <div class="row">
              <div class="col-md-12">
                <div class="site-info text-center">
                  <p>Crafted by <a href="" rel="nofollow">PHILA SOFA</a></p>
                </div>

              </div>
              <!-- End Col -->
            </div>
            <!-- End Row -->
          </div>
        </div>
      <!-- Copyright End -->
      </section>
      <!-- Footer area End -->
    </footer>
    <!-- Footer Section End -->
<!-- ===========================//footer==========================-->

<!-- ===========================contact us bar==========================-->
<!-- Live Chat Widget powered by https://keyreply.com/chat/ -->
<!-- Advanced options: -->
<!-- data-align="left" -->
<!-- data-overlay="true" -->
<script data-align="right" data-overlay="false" id="keyreply-script" src="//keyreply.com/chat/widget.js" data-color="#9C27B0" data-apps="JTdCJTIybGluZSUyMjolMjJAOTM0ZnJtcWwlMjIsJTIyZmFjZWJvb2slMjI6JTIyZGRkJTIyLCUyMmVtYWlsJTIyOiUyMm5jY3VtaXN2cmxhYkBnbWFpbC5jb20lMjIlN0Q="></script>
<!-- ===========================//contact us bar==========================-->
</body>
</html>
