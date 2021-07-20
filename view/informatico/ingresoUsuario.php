<?php

//Aca es para los administrativos y pueden crear a un cliente
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Usuarios</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="../../css/style.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Coustard&display=swap" rel="stylesheet">
</head>

<body style="background-image: url('../../img/fondo-admin.jpg'); font-family: 'Coustard', serif;">
    <?php if (isset($_SESSION['informatico'])) { ?>
        <nav class="deep-orange accent-4">
            <div class="nav-wrapper">
                <a href="#" class="brand-logo" style="margin-left: 20px;"><i class="material-icons" style="font-size: 40px;">assignment_ind</i> <?= $_SESSION['informatico']['nombre'] ?></a>
                <a href="#" data-target="slide-out" class="sidenav-trigger"><i class="material-icons">menu</i></a>
                <ul id="nav-mobile" class="right hide-on-med-and-down" style="margin-right: 20px;">
                    <li><a href="buscarUsuario.php">Buscar Usuario<i class="material-icons left">search</i></a></li>
                    <li><a href="../salir.php"><i class="material-icons" style="font-size: 40px;">exit_to_app</i></a></li>
                </ul>
            </div>
        </nav>

        <ul id="slide-out" class="sidenav">
            <li>
                <div class="user-view">
                    <!-- <div class="background">
                        <img src="../img/paper.jpg">
                    </div> -->
                    <div style="display: flex;">
                        <a href="#user" class="white-text"><i class="material-icons white-text" style="font-size: 40px;">assignment_ind</i></a>
                        <a href="#user" class="white-text" style="margin-left: 10px;"><?= $_SESSION['informatico']['nombre'] ?></a>
                    </div>
                </div>
            </li>


            <li><a href="../salir.php"><i class="material-icons deep-orange-text" style="font-size: 40px;">exit_to_app</i></a></li>
        </ul>

        <div class="container" style="width:500px; padding:20px; margin-top:20px; border-radius:10px; align-content:center; background: rgba(255, 255, 255, 0.8)">
            <form action="../../controllers/NewUser.php" method="POST">
                <h4 class="center">Nuevo Usuario</h4>
                <br>
                <div class="input-field">
                    <i class="material-icons prefix">lock_outline</i>
                    <input id="r" type="text" name="rut">
                    <label for="r">Rut</label>
                </div>
                <div class="input-field">
                    <i class="material-icons prefix">account_circle</i>
                    <input id="n" type="text" name="nombre">
                    <label for="n">Nombre</label>
                </div>
                <div class="input-field">
                    <i class="material-icons prefix">supervisor_account</i>
                    <input id="a" type="text" name="apellido">
                    <label for="a">Apellido</label>
                </div>
                <div class="input-field">
                    <i class="material-icons prefix">work</i>
                    <input id="rol" type="text" name="rol">
                    <label for="rol">Rol</label>
                </div>
                <div class="input-field">
                    <i class="material-icons prefix">https</i>
                    <input id="clave" type="password" name="clave">
                    <label for="clave">Clave</label>
                </div>
                <div class="input-field">
                    <i class="material-icons prefix">phone</i>
                    <input id="t" type="text" name="telefono">
                    <label for="t">Telefono</label>
                </div>
                <button class="waves-effect waves-light btn ancho-100 deep-orange" style="font-family: 'Coustard', serif;">Añadir</button>
            </form>

            <p class="green-text center">
                <?php
                if (isset($_SESSION['u_resp'])) {
                    echo $_SESSION['u_resp'];
                    unset($_SESSION['u_resp']);
                }
                ?>
            </p>
            <p class="red-text center">
                <?php
                if (isset($_SESSION['u_error'])) {
                    echo $_SESSION['u_error'];
                    unset($_SESSION['u_error']);
                }
                ?>
            </p>
        </div>


    <?php } else { ?>
        <div class="card-panel" style="width:400px; margin:0 auto; margin-top:20px; border-radius:10px; background: rgba(255, 255, 255, 0.8)">
            <h4 class="center" style="color:#ef5350;">Error de acceso</h4>
            <p class="center">Debes iniciar sesión</p>
            <p class="center">
                <a href="../../index.php"><i class="material-icons deep-orange-text" style="font-size: 40px;">home</i></a>
            </p>
        </div>
    <?php } ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var elems = document.querySelectorAll('.sidenav');
            var instances = M.Sidenav.init(elems);
        });
    </script>

</body>

</html>