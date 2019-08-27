<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
include_once 'config.inc.php';
if (isset($_POST['subir'])) {
    $NOMBRE = $_FILES['archivo']['name'];
    $tipo = $_FILES['archivo']['type'];
    $tamanio = $_FILES['archivo']['size'];
  /*  $RUTA = $_FILES['archivo']['tmp_name'];*/
    $RUTA = base64_encode(file_get_contents($_FILES['archivo']['tmp_name']));
    $destino = "archivos/" . $NOMBRE;
    if ($NOMBRE != "") {
            $CORREO = base64_encode(strtoupper($_POST ['LOGIN']));
            $NOMBRECOMPLETO = base64_encode(strtoupper($_POST ['NOMBRECOMPLETO']));
            $MOTIVO = base64_encode($_POST ['MOTIVO']);
            $db=new Conect_MySql();
            $sql = "INSERT INTO tb_solicitud(nombreingresa,correoingresa,rutapdf,nombrearchivo,motivo) VALUES('$NOMBRECOMPLETO','$CORREO','$RUTA','$NOMBRE','$MOTIVO')";
            $query = $db->execute($sql);
            if($query){
                echo'<script type="text/javascript">  alert("Se guardo correctamente");</script>';
            }
    }
}

/*if ($_FILES['error']['archivo'] === UPLOAD_ERR_OK) {
    $this->archivo = [
        'base64' => base64_encode(file_get_contents($_FILES['tmp_name']['archivo'])),
        'type' => $_FILES['type']['archivo'],
        'name' => $_FILES['name']['archivo']
    ];
}*/

session_start();

if (!isset($_SESSION['USUARIO LOGUEADO'])){
    echo'<script type="text/javascript">  alert("usted no está logueado"); window.location.href="index.php";   </script>';

}
?>

<meta name="viewport" content="width=device-width, initial-scale=1">

<!-- CSS
================================================== -->
<link rel="stylesheet" href="css/base.css">
<link rel="stylesheet" href="css/vendor.css">
<link rel="stylesheet" href="css/main.css">
<link href="css/bootstrap.min.css" rel="stylesheet">

<!-- favicons
================================================== -->
<link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
<link rel="icon" href="favicon.ico" type="image/x-icon">



<html>
    <head>
        <meta charset="UTF-8">
        <title>Solicitud</title>
    </head>
    <body>
    <div class="container">
        <div class="row">
            <br><br>
            <div class="panel panel-default">
                <div class="panel-heading">Solicitud Empleo</div>
                <div class="panel-body">
                    <div class="col-md-6">

                        <div class="contact1-pic js-tilt" data-tilt>
                            <img src="img/logo.png" height="100" width="100">
                        </div>
            <form method="post" action="" enctype="multipart/form-data">

             				<span class="contact1-form-title">
                                <h3>Datos de la solicitud</h3>
				</span>


                    <div class="wrap-input1 validate-input">
                        <input class="input1" type="text" name="LOGIN" value=" <?php echo $_SESSION['LOGIN']; ?>" readonly>
                        <span class="shadow-input1"></span>
                    </div>

                    <div class="wrap-input1 validate-input">
                        <input class="input1" type="text" name="NOMBRECOMPLETO" value=" <?php echo $_SESSION['NOMBRE']; ?>" readonly>
                        <span class="shadow-input1"></span>
                    </div>

                    <div class="wrap-input1 validate-input" data-validate = "Las Placas son requeridas">
                        <input class="input1" type="text" name="MOTIVO" placeholder="Motivo Solicitud de Empleo">
                        <span class="shadow-input1"></span>
                    </div>

                    <br>
                    <span class="contact1-form-title">
                        <h3>Datos del Empleado</h3>
				</span>


                    <div class="container-contact1-form-btn">
						<span>
							Enviar Informacion
							<i class="fa fa-long-arrow-right" aria-hidden="true"></i>
						</span>
                    </div>
                    <br>
                    <input type="hidden" name="MAX_FILE_SIZE" value="9000000" />
                    <h5 class="bg-white">Seleccione el archivo que da vida a la solicitud, (formato PDF).</h5> <input name="archivo" type="file" class="form-control" />
                    <br>
                    <div class="row">
                        <div class="col-xs-12 col-sm-6 col-md-8"><input type="submit" value="subir" name="subir" class="btn bg-white"/></div>

                    </div>
                <div style="text-align: left;">
                        <td><a href="lista.php">Mostrar Lista</a></td>
                    <div style="text-align: right;">
                        <td><a href="salir.php">Salir</a></td>
                    </div>
                </div>
                    </tr>
            </form>            
        </div>
    </body>
</html>
