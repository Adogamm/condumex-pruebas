<?php 
include 'databaseconnect/conection.php';
$select = "SELECT DISTINCT TIPO_MAQUINA, TIPO_MAQUINA_HIDDEN FROM MAQUINAS GROUP BY TIPO_MAQUINA, TIPO_MAQUINA_HIDDEN;";
$query = sqlsrv_query($conexion,$select);

$select_avg = "SELECT TIPO_MAQUINA,ROUND(AVG(RENDIMIENTO), 2) AS RENDIMIENTO FROM MAQUINAS GROUP BY TIPO_MAQUINA";
$query1 = sqlsrv_query($conexion,$select_avg);
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <link rel="stylesheet" href="styles/sidebar.css">
        <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link rel="icon" href="https://www.condumex.com.mx/wp-content/uploads/2020/05/favicon.png" type="image/png" sizes="16x16">
        <link rel="icon" href="https://www.condumex.com.mx/wp-content/uploads/2020/05/favicon.png" type="image/png" sizes="32x32">
        <link rel="stylesheet" href="styles/boxes.css">
        <title>Variables</title>
   </head>
<body>
  <div class="sidebar close">
    <div class="logo-details">
      <img src="images/logo-sidebar.png" alt="logo condumex">
      <span class="logo_name">CONDUMEX</span>
    </div>
    <ul class="nav-links">
      
      <li>
        <div class="iocn-link">
            <a href="monitor.php">
                <i class='bx bx-grid-alt' ></i>
                <span class="link_name">Monitor piso</span>
            </a>
            <i class='bx bxs-chevron-down arrow' ></i>
        </div>
        <ul class="sub-menu">
          <li><a class="link_name" href="#">Monitor piso</a></li>
          <li><a href="monitor-piso-details.php?tipo_maquina=Irradiado">Irradiado</a></li>
          <li><a href="monitor-piso-details.php?tipo_maquina=Repase">Repase</a></li>
          <li><a href="monitor-piso-details.php?tipo_maquina=Termo%20Fijo">Termo fijo</a></li>
          <li><a href="monitor-piso-details.php?tipo_maquina=Termo%20Plastico">Termo plastico</a></li>
        </ul>
      </li>
      <li>
         
      </li>
      <li>
        <div class="iocn-link">
          <a href="#">
            <i class='bx bx-book-alt' ></i>
            <span class="link_name">Catalogos</span>
          </a>
          <i class='bx bxs-chevron-down arrow' ></i>
        </div>
        <ul class="sub-menu">
          <li><a class="link_name" href="#">Catalogos</a></li>
          <li><a href="catalogo-compuestos.html">Compuestos</a></li>
          <li><a href="recetas.html">Recetas</a></li>
        </ul>
      </li>
      <li>
        <a href="bitacora-eventos.html">
          <i class='bx bx-calendar-event' ></i>
          <span class="link_name">Bitacora de eventos</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="bitacora-eventos.html">Bitacora de eventos</a></li>
        </ul>
      </li>
      <li>
        <a href="maestros.html">
          <i class='bx bx-wrench' ></i>
          <span class="link_name">Maestros</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="maestros.html">Maestros</a></li>
        </ul>
      </li>
      <li>
        <div class="iocn-link">
            <a href="#">
            <i class='bx bx-user' ></i>
            <span class="link_name">Usuarios</span>
            </a>
            <i class='bx bxs-chevron-down arrow' ></i>
        </div>
            <ul class="sub-menu">
            <li><a class="link_name" href="#">Usuarios</a></li>
            <li><a href="#">Administración</a></li>
            <li><a href="#">Roles y privilegios</a></li>
            </ul>
        </li>
        <div class="profile-details">
            <div class="profile-content">
            <img src="images/avatar.png" alt="profileImg">
        </div>
        <div class="name-job">
            <div class="profile_name">Prem Shahi</div>
            <div class="job">Web Desginer</div>
        </div>
          <i class='bx bx-log-out' style="color: #fff;"></i>
        </div>
    </li>
    </ul>
  </div>


    <!-- CONTENIDO DE LA PÁGINA -->
    <section class="home-section">
        <div class="home-content">
            <i class='bx bx-menu' ></i>
            <span class="text">CTP'S</span>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <a href="<?php echo $_SERVER['HTTP_REFERER']; ?>" class="text-dark" style="text-decoration: none;">
                        <p class="text-left">
                            <i class='bx bx-arrow-back'></i>
                            <span class="ml-1"> Regresar</span>
                        </p>
                    </a>
                </div>
                <div class="col-lg-12">
                    <div class="card mb-2">
                        <div class="card-body">
                            <form name="selector_datos" action="#" class="form-inline">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-lg-4 col-sm-12 my-1 d-block mx-auto my-1">
                                            <select class="form-control my-2 mx-1" name="area" id="area">
                                                <option value="null">-- Seleccionar Área --</option>
                                                <option value="Irradiado">Irradiado</option>
                                                <option value="Repase">Repase</option>
                                                <option value="Termo fijo">Termo fijo</option>
                                                <option value="Termo plástico">Termo plástico</option>
                                            </select>
                                        </div>
                                        <div class="col-lg-4 col-sm-12 my-1 d-block mx-auto my-1">
                                            <select class="form-control my-2 mx-1"  name="maquina" id="maquina">
                                                <option value="null">-- Seleccionar Máquina --</option>
                                            </select>
                                        </div>
                                        <div class="col-lg-4 col-sm-12 my-1 d-block mx-auto my-1">
                                            <select class="form-control my-2 mx-1">
                                                <option value="null">-- Seleccionar Variables --</option>
                                                <option value="estado-enrollador">Obtención del estado del enrollador</option>
                                                <option value="actual-length">Medición de la producción conforme "Actual Length"</option>
                                                <option value="fallas-chispa">Matriz de fallas de chispa</option>
                                                <option value="fallas-superficie">Fallas de superficie</option>
                                                <option value="preset_length">Preset_length</option>
                                                <option value="spool-change">Cambio de bobina (spool change)</option>
                                                <option value="last-spool">Velocidad de operación</option>
                                                <option value="last-spool">Concentricidad</option>
                                                <option value="last-spool">Horómetro</option>
                                            </select>
                                        </div>
                                        <div class="col-lg-4 col-sm-12 my-1 d-block mx-auto my-1">
                                            <div class="form-group row">
                                                <label for="staticEmail" class="col-sm-4 col-form-label">Fecha inicio</label>
                                                <div class="col-sm-7">
                                                    <input type="date" name="" id="" class="form-control my-2 mx-1">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-sm-12 my-1">
                                            <div class="form-group row">
                                                <label for="staticEmail" class="col-sm-4 col-form-label">Fecha fin</label>
                                                <div class="col-sm-7">
                                                    <input type="date" name="" id="" class="form-control my-2 mx-1">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-sm-12 my-1 d-block mx-auto my-1">
                                            <div class="form-group row mx-4">
                                                <label for="staticEmail" class="col-sm-4 col-form-label">Turno</label>
                                                <div class="col-sm-7">
                                                    <select class="form-control my-2 mx-1">
                                                        <option value="null"> Turno </option>
                                                        <option value="Turno_1">Turno 1</option>
                                                        <option value="Turno_2">Turno 2</option>
                                                        <option value="Turno_3">Turno 3</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-sm-12 my-1">
                    <div class="card">
                        <div class="card-body">
                            <canvas class="my-1" id="grafica-lineas" width="40%" height="40%"></canvas>
                        </div>
                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12 my-2">
                                <div class="card">
                                    <div class="card-header bg-warning text-white">
                                        <h6 class="text-center">ESTATUS</h6>
                                    </div>
                                    <div class="card-body p-0">
                                        <div class="container">
                                            <div class="row">
                                                <div class="col-lg-4 col-sm-12 mt-2">
                                                    <div id="variable">
                                                        <div class="box green"></div>
                                                        <p>Funcionamiento</p>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-sm-12 mt-2">
                                                    <div id="variable">
                                                        <div class="box red"></div>
                                                        <p>Velocidad</p>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-sm-12 mt-2">
                                                    <div id="variable">
                                                        <div class="box green"></div>
                                                        <p>Estado enrollador</p>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-sm-12 mt-2">
                                                    <div id="variable">
                                                        <div class="box red"></div>
                                                        <p>Temperatura</p>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-sm-12 mt-2">
                                                    <div id="variable">
                                                        <div class="box red"></div>
                                                        <p>Sistema inyeccion</p>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-sm-12 mt-2">
                                                    <div id="variable">
                                                        <div class="box green"></div>
                                                        <p>Estado</p>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-sm-12 mt-2">
                                                    <div id="variable">
                                                        <div class="box green"></div>
                                                        <p>Estado</p>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-sm-12 mt-2">
                                                    <div id="variable">
                                                        <div class="box green"></div>
                                                        <p>Estado</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12 my-2">
                                <div class="card">
                                    <div class="card-header bg-warning text-white">
                                        <h6 class="text-center">VARIABLES</h6>
                                    </div>
                                    <div class="card-body">
                                        <p class="">
                                            Lorem ipsum dolor sit, amet consectetur adipisicing elit. Esse doloribus voluptates dicta, facilis, reiciendis aliquid est neque eaque, obcaecati nulla velit. Nam fugiat soluta voluptatum quam, eaque dolor exercitationem fuga.
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        

    </section>


<script src="js/sidebar.js"></script>
<script src="js/monitor.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="js/main.js"></script>
<script src="js/select.js"></script>
</body>
</html>