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
    <!-- <link rel="stylesheet" type="text/css" href="styles/chatroom.css"> -->
    <link rel="stylesheet" type="text/css" href="styles/index.css">
    <link rel="stylesheet" type="text/css" href="styles/bootstrap-expand.css">
    <!-- js -->
    <!--  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="js/chatroom.js"></script> -->
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
     <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
     <!-- leaflet map api -->
      <link rel="stylesheet" href="https://unpkg.com/leaflet@1.4.0/dist/leaflet.css"
        integrity="sha512-puBpdR0798OZvTTbP4A8Ix/l+A4dHDD0DGqYW6RQ+9jxkRFclaxxQb/SJAWZfWAkuyeQUytO7+7N4QKrDh+drA=="
        crossorigin=""/>
      <script src="https://unpkg.com/leaflet@1.4.0/dist/leaflet.js"
        integrity="sha512-QVftwZFqvtRNi0ZyCtsznlKSWOStnDORoefr1enyq5mVL4tmKB3S/EnC3rRJcxCPavG10IcrVGSmPh6Qw5lwrg=="
        crossorigin=""></script>

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
            <a class="nav-link active" href="index.php">首頁<span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="functions.php">功能簡介</a>
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
  <!-- ==========================================nav-bar==================================================-->


<div class="container text-center" id="index-motivation">
  <br><br><br>
  <h3>發想動機</h3>
  <br>
  <div class="row">
    <div class="col-sm-4">
      <img src="img/motivation1.png" height="170px">
      <br><br><br>
      <h6>原本的化學實驗<br>搬進虛擬實驗室？</h6>
    </div>
    <div class="col-sm-4">
      <img src="img/motivation2.png" height="170px">
      <br><br><br>
      <h6>書本的知識怎麼以<br>更有趣的方式呈現？</h6>
    </div>
    <div class="col-sm-4">
      <img src="img/motivation3.png" height="170px">
      <br><br><br>
      <h6>如何與看不到的<br>分子模型進行互動？</h6>
    </div>
</div>

<div class="container text-center" id="index-situation">
  <br><br><br>
  <h3>現況</h3>
  <p>hi</p>
  <p>hi</p>
  <br><br><br><br><br><br><br><br><br><br><br>
</div>


<div class="container text-center" id="index-unity">
  <h3>開發環境 - Unity3D</h3>
  <img src="img/ee.png" height="370px">
  <p>hi</p>
  <p>hi</p>
  <br><br><br><br><br><br><br><br><br><br><br><br>
</div>

<!-- ===========================team==============================-->
<div class="container text-center" id="team">
  <!-- 參考https://www.w3schools.com/howto/howto_js_tab_header.asp -->
  <!-- 備用參考網址：http://www.htmleaf.com/jQuery/Accordion/201802234987.html -->
  <h3>開發團隊</h3>
  <p>hi</p>
  <p>hi</p>
  <br><br><br><br><br><br><br><br><br><br><br><br>
<!-- =================================try================================= -->





<!-- =================================//try================================= -->

</div>

<!-- ===========================//team==============================-->
<!-- ===========================map==========================-->
    <!-- 地圖map參考：https://leafletjs.com/examples/quick-start/
                    https://leafletjs.com/reference-1.4.0.html#map-example
                    https://noob.tw/openstreetmap/ -->

<div class="container-fluid">
  <div id='mapView' class="row">
    <div class="col-sm-2"></div>
    <div id="mapid" class="col-sm-8" style="height: 250px; width: 100%; z-index: 10;">     <!-- 初始化設定地圖的寬和高 -->
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
      <div class="col-sm-2"></div>
</div>
<!-- ===========================//map==========================-->
<!-- ===========================contact us bar==========================-->
<!-- Live Chat Widget powered by https://keyreply.com/chat/ -->
<!-- Advanced options: -->
<!-- data-align="left" -->
<!-- data-overlay="true" -->
<script data-align="right" data-overlay="false" id="keyreply-script" src="//keyreply.com/chat/widget.js" data-color="#9C27B0" data-apps="JTdCJTIybGluZSUyMjolMjIzMzMzMzMlMjIsJTIyZmFjZWJvb2slMjI6JTIyMzMzMzMzJTIyLCUyMmVtYWlsJTIyOiUyMm5jY3VtaXN2cmxhYkBnbWFpbC5jb20lMjIlN0Q="></script>
<!-- ===========================//contact us bar==========================-->
</body>
</html>
