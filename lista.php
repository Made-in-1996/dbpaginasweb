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

<meta name="viewport" content="width=device-width, initial-sca

<!-- CSS
================================================== -->
<link rel="stylesheet" href="css/base.css">
<link rel="stylesheet" href="css/vendor.css">
<link rel="stylesheet" href="css/main.css">
<link href="css/bootstrap.min.css" rel="stylesheet">

<!-- favicons
================================================== -->
<link rel="shortcut icon" href="favicon.ico" type="image/x-ico
<link rel="icon" href="favicon.ico" type="image/x-icon">

<html>
    <head>
        <meta charset="UTF-8">
        <title>Lista Solicitud</title>
    </head>
    <body>
    <div class="contact1">
        <div class="container">
            <div class="row">
                <br><br>
                <div class="panel panel-default">
                    <div class="panel-heading">Lista Solicitud</div>
                    <div class="panel-body">
                        <div class="col-md-push-6">
                            <table>
            <tr>
                <td>Nombre</td>
                <td>Email</td>
                <td>Ruta</td>
                <td>Archivo</td>
                <td>Motivo</td>
            </tr>
        <?php
        include 'config.inc.php';
        $db=new Conect_MySql();
            $sql = "select*from tb_solicitud";
            $query = $db->execute($sql);
            while($datos=$db->fetch_row($query)){?>
            <tr>
                <td><?php echo $datos['NOMBREINGRESA']; ?></td>
                <td><?php echo $datos['CORREOINGRESA']; ?></td>
                <td><?php echo $datos['RUTAPDF']; ?></td>
                <td><?php echo $datos['NOMBREARCHIVO']; ?></td>
               <td><?php echo $datos['MOTIVO']; ?></td>
                <td><a href="archivo.php?id=<?php echo $datos['ID_SOLICITUD']?>"><?php echo $datos['NOMBREARCHIVO']; ?></a></td>
            </tr>
                
          <?php  } ?>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </body>
</html>
