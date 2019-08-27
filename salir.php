<?php
/*$util = new Util();

$_SESSION["IDUSER"] = "";
session_destroy();

$util->clearAuthCookie();

header("Location: ./");*/

if (!isset($_SESSION['USUARIO LOGUEADO'])){
    echo'<script type="text/javascript">  alert("usted no está logueado"); window.location.href="index.php";   </script>';

}

$_SESSION = array();

if(isset($COOKIE[session_name()])){
    setcookie(session_name(), '', time()-42000,'/');
    session_destroy();
}
?>
