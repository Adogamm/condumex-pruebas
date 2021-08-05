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
      <link rel="stylesheet" href="styles/sidebar.css">
      <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
      <link rel="icon" href="https://www.condumex.com.mx/wp-content/uploads/2020/05/favicon.png" type="image/png" sizes="16x16">
    <link rel="icon" href="https://www.condumex.com.mx/wp-content/uploads/2020/05/favicon.png" type="image/png" sizes="32x32">
      <title>Monitor de piso</title>
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
            <li><a href="administracion-usuarios.html">Administración</a></li>
            <li><a href="roles-privilegios.html">Roles y privilegios</a></li>
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
      <span class="text">MONITOR DE PISO</span>
    </div>
    <div class="container my-1">
        <div class="row">
            <div class="col-lg-7">
                <div class="container">
                    <div class="row">
                        <?php while($maquinas = sqlsrv_fetch_array($query) AND $porcentaje = sqlsrv_fetch_array($query1)){ ?>
                        <div class="col-lg-6 mt-1">
                            <div class="card my-2">
                                <div class="card-body my-2">
                                    <h5 class="card-title text-center"><?php echo $maquinas['TIPO_MAQUINA'] ?></h5>
                                    <canvas
                                    data-value="<?php echo $porcentaje['RENDIMIENTO'] ?>"
                                    data-type="radial-gauge"
                                    data-width="150"
                                    data-height="150"
                                    data-units="%OEE"
                                    data-min-value="0"
                                    data-max-value="100"
                                    data-major-ticks="0,10,20,30,40,50,60,70,80,90,100"
                                    data-minor-ticks="2"
                                    data-stroke-ticks="true"
                                    data-highlights='[
                                        {"from": 0, "to": 60, "color": "rgba(200, 50, 50, .75)"},
                                        {"from": 60, "to": 85, "color": "rgba(240, 233, 29, .94)"},
                                        {"from": 85, "to": 100, "color": "rgba(19, 142, 13, .56)"}
                                    ]'
                                    data-color-plate="#fff"
                                    data-border-shadow-width="0"
                                    data-borders="false"
                                    data-needle-type="arrow"
                                    data-needle-width="2"
                                    data-needle-circle-size="7"
                                    data-needle-circle-outer="true"
                                    data-needle-circle-inner="false"
                                    data-animation-duration="750"
                                    data-animation-rule="linear"
                                    class="d-block mx-auto"
                                    id="medidor<?php echo $maquinas['TIPO_MAQUINA_HIDDEN'] ?>"
                                    ></canvas>

                                    <!-- <script>
                                        var number<?php echo $maquinas['TIPO_MAQUINA_HIDDEN'] ?> = 0;
                                            setInterval(function() {
                                                number<?php echo $maquinas['TIPO_MAQUINA_HIDDEN'] ?> = Math.floor(Math.random()*100);
                                                $("#medidor<?php echo $maquinas['TIPO_MAQUINA_HIDDEN'] ?>").attr("data-value",number<?php echo $maquinas['TIPO_MAQUINA_HIDDEN'] ?>);
                                            }, 1000);
                                    </script> -->
                                    <a href="monitor-piso-details.php?tipo_maquina=<?php echo $maquinas['TIPO_MAQUINA'] ?>" class="my-2 btn btn-warning text-white d-block mx-auto">Detalles</a>
                                </div>
                            </div>
                        </div>
                        <?php } ?>
                    </div>
                </div>
            </div>

            <div class="col-lg-5 mt-1">
                <div class="card">
                    <div class="card-body">
                        <table class="table table-striped">
                            <tr>
                                <th>Área</th>
                                <th>Nombre de línea</th>
                                <th>Fecha</th>
                                <th>Hora</th>
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
  </section>
  <div id="link_wrapper"></div>


<script src="js/sidebar.js"></script>
<script src="js/gauge.min.js"></script>
<script src="js/monitor.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>
<script src="js/live/live-monitor.js"></script>
</html>