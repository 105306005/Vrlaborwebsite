﻿<?php
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
        <li class="nav-item">
          <a class="nav-link" href="board.php"> 公告中心 </a>
        </li>
        <!-- disable 訂死的選單 -->
        <!-- <li class="nav-item">
          <a class="nav-link disabled" href="#">Disabled</a>
        </li> -->
        <!-- .dropdown Navbar選項使用下拉式選單 -->

        <!-- <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="information.php" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> 相關資訊 </a>
          .dropdown-menu 下拉選單內容
          <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            <a class="dropdown-item" href="information.php#a-part">a</a>
            <a class="dropdown-item" href="information.php#b-part">b</a>
            <a class="dropdown-item" href="information.php#c-part">c</a>
          </div>
        </li> -->

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
      <img src="img/bgpage.png" alt="bgpage1" width="100%" height="100%">
    </div>
    <div class="carousel-item">
      <img src="img/bgpage.png" alt="bgpage2" width="100%" height="100%">
    </div>
    <div class="carousel-item">
      <img src="img/bgpage.png" alt="bgpage3" width="100%" height="100%">
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

<!-- ======================introduction====================== -->
<div class="container" id="index-introduction" style = "background-image: url(img/bglight.png); background-position: center center ;
 background-size: contain; background-repeat: no-repeat">
	<br><br><br><br><br><br>
	<div class="text-center big-title"> 革命，化學教育。 </div>
	<br>
	<h3 class="text-center index-title"> HTC Vive VR + 化學 + 教育 ＝ VR Chemistry Laboratory
	</h3>
	<br><br><br><br><br><br><br>

	<!-- <div class="container"> -->
</div>
<div id="index-introduction-2" style="background:url(img/intro-1.png); background-position: center center ;background-size: 100%; height: 100%;  background-repeat: no-repeat">
	<!-- <img src="img/intro-1.png" width="100%" height="100%" style= "text-align: center"> -->
	<br><br>
	<div style="color: #00cc99">
    	<h3>&nbsp;&nbsp;&nbsp;&nbsp;特點1，利用VR設備進行化學實模擬</h3>

    </div>
  </div>
</div>


	<!-- <br><br><br><br><br><br><br> -->
<div class="container">
</div>
<div style="color: #00cc99">
    <h3>&nbsp;&nbsp;&nbsp;&nbsp;特點2，VR技術成熟，提高學習體驗</h3>
  </div>
<br><br>
<div id="index-introduction-3" style="background:url(img/learning3.png); background-position: center center ;
background-size: 80%; height: 80%;  background-repeat: no-repeat">
	<!-- <img src="img/intronew.png" width="100%" height="100%" style= "text-align: center"> -->
<br><br>
  </div>
</div>



<div class="container">
</div>
<div style="color: #00cc99">
<br><br>
    <h3>&nbsp;&nbsp;&nbsp;&nbsp;特點3，與看不到的 化學分子進行互動</h3></div>
<div id="index-introduction-4" style="background:url(img/molecules.png); background-position: center center ;
background-size: 80%; height: 80%;  background-repeat: no-repeat";>

</div>
</div>


<!-- <div class="container"> -->
<!-- </div> -->
<!-- <div id="index-introduction-4" style="background:url(img/learning2.png); background-position: center center ; -->
<!-- background-size: 85%; height: 85%;  background-repeat: no-repeat"> -->
<!-- <img src="img/intronew.png" width="100%" height="100%" style= "text-align: center"> -->
<!-- <br><br> -->
<!-- <div style="color: #00cc99"> -->
    <!-- <h3>&nbsp;&nbsp;&nbsp;&nbsp;特點4，即時操作提醒，減少安全疑慮</h3> -->

  <!-- </div> -->
<!-- </div> -->
<!-- </div> -->










<!-- ======================introduction====================== -->

<!-- ======================motivation====================== -->
<!-- style="background-image: url(img/bgdark-01.png)" -->

<div class="container my-bg" id="index-motivation" style = "background-image: url(img/bglight.png); background-position: center center ;
 background-size: contain; background-repeat: no-repeat" >

  <br><br><br><br><br><br>

  <h2 class="index-title">發想動機</h2>
  <br><br>
  <div class="row" style="color:#cccccc;">
    <div class="col-sm-4">
      <div class="motivation_box">
        <div class="enlarge">
          <img src="img/motivation1.png" style="height: 35px">
          <br><br>
          <h4>原本的化學實驗搬進虛擬實驗室？</h4>
          <br>
          <p style="color:#cccccc;">一個具有完善設備的實驗室建置成本、維護成本高昂，做化學實驗的過程更是不可逆的，一旦任何步驟出現問題，便需要重新來過，若能夠 建置出虛擬實境化學實驗室，其方便、過程可逆、成本相對經濟、安全等 等因素非常適合教學使用。</p>
        </div>
      </div>
    </div>
    <div class="col-sm-4">
      <div class="motivation_box">
        <div class="enlarge">
          <img src="img/motivation2.png" style="height: 35px">
          <br><br>
          <h4>書本的知識怎麼以更有趣的方式呈現？</h4>
          <br>
          <p>在兩次對學生和教育從業者的調查結果顯示，大多數受訪者表示： 如果價格合理且易於使用，學生和教師願意優先使用虛擬實境技術來提身學習效率，且覺得這是更有趣的學習方式。</p>
        </div>
      </div>
    </div>
    <div class="col-sm-4">
      <div class="motivation_box">
        <div class="enlarge">
          <img src="img/motivation3.png" style="height: 35px">
          <br><br>
          <h4>如何與看不到的分子模型進行互動？</h4>
          <br>
          <p>由於化學實驗中無法以肉眼觀察元素分子的組成，而 VR Chemistry Laboratory 的“微觀分子實驗室”模式將可以補足實體實驗室的缺憾，由最一開始的原子結構，讓使用者以原子拆解的形式進行元素的組 合，而最終型態將可進行化學實驗，</p>
        </div>
      </div>
    </div>



  </div>
  <br><br><br><br><br><br>
</div>
<!-- ======================//motivation====================== -->
<!-- ======================situation====================== -->
<!-- <div class="container text-center" id="index-situation">
  <br><br><br><br><br><br>
  <h2 class="index-title">現況</h2>
  <div class="row">
  </div>
  <div class="row">

  </div>
  <div class="row">
  </div>







  <br>
  <p>hi</p>
  <p>hi</p>
  <br><br><br><br><br><br><br><br><br><br><br>
</div> -->


<div class="container text-center" id="index-unity">
<br><br><br>
  <h2 class="index-title">開發環境</h2>
  <br><br>
  <div class="row">
    <div class="col-sm-6 cirle_in_black" >
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




<!--================================//Image Showcases===============================  -->
<section class="showcase">
  <div class="container-fluid p-0">
    <div class="row no-gutters">

      <div class="col-lg-6 order-lg-2 text-white showcase-img" style="background-image: url('img/bg-showcase-1.jpg');"></div>
      <div class="col-lg-6 order-lg-1 my-auto showcase-text">
        <h2>Fully Responsive Design</h2>
        <p class="lead mb-0">When you use a theme created by Start Bootstrap, you know that the theme will look great on any device, whether it's a phone, tablet, or desktop the page will behave responsively!</p>
      </div>
    </div>
    <div class="row no-gutters">
      <div class="col-lg-6 text-white showcase-img" style="background-image: url('img/bg-showcase-2.jpg');"></div>
      <div class="col-lg-6 my-auto showcase-text">
        <h2>Updated For Bootstrap 4</h2>
        <p class="lead mb-0">Newly improved, and full of great utility classes, Bootstrap 4 is leading the way in mobile responsive web development! All of the themes on Start Bootstrap are now using Bootstrap 4!</p>
      </div>
    </div>
    <div class="row no-gutters">
      <div class="col-lg-6 order-lg-2 text-white showcase-img" style="background-image: url('img/bg-showcase-3.jpg');"></div>
      <div class="col-lg-6 order-lg-1 my-auto showcase-text">
        <h2>Easy to Use &amp; Customize</h2>
        <p class="lead mb-0">Landing Page is just HTML and CSS with a splash of SCSS for users who demand some deeper customization options. Out of the box, just add your content and images, and your new landing page will be ready to go!</p>
      </div>
    </div>
  </div>
</section>


<!-- ======================//situation====================== -->

<!-- ===========================team==============================-->
<!-- <div class="container text-center" id="team"> -->
  <!-- 備用參考網址：http://www.htmleaf.com/jQuery/Accordion/201802234987.html -->
<div class="team-section container text-center">
  <div class="inner-width">
  	<br><br><br>
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
               <img src="img/logo_1.png" >
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
