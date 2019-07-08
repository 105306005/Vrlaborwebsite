<?php
session_start();
include("pdoInc.php");
?>

<?php

$failStr = '';
// 如果登入過，則直接轉到登入後頁面
if(isset($_SESSION['account']) && $_SESSION['account'] != null){
    echo '<meta http-equiv=REFRESH CONTENT=0;url=index.php>';
}
// 如果有輸入登入會員的兩個欄位
else if(isset($_POST['login_account']) && isset($_POST['login_password'])){
    $acc = preg_replace("/[^A-Za-z0-9]/", "", $_POST['login_account']);
    $pwd = preg_replace("/[^A-Za-z0-9]/", "", $_POST['login_password']);
    if($acc != NULL && $pwd != NULL){
        $login = $dbh->prepare('SELECT * FROM member WHERE account = ?');
        $login->execute(array($acc));
        $row = $login->fetch(PDO::FETCH_ASSOC);
        // 比對密碼
        if($row['password'] == hash('sha256', $pwd)){
            $_SESSION['account'] = $row['account'];
            $_SESSION['school'] = $row['school'];
            $_SESSION['realname'] = $row['realname'];
            $_SESSION['email_addr'] = $row['email_addr'];
            $_SESSION['point'] = $row['point'];
            $_SESSION['member_id'] = $row['id'];

            echo '<meta http-equiv=REFRESH CONTENT=0;url=index.php>';
        }
        else{$failStr = '帳號或密碼輸入錯誤';}
    }
}
//加入會員 新增一筆資料到member資料表
else if(isset($_POST['name']) && isset($_POST['school']) && isset($_POST['account']) && isset($_POST['password']) && isset($_POST['email'])){
    //檢查帳號是否已經存在
    $check = $dbh->prepare('SELECT account FROM member WHERE account = ?');
    $check->execute(array($_POST['account']));
    if($check->rowCount() == 0){  //如果account在資料庫中撈不到紀錄
        $create = $dbh->prepare('INSERT INTO member (realname, school, account, password, email_addr) VALUES (?, ?, ?, ?, ?)');
        if($_POST['name'] != NULL && $_POST['school'] != NULL && $_POST['account'] != NULL && $_POST['password'] != NULL && $_POST['email'] != NULL){ //檢查是否有欄位空白
            $create->execute(array(
                    $_POST['name'],
                    $_POST['school'],
                    $_POST['account'],
                    hash('sha256',$_POST['password']),
                    $_POST['email'],
                ));
        }
        // 挑選出member資料 撈取id
        $member = $dbh->prepare('SELECT * from member WHERE account = ?');
        $member->execute(array($_POST['account']));
        $memberRow = $member->fetch(PDO::FETCH_ASSOC);

        // 首次加入會員 新增200點
        $newpointrecord = $dbh->prepare('INSERT INTO pointrecord (member_id, point_in, record) VALUES (?, ?, ?)');
        $record = "新加入會員禮";
        $newpointrecord->execute(array($memberRow['id'], 200, $record));

        // update 該會員的 total point
        $memberUpdatePoint = $dbh->prepare('UPDATE member SET point = 200 WHERE id = ?');
        $memberUpdatePoint->execute(array($memberRow["id"]));

        echo '<meta http-equiv=REFRESH CONTENT=0;url=register.php>';

    } else {
        $failStr = '帳號重複or輸入不正確，未成功註冊';
    }
}
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
    <!-- font-awsome -->
     <link href="http://cdn.bootcss.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet">

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
          <li class="nav-item">
              <a class="nav-link active" href="register.php">註冊</a>
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

<br><br><br><br>
<div class="container">
<div class="row">
  <div class="col-4"></div>
  <div class="card col-4" style="background-color: rgb(255,255,255,0.5);">
    <div class="tab" role="tabpanel">

      <br>
      <!-- Nav tabs -->
      <ul class="nav nav-tabs justify-content-center nav-justified" role="tablist">
        <li class="nav-item active">
          <a class="nav-link" data-toggle="tab" href="#login">登入會員</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" data-toggle="tab" href="#join">註冊會員</a>
        </li>
      </ul>

      <!-- Tab panes -->
      <div class="tab-content">
        <div id="login" class="container tab-pane active"><br>
          <h3>登入會員</h3>
          <form action="register.php" method="post">
            帳號：<input type="text" name="login_account" class="form-control"><br>
            密碼：<input type="text" name="login_password" class="form-control"><br><br>
            <input type="submit" class="btn btn-warning">
          </form>
        </div>

        <div id="join" class="container tab-pane fade"><br>
          <h3>註冊會員</h3>
          <form action="register.php" method="post">
            姓名：<input type="text" name="name" class="form-control"><br>
            學校：<input type="text" name="school" class="form-control"><br>
            信箱：<input type="text" name="email" class="form-control" placeholder="請輸入有效的郵箱" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$"><br>
            帳號：<input type="text" name="account" class="form-control" placeholder="限大小寫英文字母及數字" pattern="[A-Za-z0-9]+" max='20'><br>
            密碼：<input type="password" name="password" class="form-control" placeholder="限大小寫英文字母及數字" pattern="[A-Za-z0-9]+"><br><br>
            <input type="submit" class="btn btn-warning">
          </form>
      </div>
    <?php echo $failStr;?>
  </div>
  </div>
  </div>
  <div class="col-4"></div>




  </div>
</div>

<!-- =============================會員註冊和登錄畫面============================================-->
<!-- 參考網址1：http://www.htmleaf.com/jQuery/Tabs/201705054493.html -->
<!-- 參考網址2：http://www.htmleaf.com/jQuery/Tabs/201708014660.html -->

<!-- =============================會員註冊和登錄畫面============================================-->

<div class="container">
	<br><br><br>
  <h3>Register</h3>
  <p>hi</p>
  <p>hello.</p>
</div>



</body>
</html>
