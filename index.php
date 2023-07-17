<?php use lib\Session;

include_once "inc/header.php"; ?>
<?php
if (isset(($_GET['action']))) {
    if ($_GET['action'] == 'logout') {
        Session::destory();
        header("Location:login.php");
    }
}
?>

<a href="">Book now</a>

<?php include_once "inc/footer.php"; ?>