<?php
//para crear una receta nueva

use models\Paciente;

session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nueva receta</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Coustard&display=swap" rel="stylesheet">
    <link href="../css/style.css" rel="stylesheet">
</head>

<body style="background-image: url('../img/fondo-admin.jpg'); font-family: 'Coustard', serif;">
    <?php if (isset($_SESSION['user'])) { ?>
        <?php if ($_SESSION['user']['rol'] == "operativo") { ?>
            <nav class="deep-orange accent-4">
                <div class="nav-wrapper">
                    <a href="#" class="brand-logo" style="margin-left: 20px; font-family:'Raleway', sans-serif;"><i class="material-icons" style="font-size: 40px;">assignment_ind</i> <?= $_SESSION['user']['nombre'] ?></a>
                    <a href="#" data-target="slide-out" class="sidenav-trigger"><i class="material-icons">menu</i></a>
                    <ul id="nav-mobile" class="right hide-on-med-and-down" style="margin-right: 20px;">

                        <li><a href="../view/operati.php">Buscar receta<i class="material-icons left">search</i></a></li>
                        <li><a href="../view/ingresoReceta.php">Receta<i class="material-icons left">playlist_add</i></a></li>
                        <li><a href="salir.php"><i class="material-icons" style="font-size: 40px;">exit_to_app</i></a></li>
                    </ul>
                </div>
            </nav>

            <ul id="slide-out" class="sidenav">
                <li>
                    <div class="user-view">
                        <!-- <div class="background">
                            <img src="../img/fondo-cesfam.jpg">
                        </div> -->
                        <div style="display: flex;">
                            <a href="#user" class="white-text"><i class="material-icons white-text" style="font-size: 40px;">assignment_ind</i></a>
                            <a href="#user" class="white-text" style="margin-left: 10px;"><?= $_SESSION['user']['nombre'] ?></a>
                        </div>
                    </div>
                </li>

                <li><a href="../view/operati.php">Buscar receta</a></li>
                <li><a href="../view/ingresoReceta.php">Receta</a></li>
                <li><a href="salir.php"><i class="material-icons deep-orange-text" style="font-size: 40px;">exit_to_app</i></a></li>
            </ul>

            <div class="container" id="app" style="padding:20px; margin-top:20px; border-radius:10px; align-content:center; background: rgba(255, 255, 255, 0.8)">
            <div class="row">
                    <div class="col l8 m12 s12">
                        <table class="responsive-table" v-if="esta">
                            <tr>
                                <th>Nombre del paciente</th>
                                <th>Fecha de visita</th>
                            </tr>
                            <tr>
                                <td>{{Paciente.nombre_paciente}}</td>
                                <td>{{paciente.direccion_cliente}}</td>
                            </tr>
                        </table>
                    </div>
                </div>
                <br>
                <hr style="height:3px; border:none; background: #dd2c00; margin-bottom:20px;">
                <form @submit.prevent="guardar">
                    <div class="row">
                        <div class="col l6 m6 s12">
                            <div class="input-field">
                                <input id="rut_paciente" type="text" v-model="rut_paciente">
                                <label for="rut_paciente">Rut Paciente</label>
                            </div>
                        </div>

                        <div class="col l6 m6 s12">
                            <div class="input-field back-field">
                                <input type="date" id="fecha_visita" v-model="fecha_visita">
                                <label for="fecha_visita">Fecha Visita</label>
                            </div>
                        </div>
                        <div class="col l6 m6 s12">
                            <div class="input-field">
                                <input id="sintomas" type="text" v-model="sintomas">
                                <label for="sintomas">sintomas</label>
                            </div>
                        </div>
                        <div class="col l4 m4 s12">
                            <div class="input-field">
                                <textarea id="textarea1" class="materialize-textarea" style="width:435px;" v-model="observacion" maxlength="1000">
                                </textarea>
                                <label for="textarea1">Observaciones</label>
                            </div>
                        </div>

                    </div>

                    <hr style="height:3px; border:none; background: #dd2c00; margin-bottom:20px;">

                    <div class="row">
                        <div class="col l4 m4 s12">
                            <div class="input-field">
                                <input id="rut_operativo" type="text" v-model="rut_operativo">
                                <label for="rut_operativo">Rut Operativo</label>
                            </div>
                        </div>

                        <div class="col l4 m4 s12">
                            <div class="input-field">
                                <input id="medicamentos" type="text" v-model="medicamentos">
                                <label for="medicamentos">medicamentos</label>
                            </div>
                        </div>

                        <div class="col l4 m4 s12">
                        <div class="input-field">
                                <textarea id="textarea1" class="materialize-textarea" style="width:250px;" v-model="diagnostico" maxlength="1000">
                                </textarea>
                                <label for="textarea1">Diagnostico</label>
                            </div>
                        </div>

                    </div>

                    <hr style="height:3px; border:none; background: #dd2c00; margin-bottom:20px;">

                    <div class="row">
                        <br>
                        <div class="col l3 m3 s12">
                            <button class="btn-small deep-orange">Crear receta</button>
                        </div>
                        
                    </div>
                    
                </form>

            </div>
        <?php } else { ?>
            <div class="card-panel" style="width:400px; margin:0 auto; margin-top:20px; border-radius:10px; background: rgba(255, 255, 255, 0.8)">
                <h4 class="center" style="color:#ef5350;">Error de acceso</h4>
                <p class="center">Debes ser vendedor para ingresar a esta página</p>
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
            var elems = document.querySelectorAll('select');
            var instances = M.FormSelect.init(elems);
            var elems = document.querySelectorAll('.sidenav');
            var instances = M.Sidenav.init(elems);
            var elems = document.querySelectorAll('.datepicker');
            var instances = M.Datepicker.init(elems, {
                'autoClose':true,
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
            var elems = document.querySelectorAll('.dropdown-trigger');
            var elems = document.querySelectorAll('.tooltipped');
            var instances = M.Tooltip.init(elems);
        });
    </script>
    <script src="../js/CrearReceta.js"></script>
</body>

</html>