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
   <!--     <link rel="stylesheet" type="text/css" href="styles/chatroom.css">
    <link rel="stylesheet" type="text/css" href="styles/index.css"> -->
    <link rel="stylesheet" type="text/css" href="styles/key-tech.css">
    <!-- Font awesome-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
<!-- <script src="https://kit.fontawesome.com/f1ad151ad9.js"></script> -->
<!-- <script src="https://use.fontawesome.com/releases/v5.0.0/js/solid.js"></script> -->
    <!-- js -->
   <!--  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="js/chatroom.js"></script> -->
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
     <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>


<!--======================== function style============================= -->

     <style>
     body {font-family: "Lato", sans-serif;}

     .tablink {
       background-color: #555;
       color: white;
       float: left;
       border: none;
       outline: none;
       cursor: pointer;
       padding: 14px 16px;
       font-size: 17px;
       width: 20%;  /* 分五個功能 */
     }

     .tablink:hover {
       background-color: #777;
     }

     /* Style the tab content */
     .tabcontent {
       color: white;
       display: none;
       padding: 100px;
       text-align: center;
     }

     #London {background-color:red;}
     #Paris {background-color:green;}
     #Tokyo {background-color:blue;}
     #Oslo {background-color:orange;}
     #Taiwan {background-color: pink;}
     </style>


     <style>
        .carousel-indicators {
            bottom: -52px;  }
        .carousel-indicators li {
            background-color: #000f23; }
        .card-body {
            margin: 0.5rem; }
        /* Make the image fully responsive */
        .carousel-inner img {
            width: 100%;
            /* height: 100%; */ }
    </style>

<!--======================== //function style============================= -->


</head>
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
          <a class="nav-link" href="index.php"> 首頁 </a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="functions.php"> 功能簡介 <span class="sr-only">(current) </span></a>
        </li>
         <li class="nav-item">
          <a class="nav-link" href="board.php"> 公告中心 </a>
        </li>
        <!-- disable 訂死的選單 -->
        <!-- <li class="nav-item">
          <a class="nav-link disabled" href="#">Disabled</a>
        </li> -->
        <!-- .dropdown Navbar選項使用下拉式選單 -->

    <!--     <li class="nav-item dropdown">
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

<div class="text-center" id="function-logo">
  <img src="img/function-1.png" alt="function-1" width="100%" height="100%">
</div>
<div id="functions" style="background:url(img/twofunctionblack.png); background-position: center center ;
background-size: 105%; height: 105%;  background-repeat: no-repeat">
  </div>











<div class="container text-center">
  <br><br><br>
  <h2>VR Chemical Laboratory二大功能</h2>
  <br>
  <div id='mapView' class="row">
    <div class="col-sm-6">
      <a href="#lab-mode"><img src="img/lab-mode.png" style="height:200px; margin:0px 5px;" onmouseover="this.src='img/lab-mode_hover.png'" onmouseleave="this.src='img/lab-mode.png'"></a>
      <h4>化學實驗室模式</h4>
    </div>
    <div class="col-sm-6">
      <a href="#molecule-mode"><img src="img/molecule-mode.png" style="height:200px; margin:0px 5px;" onmouseover="this.src='img/molecule-mode_hover.png'" onmouseleave="this.src='img/molecule-mode.png'"></a>
      <h4>微觀分子模式</h4>
    </div>
  </div>
  <div>
    <br>
    <h6>為什麼會分為兩個模式呢？</h6>
    <h6>因為</h6>
    <h6>...</h6>
    <h6>...</h6>
    <h6>...</h6>
    <h6>...</h6>
    <h6>...</h6>
    <h6>...</h6>
    <h6>...</h6>
  </div>
</div>

<!-- ==========================try=========================-->
<!-- <div class="container">
  <div id="London" class="tabcontent">
    <h1>London</h1>
    <p>London is the capital city of England.</p>
    <p>London is the capital city of England.</p>
    <p>London is the capital city of England.</p>
    <p>London is the capital city of England.</p>
    <p>London is the capital city of England.</p>
  </div>

  <div id="Paris" class="tabcontent">
    <h1>Paris</h1>
    <p>Paris is the capital of France.</p>
    <p>Paris is the capital of France.</p>
    <p>Paris is the capital of France.</p>

  </div>

  <div id="Tokyo" class="tabcontent">
    <h1>Tokyo</h1>
    <p>Tokyo is the capital of Japan.</p>
  </div>

  <div id="Oslo" class="tabcontent">
    <h1>Oslo</h1>
    <p>Oslo is the capital of Norway.</p>
  </div>

  <div id="Taiwan" class="tabcontent">
    <h1>Taiwan</h1>
    <p>Taiwan</p>
  </div>

  <button class="tablink" onclick="openCity('London', this, 'red')" id="defaultOpen">London</button>
  <button class="tablink" onclick="openCity('Paris', this, 'green')">Paris</button>
  <button class="tablink" onclick="openCity('Tokyo', this, 'blue')">Tokyo</button>
  <button class="tablink" onclick="openCity('Oslo', this, 'orange')">Oslo</button>
  <button class="tablink" onclick="openCity('Taiwan', this, 'pink')">Taiwan</button>

  <br><br><br><br><br><br>
  <script>
  function openCity(cityName,elmnt,color) {
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
      tabcontent[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("tablink");
    for (i = 0; i < tablinks.length; i++) {
      tablinks[i].style.backgroundColor = "";
    }
    document.getElementById(cityName).style.display = "block";
    elmnt.style.backgroundColor = color;

  }
  // Get the element with id="defaultOpen" and click on it
  document.getElementById("defaultOpen").click();
  </script>

</div> -->
<!-- ==========================//try=========================-->

<!-- =================================lab-mode================================= -->
<div class="container text-center" id="lab-mode">
  <h3>化學實驗室模式</h3>
  <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>  <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
</div>
<!-- ==============================molecule-mode================================= -->
<div class="container text-center" id="molecule-mode">
  <h3>微觀分子模式</h3>
  <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>  <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
</div>

<!-- ==============================molecule-mode================================= -->
<!-- <div class="container text-center" id="key-tech"> -->
  <!-- Services section -->
  <section id="advantage" class="padding-top padding-bottom text-center">
    <div class="container">
      <h3>關鍵技術</h3>
      <div class="row services justify-content-around">
        <div class="col-lg-2 col-md-2 col-sm-4">
          <div class="service" data-animated="300">
            <div class="popup">
              建模建模建模建模建模建模建模建模建模建模建模建模
            </div>
            <div class="circle"><i class="fa fa-home"></i></div>
            <h5>建模</h5>
          </div>
        </div>
        <div class="col-lg-2 col-md-2 col-sm-4">
          <div class="service" data-animated="900">
            <div class="popup">
              虛擬環境瞬間移動虛擬環境瞬間移動虛擬環境瞬間移動</div>
            <div class="circle"><i class="fa fa-walking"></i></div>
            <!-- <i class="fas fa-running"></i> -->
            <h5>虛擬環境瞬間移動</h5>
          </div>
        </div>
        <div class="col-lg-2 col-md-2 col-sm-4">
          <div class="service" data-animated="1200">
            <div class="popup">
              輕觸產生原子輕觸產生原子輕觸產生原子輕觸產生原子</div>
            <div class="circle"><i class="fa fa-hand-paper"></i></div>
            <h5>輕觸產生原子</h5>
          </div>
        </div>
        <div class="col-lg-2 col-md-2 col-sm-4">
          <div class="service" data-animated="2100">
            <div class="popup">
             雷射指標雷射指標雷射指標雷射指標</div>
            <div class="circle"><i class="fa fa-share-alt"></i></div>
            <h5>雷射指標</h5>
          </div>
        </div>
        <div class="col-lg-2 col-md-2 col-sm-4">
          <div class="service" data-animated="2400">
            <div class="popup">
              元素合成化合物元素合成化合物元素合成化合物</div>
            <div class="circle"><i class="fa fa-dna"></i></div>
            <h5>元素合成化合物</h5>
          </div>
        </div>
        <div class="col-lg-2 col-md-2 col-sm-4">
          <div class="service" data-animated="3000">
            <div class="popup">
              化學反應特效化學反應特效化學反應特效</div>
            <div class="circle"><i class="fa fa-fire"></i></div>
            <!-- <i class="fab fa-hotjar"></i> -->
            <h5>化學反應特效</h5>
          </div>
        </div>
      </div>
    </div>
  </section>
  <br><br><br><br>
<!-- </div> -->

<!-- ==============================future================================= -->
<div class="container text-center" id="future">
  <h3>未來展望</h3>

</div>

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
      <img src="img/future1.png" alt="Los Angeles" width="50%" height="100%">
    </div>
    <div class="carousel-item">
      <img src="img/future1.png" alt="Chicago" height="70%">
    </div>
    <div class="carousel-item">
      <img src="img/future1.png" alt="New York" width="50%">
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

<!-- ===========================contact us bar==========================-->
<!-- Live Chat Widget powered by https://keyreply.com/chat/ -->
<!-- Advanced options: -->
<!-- data-align="left" -->
<!-- data-overlay="true" -->
<script data-align="right" data-overlay="false" id="keyreply-script" src="//keyreply.com/chat/widget.js" data-color="#9C27B0" data-apps="JTdCJTIybGluZSUyMjolMjJAOTM0ZnJtcWwlMjIsJTIyZmFjZWJvb2slMjI6JTIyZGRkJTIyLCUyMmVtYWlsJTIyOiUyMm5jY3VtaXN2cmxhYkBnbWFpbC5jb20lMjIlN0Q="></script>
<!-- ===========================//contact us bar==========================-->
</body>
</html>
