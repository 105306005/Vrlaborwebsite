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
<body style="font-family: 微軟正黑體; background-image: url(img/background.png)">

<!-- ==========================================nav-bar==================================================-->
  <!--參考網址：https://ithelp.ithome.com.tw/articles/10192870-->
  <!-- .navbar-expand-{sm|md|lg|xl}決定在哪個斷點以上就出現漢堡式選單 -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
      <!-- .navbar-brand 左上LOGO位置 -->
      <a class="navbar-brand" href="index.php">
        <img src="img/beaker.svg" width="30" height="30" class="d-inline-block align-top" alt="">
        <span class="h3 mx-1">VR Chemistry Lab</span>
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
            <a class="nav-link" href="index.php">首頁<span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="functions.php">功能簡介</a>
          </li>
          <!-- disable 訂死的選單 -->
          <!-- <li class="nav-item">
            <a class="nav-link disabled" href="#">Disabled</a>
          </li> -->
          <!-- .dropdown Navbar選項使用下拉式選單 -->
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="information.php" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">相關資訊</a>
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
               // echo '<a href="member_info.php"><img src="img/profile.png" style="height:32px; margin:0px 5px;" onmouseover="this.src=\'img/profile_hover.png\'" onmouseleave="this.src=\'img/profile.png\'"></a>';
               //會員登出
               echo '<li class="nav-item"><a href="php_sess_logout.php"><img src="img/logout.png" style="height:32px; margin:0px 5px;" onmouseover="this.src=\'img/logout_hover.png\'" onmouseleave="this.src=\'img/logout.png\'" onclick="<?php echo \'<meta http-equiv=REFRESH CONTENT=0;url=index.php>\';?>"></a></li>';
           }
           else{  //登出狀態
               echo '<li class="nav-item"><a href="register.php"><img src="img/login.png" style="height:32px;" onmouseover="this.src=\'img/login_hover.png\'" onmouseleave="this.src=\'img/login.png\'"></a></li>';
           }
       ?>
   </ul>

      </div>
    </nav>
<!-- =========================//nav-bar======================================-->

<div class="container text-center">
  <br><br><br>
  <h3>VR Chemical Laboratory二大功能</h3>
  <br>
  <div id='mapView' class="row">
    <div class="col-sm-6">
      <a href="#lab-mode"><img src="img/lab-mode.png" style="height:200px; margin:0px 5px;" onmouseover="this.src='img/lab-mode_hover.png'" onmouseleave="this.src='img/lab-mode.png'"></a>
      <h5>化學實驗室模式</h5>
    </div>
    <div class="col-sm-6">
      <a href="#molecule-mode"><img src="img/molecule-mode.png" style="height:200px; margin:0px 5px;" onmouseover="this.src='img/molecule-mode_hover.png'" onmouseleave="this.src='img/molecule-mode.png'"></a>
      <h5>微觀分子模式</h5>
    </div>
  </div>
  <div>
    <p>為什麼會分為兩個模式呢？</p>
    <p>因為</p>
    <p>...</p>
    <p>...</p>
    <p>...</p>
    <p>...</p>
    <p>...</p>
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
<div class="container text-center" id="key-tech">
  <h3>關鍵技術</h3>
  <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>  <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
</div>

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
      <img src="img/future1.png" alt="Los Angeles" width="1100" height="500">
    </div>
    <div class="carousel-item">
      <img src="img/future2.png" alt="Chicago" width="1100" height="500">
    </div>
    <div class="carousel-item">
      <img src="img/future3.png" alt="New York" width="1100" height="500">
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
<script data-align="right" data-overlay="false" id="keyreply-script" src="//keyreply.com/chat/widget.js" data-color="#9C27B0" data-apps="JTdCJTIybGluZSUyMjolMjIzMzMzMzMlMjIsJTIyZmFjZWJvb2slMjI6JTIyMzMzMzMzJTIyLCUyMmVtYWlsJTIyOiUyMm5jY3VtaXN2cmxhYkBnbWFpbC5jb20lMjIlN0Q="></script>
<!-- ===========================//contact us bar==========================-->
</body>
</html>
