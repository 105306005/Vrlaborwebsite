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

</head>
<body style="font-family: 微軟正黑體; background-image: url(img/background_img.png)">

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
          <li class="nav-item">
              <a class="nav-link" href="register.php">註冊</a>
          </li>

        </ul>
       <!--  <form class="form-inline my-2 my-lg-0">
          <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search
          </button>
        </form> -->
      </div>
    </nav>
  <!-- ==========================================nav-bar==================================================-->





<div class="container">
	<br><br><br>
  <h3>Functions</h3>
  <p>Use</p>
  <p>Tip</p>
</div>

<!-- ===========================contact us bar==========================-->
<!-- Live Chat Widget powered by https://keyreply.com/chat/ -->
<!-- Advanced options: -->
<!-- data-align="left" -->
<!-- data-overlay="true" -->
<script data-align="right" data-overlay="false" id="keyreply-script" src="//keyreply.com/chat/widget.js" data-color="#9C27B0" data-apps="JTdCJTIybGluZSUyMjolMjIzMzMzMzMlMjIsJTIyZmFjZWJvb2slMjI6JTIyMzMzMzMzJTIyLCUyMmVtYWlsJTIyOiUyMm5jY3VtaXN2cmxhYkBnbWFpbC5jb20lMjIlN0Q="></script>
<!-- ===========================contact us bar==========================-->
</body>
</html>
