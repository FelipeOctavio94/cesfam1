<?php
//vista del operativo donde podra buscar una receta o por el nav ir a crear una nueva receta
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recetas</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Coustard&display=swap" rel="stylesheet">
    <link href="../../css/style.css" rel="stylesheet">
</head>

<body style="background-image: url('../../img/fondo-admin.jpg'); font-family: 'Coustard', serif;">
    <?php if (isset($_SESSION['informatico'])) { ?>
        <nav class="deep-orange accent-4">
            <div class="nav-wrapper">
                <a href="#" class="brand-logo" style="margin-left: 20px;"><i class="material-icons" style="font-size: 40px;">assignment_ind</i> <?= $_SESSION['informatico']['nombre'] ?></a>
                <a href="#" data-target="slide-out" class="sidenav-trigger"><i class="material-icons">menu</i></a>
                <ul id="nav-mobile" class="right hide-on-med-and-down" style="margin-right: 20px;">

                    <li><a href="buscarUsuario.php">Buscar Usarios<i class="material-icons left">search</i></a></li>
                    <li><a href="ingresoUsuario.php">Crear Usuarios<i class="material-icons left">playlist_add</i></a></li>
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

            <li><a href="buscarUsuario.php">Buscar Usuarios</a></li>
            <li><a href="ingresoUsuario.php">Crear Usuarios</a></li>
            <li><a href="../salir.php"><i class="material-icons deep-orange-text" style="font-size: 40px;">exit_to_app</i></a></li>
        </ul>

        <div class="container" style="padding:20px; margin-top:20px; border-radius:10px; align-content:center; background: rgba(255, 255, 255, 0.8)">
            <h5>Buscar Usuarios</h5>
            <br>
            <div class="row" id="buscar">
                <form @submit.prevent="buscarxRut">
                    <div class="col l3 m3 s12">
                        <div class="input-field">
                            <i class="material-icons prefix">lock_outline</i>
                            <input id="r" type="text" v-model="rut">
                            <label for="r">Rut</label>
                        </div>
                    </div>

                    <div class="col l3 m3 s12">
                        <br>
                        <button class="btn-small deep-orange">Buscar</button>
                    </div>
                   
                </form>

                <div class="col l12 m12 s12">
                    <hr style="height:3px; border:none; background: #dd2c00; margin-bottom:20px;">

                    <table>
                        <tr>
                            <th>Rut</th>
                            <th>Nombre</th>
                            <th>Rol</th>
                            <th>Eliminar/Editar</th>
                        </tr>

                        <tr v-for="u in usuarios">
                            <td>{{u.rut}}</td>
                            <td>{{u.nombre}}</td>
                            <td>{{u.rol}}</td>
                            <td>
                                <!-- <button name="bt_delete" v-model="u.rut" class="btn-floating red">
                                    <i class="material-icons">delete</i>
                                </button> -->
                                <button @click="eliminar(u.rut)" class="btn-small red" name="rut">Eliminar</button> / <button @click="editar(u)" class="btn-small deep-orange">Editar</button>
                            </td>
                            <!-- <td>
                                <button @click="abrirModal(r)" class="btn-small deep-orange">Detalle</button>
                            </td> -->
                            <!-- para generar PDF
                                    <td>
                                    <div class="pdf">
                                        <img @click="generarPDF(r.id)" src="../img/pdf.png" height="45">
                                    </div>
                                </td>
                            </tr>  -->

                    </table>
                </div>

            </div>
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


    <script src="https://cdn.jsdelivr.net/npm/vue@2/dist/vue.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var elems = document.querySelectorAll('.sidenav');
            var instances = M.Sidenav.init(elems);
            var elems = document.querySelectorAll('.modal');
            var instances = M.Modal.init(elems);
        });
    </script>
    <script src="../../js/buscarUsuario.js"></script>
</body>

</html>