<!DOCTYPE html>

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
    <title>Login</title>
</head>
<body>
<div class="container">
    <div class="row">
        <br><br>
        <div class="panel panel-default">
            <div class="panel-heading">Login</div>
            <div class="panel-body">
                <div class="col-md-6">
                    <form role="form" method="post" action="compruebausuario.php">
                        <label class="mar" for="email">Direccion de correo:</label>
                        <input type="email" class="form-control" id="email" name="email" value="<?php if(isset($_COOKIE["CORREOE"])){echo $_COOKIE["CORREOE"];}?>">

                        <label for="pwd">Clave:</label>
                        <input type="password" class="form-control" id="pwd" name="pwd" value="<?php if(isset($_COOKIE["CLAVE"])){echo $_COOKIE["CLAVE"];}?>">
                        <label for="remember-me"><input type="checkbox" name="remember" id="remember" <?php if(isset($_COOKIE["CORREOE"])) { ?> checked <?php } ?> class="form-check-input">Recordarme</label>
                        <div class="row">
                            <div class="col-md-6">
                                <button class="pswp__button--share" type="submit">Ingresar</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>