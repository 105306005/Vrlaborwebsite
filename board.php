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
<body style=" font-family: 微軟正黑體 ; background-color: #556587; color:white; ">

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
          <a class="nav-link" href="functions.php"> 功能簡介 </a>
        </li>
        <!-- disable 訂死的選單 -->
        <!-- <li class="nav-item">
          <a class="nav-link disabled" href="#">Disabled</a>
        </li> -->
        <!-- .dropdown Navbar選項使用下拉式選單 -->
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="board.php"> 公告中心 <span class="sr-only">(current)</span></a>
        </li>

<!--         <li class="nav-item dropdown">
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
<!-- =============================\\nav-bar======================================-->

<!-- ======================motivation====================== -->

<body style="font-family: 微軟正黑體; background-image: url(pic/restaurant_background.png)">

<br><br><br><br>

<div class="container">
<h2>公告中心</h2>
<br>
<!-- Nav pills -->
<ul class="nav nav-pills nav-justified">
  <li class="nav-item" >
    <a class="nav-link active" data-toggle="pill" href="#modifyInfo"><b>最新消息</b></a>
  </li>
  <li class="nav-item" >
    <a class="nav-link" data-toggle="pill" href="#commentRecord"><b>系統更新</b></a>
  </li>

  <li class="nav-item">
    <a class="nav-link" data-toggle="pill" href="#myCoupon"><b>活動訊息</b></a>
  </li>
</ul>


<!-- Tab panes -->
<div class="tab-content">

    <!-- 修改會員資料頁面========================================================= -->
    <div class="tab-pane container active" id="modifyInfo">
        <br>
        <h4>最新消息</h4>
                <table class="table table-hover">
            <thead>
                <tr>
                    <th class="count">標題</th>
                    <th class="record">內容</th>
                    <th class="date">時間</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="count">維修公告</td>
                    <td class="record">系統會在2019/11/15暫停，進行為維修工作，請勿上線！</td>
                    <td class="date">2020/02/02</td>
                </tr>

            </tbody>
            <tbody>
                <tr>
                    <td class="count">！！！！！！！！！</td>
                    <td class="record">！！！！！</td>
                    <td class="date">2020/02/02</td>
                </tr>

            </tbody>
            <tbody>
                <tr>
                    <td class="count">？？？？？？？？</td>
                    <td class="record">？？？</td>
                    <td class="date">2020/02/02</td>
                </tr>

            </tbody>
        </table>

    
    </div>


    <!-- 評論紀錄頁面========================================================= -->
    <div class="tab-pane container fade" id="commentRecord"><br>
        <h4>系統更新</h4>
<!--         <div class="container" style="background-color: rgb(255,255,255,0.4); width: 100%;">
            <br>
            <div class="row" style="padding: 5px 120px;text-align: center;">
                <div class="col-sm-4"></div>
                <div class="col-sm-2" style="font-size: 18px; text-align: right; margin-top: 6px;"><b>總共評論篇數</b></div>
                <div class="col-sm-2" style="font-size: 24px; color: #FFBE04;"><b>10</b></div>
                <div class="col-sm-4"></div>
            </div><br>
        </div><br> -->

        <table class="table table-hover">
            <thead>
                <tr>
                    <th class="count">標題</th>
                    <th class="record">內容</th>
                    <th class="date">時間</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="count">維修公告</td>
                    <td class="record">系統會在2019/11/15暫停，進行為維修工作，請勿上線！</td>
                    <td class="date">2020/02/02</td>
                </tr>

            </tbody>
            <tbody>
                <tr>
                    <td class="count">！！！！！！！！！</td>
                    <td class="record">！！！！！</td>
                    <td class="date">2020/02/02</td>
                </tr>

            </tbody>
            <tbody>
                <tr>
                    <td class="count">？？？？？？？？</td>
                    <td class="record">？？？</td>
                    <td class="date">2020/02/02</td>
                </tr>

            </tbody>
        </table>
    </div>
        <!-- 我的coupon頁面========================================================= -->
    <div class="tab-pane container fade" id="myCoupon">
        <br>
        <h4>活動訊息</h4>
        <div class="container mt-3">
            <input class="form-control" id="myCouponInput" type="text" placeholder="搜尋" style="background-color: rgb(255,255,255,0.4);background-image: url(pic/search.png);background-position: 8px 7px; background-repeat: no-repeat; padding: 6px 12px 6px 40px;">   <!-- filter -->
            <div id="myCouponDIV" class="mt-3">  <!-- 把要搜尋的東西放在這塊div -->
                <table class="table table-hover" id='myTable'>
                <thead>
                    <tr>
                        <th onclick="sortTable(0)">餐廳名稱</th>
                        <th onclick="sortTable(1)">折扣</th>
                        <th onclick="sortTable(2)">詳細說明</th>
                        <th onclick="sortTable(3)">到期日</th>
                        <th onclick="sortTable(4)">使用狀態</th>
                    </tr>
                </thead>
                <tbody id="myCouponTable">
                </tbody>
                 <tbody>
                <tr>
                    <td class="count">維修公告</td>
                    <td class="record">系統會在2019/11/15暫停，進行為維修工作，請勿上線！</td>
                    <td class="date">2020/02/02</td>
                </tr>

            </tbody>
            <tbody>
                <tr>
                    <td class="count">！！！！！！！！！</td>
                    <td class="record">！！！！！</td>
                    <td class="date">2020/02/02</td>
                </tr>

            </tbody>
            <tbody>
                <tr>
                    <td class="count">？？？？？？？？</td>
                    <td class="record">？？？</td>
                    <td class="date">2020/02/02</td>
                </tr>

            </tbody>
                </table>
            </div>
        </div>
    </div>


</div>



</body>



<!-- ======================//motivation====================== -->


<!-- ===========================contact us bar==========================-->
<!-- Live Chat Widget powered by https://keyreply.com/chat/ -->
<!-- Advanced options: -->
<!-- data-align="left" -->
<!-- data-overlay="true" -->
<script data-align="right" data-overlay="false" id="keyreply-script" src="//keyreply.com/chat/widget.js" data-color="#9C27B0" data-apps="JTdCJTIybGluZSUyMjolMjJAOTM0ZnJtcWwlMjIsJTIyZmFjZWJvb2slMjI6JTIyZGRkJTIyLCUyMmVtYWlsJTIyOiUyMm5jY3VtaXN2cmxhYkBnbWFpbC5jb20lMjIlN0Q="></script>
<!-- ===========================//contact us bar==========================-->
</body>
</html>
