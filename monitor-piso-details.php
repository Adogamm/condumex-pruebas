<?php
  include 'databaseconnect/conection.php';
  $tipo_maquina = $_GET['tipo_maquina'];
  setcookie('tipo_maquina',$tipo_maquina,time()+3600);
  $select = "SELECT * FROM MAQUINAS WHERE TIPO_MAQUINA='$tipo_maquina'";
  $select_avg = "SELECT ROUND(AVG(RENDIMIENTO), 2) AS RENDIMIENTO FROM MAQUINAS WHERE TIPO_MAQUINA = '$tipo_maquina'";
  $query = sqlsrv_query($conexion, $select);
  $query1 = sqlsrv_query($conexion,$select_avg);
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="styles/sidebar.css">
        <link rel="stylesheet" href="styles/styles-monitor.css">
        <link rel="stylesheet" href="styles/led.css">
        <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link rel="icon" href="https://www.condumex.com.mx/wp-content/uploads/2020/05/favicon.png" type="image/png" sizes="16x16">
        <link rel="icon" href="https://www.condumex.com.mx/wp-content/uploads/2020/05/favicon.png" type="image/png" sizes="32x32">
        <title>Área: <?php echo $tipo_maquina ?></title>
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


  <!-- CONTENIDO DE LA PAGINA -->

  <section class="home-section">
    <div class="home-content">
      <i class='bx bx-menu' ></i>
      <span class="text"><?php echo strtoupper($tipo_maquina) ?></span>
    </div>
    <div class="container">
        <div class="row col-12">
            <a href="monitor.php" class="text-dark" style="text-decoration: none;">
                <p class="text-left">
                    <i class='bx bx-arrow-back'></i>
                    <span class="ml-1"> Regresar</span>
                </p>
            </a>
        </div>
    </div>
    <div class="container">
                <div class="row">
                    <div class="col-lg-3">
                        <div class="card ml-4">
                            <div class="card-body">
                            <?php while($avg = sqlsrv_fetch_array($query1)){ ?>
                            <div class="progress my-4">
                                <div id="medidor" class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" style="width: <?php echo $avg['RENDIMIENTO'];  ?>?%; min-width: 25%;" aria-valuenow="<?php echo $avg['RENDIMIENTO'];  ?>" aria-valuemin="0" aria-valuemax="100"><?php echo $avg['RENDIMIENTO'];  ?>%</div>
                            </div>
        <!-- Actualizar los medidores con valores aleatorios -->
                            <script>
                                var number = 0;
                                var barra = document.getElementById("medidor");
                                    setInterval(function() {
                                        number = Math.floor(Math.random()*100);
                                        $("#medidor").css("width",number+"%").attr("aria-valuenow",number).text(number+"%");
                                        if(number >= 0 && number <= 60){
                                            barra.classList.remove("bg-warning");
                                            barra.classList.remove("bg-success");
                                            barra.classList.add("bg-danger");
                                        } else if(number >= 61 && number <= 85){
                                            barra.classList.remove("bg-danger");
                                            barra.classList.remove("bg-success");
                                            barra.classList.add("bg-warning");
                                        } else if(number >= 86 && number <= 100){
                                            barra.classList.remove("bg-danger");
                                            barra.classList.remove("bg-warning");
                                            barra.classList.add("bg-success");
                                        }
                                    }, 1000);
                            </script>
                            <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div>
                <div class="container">
                <div class="row">
                    <?php while($maquina = sqlsrv_fetch_array($query)){  ?>
                        <div class="col-lg-4 text-center d-block mx-auto">
                            <div class="card my-2">
                                <div class="card-header">
                                    <div class="container">
                                      <div class="row">
                                        <div class="col-lg-6 col-md-12">
                                          <div class="led-box">
                                            <div id="led<?php echo $maquina['MAQUINA'] ?>" class="led-green"></div>
                                          </div>
                                          <p style="margin-right: 75%"><?php echo $maquina['MAQUINA'] ?></p>
                                        </div>
                                        <div class="col-lg-6 col-md-12 mt-2">
                                          <p>Velocidad: 200 km/h</p>
                                          <p>Status: OK</p>
                                        </div>
                                      </div>
                                    </div>
                                </div>
                            <div class="card-body">
                                <h6 id="text<?php echo $maquina['MAQUINA'] ?>"></h6>
                                    <canvas
                                        data-value="<?php echo $maquina['RENDIMIENTO'] ?>"
                                        data-type="radial-gauge"
                                        data-width="175"
                                        data-height="175"
                                        data-units=""
                                        data-min-value="0"
                                        data-start-angle="90"
                                        data-ticks-angle="180"
                                        data-value-box="false"
                                        data-max-value="100"
                                        data-major-ticks="0,25,50,75,100"
                                        data-minor-ticks="4"
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
                                        data-animation-duration="900"
                                        data-animation-rule="linear"
                                        class="d-block mx-auto"
                                        id="medidor<?php echo $maquina['MAQUINA']; ?>"
                                    ></canvas>
                                <a href="monitor-maquina.php?maquina=<?php echo $maquina['MAQUINA'] ?>" class="btn btn-warning d-block mx-auto mt-4 text-white">Detalles</a>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                </div>
            </div>






    </section>
    <!-- Carga de información desde JS -->
    <div id="link_wrapper"></div>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="js/sidebar.js"></script>
    <script src="js/gauge.min.js"></script>
    <script src="js/monitor.js"></script>
  </body>
<script src="js/live/live-monitor-piso-details.js"></script>
</html>

