<?php
  declare(strict_types=1);

  session_start();
  function validarUsuario(){
      $CORREO=strtoupper($_POST['email']);
      $CLAVE=strtoupper($_POST['pwd']);
      $conexion=mysqli_connect("localhost","root","","dbpaginasweb") or die ('Hay un error de conexion'. mysqli_error($conexion));

      $query="SELECT * FROM TB_USUARIOS WHERE CORREOE='".$CORREO."' AND CLAVE=MD5('".$CLAVE."')" or die("Error in the consult..".mysqli_error($conexion));
        echo $query;
      $resultado=$conexion->query($query);
      $numerofilas=mysqli_num_rows($resultado);
      if($numerofilas==0){
          session_unset();
          echo '<script type="text/javascript"> alert("Usuario Incorrecto"); window.location.href="index.php"; </script>';
      }else{
          while($row=mysqli_fetch_array($resultado)){
              echo "<br>". $row['CORREOE']." es valido </br>";
              $_SESSION['USUARIO LOGUEADO']=true;
              $_SESSION['LOGIN']=$row['CORREOE'];
              $_SESSION['NOMBRE']=$row['NOMBRECOMPLETO'];

              echo '<script type="text/javascript">window.location.href="solicitud.php"; </script>';
          }
      }
      mysqli_close($conexion);
  }

  validarUsuario();
  ?>