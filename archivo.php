<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
session_start();

if (!isset($_SESSION['USUARIO LOGUEADO'])){
    echo'<script type="text/javascript">  alert("usted no está logueado"); window.location.href="index.php";   </script>';
}
?>

<!-- favicons
================================================== -->
<link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
<link rel="icon" href="favicon.ico" type="image/x-icon">

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        include 'config.inc.php';
        $db=new Conect_MySql();
            $sql = "select*from tb_solicitud where ID_SOLICITUD=".$_GET['id'];
            $query = $db->execute($sql);
            if($datos=$db->fetch_row($query)){
                if($datos['NOMBREARCHIVO']==""){?>
        <p>No tiene archivos</p>
                <?php }else{ ?>
        <iframe height="1200" width="1000" src="archivos/<?php echo $datos['NOMBREARCHIVO']; ?>"></iframe>
                
                <?php } } ?>
    </body>
</html>
