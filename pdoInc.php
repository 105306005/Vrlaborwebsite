<?php
//000webhost架站用來連接MYSQL
// $db_server = "localhost";
// $db_user = "id10115563_nccumis";
// $db_passwd = "vrlab105306";
// $db_name = "id10115563_vrlab";

//本機用來連接MYSQL
$db_server = "localhost"; //本機
$db_user  = "root"; //最高權限的使用者
// $db_passwd = ""; //預設無密碼
$db_passwd = "0000"; //孫的密碼
$db_name  = "vrlab_database";    //Database的名字


try {
    $dsn = "mysql:host=$db_server;dbname=$db_name";
    $dbh = new PDO($dsn, $db_user, $db_passwd);
    //for mysqli
    $con=mysqli_connect($db_server, $db_user, $db_passwd,$db_name);
    mysqli_query($con,"SET CHARACTER SET UTF8");//印中文
}
catch (Exception $e){
    die('無法對資料庫連線');
}

$dbh->exec("SET NAMES utf8");
?>
