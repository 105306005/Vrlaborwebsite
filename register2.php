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
            $_SESSION[''] = $row['school'];
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

<!DOCTYPE html>
<html lang="zh">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>VR LAB</title>
  <!-- 老bootstrap注意不能和新版混用，會跑掉 -->
  <link href="http://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
  <!-- font-awesome -->
  <link href="http://cdn.bootcss.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet">
  <!-- css -->
  <link rel="stylesheet" type="text/css" href="styles/register_css/htmleaf-demo.css">
  <link rel="stylesheet" type="text/css" href="styles/register_css/normalize.css">

</head>
<body style="font-family: 微軟正黑體; background-image: url(img/background_img.png)">
  <div class="htmleaf-container">
    <div class="demo">
            <div class="container">
                <div class="row">
                    <div class="col-md-offset-3 col-md-6" >
                      <!-- 加上一些透明的部分，方便看-->
                        <div class="tab" role="tabpanel">
                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs" role="tablist">
                                <!-- 加上一些透明的部分，方便看-->
                                <li role="presentation" class="active"><a href="#login" aria-controls="home" role="tab" data-toggle="tab" style="background-color: rgb(255,255,255,0.5);"><span id="icon-center"><i class="fa fa-globe"></i></span> 登入會員 </a></li>
                                <li role="presentation"><a href="#join" aria-controls="profile" role="tab" data-toggle="tab" style="background-color: rgb(255,255,255,0.5);"><span><i class="fa fa-rocket" id="icon-center"></i></span> 註冊會員 </a></li>
                            </ul>
                            <!-- Tab panes -->
                            <div class="tab-content tabs" style="background-color: rgb(255,255,255,0.5);">
                                <div role="tabpanel" class="tab-pane fade in active" id="login">
                                    <h3>登入會員</h3>
                                    <form action="register.php" method="post">
                                      帳號：<input type="text" name="login_account" class="form-control"><br>
                                      密碼：<input type="text" name="login_password" class="form-control"><br><br>
                                      <input type="submit" class="btn btn-warning">
                                    </form>
                                </div>
                                <div role="tabpanel" class="tab-pane fade" id="join">
                                    <h3>註冊會員</h3>
                                    <form action="register.php" method="post">
                                      姓名：<input type="text" name="name" class="form-control"><br>
                                      學校<input type="text" name="school" class="form-control"><br>
                                      信箱：<input type="text" name="email" class="form-control" placeholder="請輸入有效的郵箱" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$"><br>
                                      帳號：<input type="text" name="account" class="form-control" placeholder="限大小寫英文字母及數字" pattern="[A-Za-z0-9]+" max='20'><br>
                                      密碼：<input type="password" name="password" class="form-control" placeholder="限大小寫英文字母及數字" pattern="[A-Za-z0-9]+"><br><br>
                                      <input type="submit" class="btn btn-warning">
                                  </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
  </div>

  <script src="http://cdn.bootcss.com/jquery/1.11.0/jquery.min.js" type="text/javascript"></script>
  <script>window.jQuery || document.write('<script src="js/jquery-1.11.0.min.js"><\/script>')</script>
  <script src="http://cdn.bootcss.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

</body>
</html>
