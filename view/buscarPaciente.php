<?php

//Aca es para los administrativos y pueden crear a un cliente
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clientes</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="../css/style.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Coustard&display=swap" rel="stylesheet">
</head>

<body style="background-image: url('../img/fondo-admin.jpg'); font-family: 'Coustard', serif;">
    <?php if (isset($_SESSION['user'])) { ?>
        <?php if ($_SESSION['user']['rol'] == "administrativo") { ?>
            <nav class="deep-orange accent-4">
                <div class="nav-wrapper">
                    <a href="#" class="brand-logo" style="margin-left: 20px;"><i class="material-icons" style="font-size: 40px;">assignment_ind</i> <?= $_SESSION['user']['nombre'] ?></a>

                    <a href="#" data-target="slide-out" class="sidenav-trigger"><i class="material-icons">menu</i></a>
                    <ul id="nav-mobile" class="right hide-on-med-and-down" style="margin-right: 20px;">

                        <li><a href="adminis.php">Nuevo Paciente<i class="material-icons left">playlist_add</i></a></li>
                        <li><a href="buscarPaciente.php">Buscar Paciente<i class="material-icons left">search</i></a></li>
                        <li><a href="salir.php"><i class="material-icons" style="font-size: 40px;">exit_to_app</i></a></li>
                    </ul>
                </div>
            </nav>

            <ul id="slide-out" class="sidenav">
                <li>
                    <div class="user-view">
                        <div style="display: flex;">
                            <a href="#user" class="white-text"><i class="material-icons white-text" style="font-size: 40px;">assignment_ind</i></a>
                            <a href="#user" class="white-text" style="margin-left: 10px;"><?= $_SESSION['user']['nombre'] ?></a>
                        </div>
                    </div>
                </li>


                <li><a href="salir.php"><i class="material-icons deep-orange-text" style="font-size: 40px;">exit_to_app</i></a></li>
            </ul>

            <div class="container" style="padding:20px; margin-top:20px; border-radius:10px; align-content:center; background: rgba(255, 255, 255, 0.8)">
                <div class="row" id="paciente">
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
                                <th>Dirección</th>
                                <th>fecha Creacion</th>
                                <th>Correo</th>
                                <th>Eliminar</th>
                            </tr>

                            <tr v-for="p in pacientes">
                                <td>{{p.rut_paciente}}</td>
                                <td>{{p.nombre_paciente}}</td>
                                <td>{{p.direccion_paciente}}</td>
                                <td>{{p.fecha_creacion}}</td>
                                <td>{{p.email_paciente}}</td>
                                <td>
                                    <!-- <button name="bt_delete" v-model="u.rut" class="btn-floating red">
                                    <i class="material-icons">delete</i>
                                </button> -->
                                    <button @click="eliminar(p.rut_paciente)" class="btn-small red" name="rut">Eliminar</button>
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
                <p class="center">Debes ser del area administrativa para ingresar a esta página</p>
                <div style="display: flex; justify-content: space-between;">
                    <p>
                        <a href="../view/admin.php"><i class="material-icons deep-orange-text" style="font-size: 40px;">arrow_back</i></a>
                    </p>
                    <p class="right">
                        <a href="salir.php"><i class="material-icons deep-orange-text" style="font-size: 40px;">exit_to_app</i></a>
                    </p>
                </div>
            </div>
        <?php } ?>

    <?php } else { ?>
        <div class="card-panel" style="width:400px; margin:0 auto; margin-top:20px; border-radius:10px; background: rgba(255, 255, 255, 0.8)">
            <h4 class="center" style="color:#ef5350;">Error de acceso</h4>
            <p class="center">Debes iniciar sesión</p>
            <p class="center">
                <a href="../index.php"><i class="material-icons deep-orange-text" style="font-size: 40px;">home</i></a>
            </p>
        </div>
    <?php } ?>

    <script src="https://cdn.jsdelivr.net/npm/vue@2/dist/vue.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var elems = document.querySelectorAll('.datepicker');
            var instances = M.Datepicker.init(elems, {
                'format': 'yyyy/mm/dd',
                'i18n': {
                    months: ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"],
                    monthsShort: ["Ene", "Feb", "Mar", "Abr", "May", "Jun", "Jul", "Ago", "Set", "Oct", "Nov", "Dic"],
                    weekdays: ["Domingo", "Lunes", "Martes", "Miércoles", "Jueves", "Viernes", "Sábado"],
                    weekdaysShort: ["Dom", "Lun", "Mar", "Mie", "Jue", "Vie", "Sab"],
                    weekdaysAbbrev: ["D", "L", "M", "M", "J", "V", "S"],
                    cancel: 'Cancelar',
                    clear: 'Limpar',
                    done: 'Ok'
                }
            });
            var elems = document.querySelectorAll('.sidenav');
            var instances = M.Sidenav.init(elems);
        });
    </script>
    <script src="../js/Paciente.js"></script>
</body>

</html>