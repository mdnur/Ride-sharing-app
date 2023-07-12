<?php
include_once "lib/Session.php" ;
use lib\Session;

Session::checkSession();
spl_autoload_register(function($class){
    include "Classes/".$class.".php";
});
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<!--<form action="" method="get">-->
<!--    <input type="submit" value="Logout" name="logout">-->
<!--</form>-->

<?php
if(isset(($_GET['action']))){
    if($_GET['action'] == 'logout')
    Session::destory();
    header("Location:login.php");
}
?>
<a href="?action=logout">LOGOUT</a>
</body>
</html>