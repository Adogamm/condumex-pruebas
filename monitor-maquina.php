<?php
    include('databaseconnect/conection.php');
    $maquina = $_GET['maquina'];
    setcookie('maquina',$maquina,time()+3600);

    $select = "SELECT * FROM MAQUINAS WHERE MAQUINA = '$maquina'";
    $resultado = sqlsrv_query($conexion,$select);
    $row = sqlsrv_fetch_array($resultado);


?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="styles/sidebar.css">
        <link rel="stylesheet" href="styles/styles-monitor.css">
        <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link rel="icon" href="https://www.condumex.com.mx/wp-content/uploads/2020/05/favicon.png" type="image/png" sizes="16x16">
        <link rel="icon" href="https://www.condumex.com.mx/wp-content/uploads/2020/05/favicon.png" type="image/png" sizes="32x32">
        <title>Monitor maquina</title>
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
            <span class="text"><?php echo $row['MAQUINA']; ?></span>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-lg-9">
                    <a href="<?php echo $_SERVER['HTTP_REFERER']; ?>" class="text-dark" style="text-decoration: none;">
                        <p class="text-left">
                            <i class='bx bx-arrow-back'></i>
                            <span class="ml-1"> Regresar</span>
                        </p>
                    </a>
                </div>
                <div class="col-lg-3 mr-1">
                    <a href="variables.php?maquina=<?php echo $maquina ?>" class="mr-1 text-white  my-3 btn btn-warning">CTP'S</a>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-lg-3 my-2">
                    <div class="card">
                        <div class="card-header">
                            <h6 class="text-center"><i class='bx bx-info-circle'></i> Información</h6>
                        </div>
                        <div class="card-body text-center">
                            <p id="area"></p>
                            <p id="linea" class="my-3"></p>
                            <p id="fecha" class="my-4"></p>
                            <p id="hora" class="my-2"></p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 my-2">
                    <div class="card">
                        <div class="card-header">
                            <h6 class="text-center"><i class='bx bx-timer'></i> Tiempos de línea</h6>
                        </div>
                        <div class="card-body my-3">
                            <div class="card-text my-3">
                                <p id="tiempo_muerto">Tiempo muerto: 10:00 mins<br>
                                <p id="tiempo_perdido">Tiempo perdido: 10:00 mins<br>
                                <p id="tiempo_ciclo">Tiempo ciclo: 42:00 mins</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6 my-2">
                    <div class="card">
                        <div class="card-header">
                            <h6 class="text-center"><i class='bx bxs-chevron-right-circle'></i> OEE</h6>
                        </div>
                        <div class="card-body">
                            <div class="container">
                                <div class="row">
                                    <div class="col-lg-5">
                                    <canvas
                                    data-value="0"
                                    data-type="radial-gauge"
                                    data-width="150"
                                    data-height="150"
                                    data-units="OEE"
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
                                    data-animation-duration="1000"
                                    data-animation-rule="linear"
                                    class="d-block mx-auto my-2"
                                    id="medidor"
                                ></canvas>
                                <script>
                                    var number = 0;
                                        setInterval(function() {
                                            number= Math.floor(Math.random()*100);
                                            $("#medidor").attr("data-value",number);
                                        }, 1000);
                                </script>
                                    </div>
                                    <div class="col-lg-6 text-left">
                                        <p>Alarmas: Ninguno</p>
                                        <p>Último fallo: Ninguno</p>
                                        <p><?php echo date("D M j G:i:s T Y"); ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 my-2">
                    <div class="card">
                        <div class="card-header">
                            <h6 class="text-center"><i class='bx bxs-chevron-right-circle'></i> Disponibilidad</h6>
                        </div>
                        <div class="card-body">
                            <div class="container">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <canvas
                                            data-value="0"
                                            data-type="radial-gauge"
                                            data-width="150"
                                            data-height="150"
                                            data-units="OEE"
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
                                            data-animation-duration="1000"
                                            data-animation-rule="linear"
                                            class="d-block mx-auto my-2"
                                            id="medidor1"
                                        ></canvas>
                                        <script>
                                            var number1 = 0;
                                            setInterval(function() {
                                                number1 = Math.floor(Math.random()*100);
                                                $("#medidor1").attr("data-value",number1);
                                            }, 1000);
                                        </script>
                                    </div>
                                    <div class="col-lg-12 text-center">
                                        <p>Tiempo operativo: 43.12 mins<br>
                                        Tiempo disponible: 56.10 mins</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 my-2">
                    <div class="card">
                        <div class="card-header">
                            <h6 class="text-center"><i class='bx bxs-chevron-right-circle'></i> Rendimiento</h6>
                        </div>
                        <div class="card-body">
                            <div class="container">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <canvas
                                            data-value="0"
                                            data-type="radial-gauge"
                                            data-width="150"
                                            data-height="150"
                                            data-units="OEE"
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
                                            data-animation-duration="1000"
                                            data-animation-rule="linear"
                                            class="d-block mx-auto my-2"
                                            id="medidor2"
                                        ></canvas>
                                        <script>
                                            var number2 = 0;
                                            setInterval(function() {
                                                number2 = Math.floor(Math.random()*100);
                                                $("#medidor2").attr("data-value",number2);
                                            }, 1000);
                                        </script>
                                    </div>
                                    <div class="col-lg-12 text-center">
                                        <p>Producción real: 256 km.<br>
                                        Producción prevista: 280 km.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 my-2">
                    <div class="card">
                        <div class="card-header">
                            <h6 class="text-center"><i class='bx bxs-chevron-right-circle'></i> Calidad</h6>
                        </div>
                        <div class="card-body">
                            <div class="container">
                                <div class="row">
                                <div class="col-lg-12">
                                        <canvas
                                            data-value="0"
                                            data-type="radial-gauge"
                                            data-width="150"
                                            data-height="150"
                                            data-units="OEE"
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
                                            data-animation-duration="1000"
                                            data-animation-rule="linear"
                                            class="d-block mx-auto my-2"
                                            id="medidor3"
                                        ></canvas>
                                        <script>
                                            var number3 = 0;
                                            setInterval(function() {
                                                number3 = Math.floor(Math.random()*100);
                                                $("#medidor3").attr("data-value",number3);
                                            }, 1000);
                                        </script>
                                    </div>
                                    <div class="col-lg-12 text-center">
                                        <p>Producción real: 226 km.<br>
                                        Producción OK: 226 km.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        
    </section>
    <div id="link_wrapper"></div>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="js/sidebar.js"></script>
    <script src="js/gauge.min.js"></script>
    <script src="js/monitor.js"></script>
  </body>
  <script src="js/live/live-monitor-maquina.js"></script>
</html>
