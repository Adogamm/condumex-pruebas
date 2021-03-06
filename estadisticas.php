<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
      <meta charset="UTF-8">
      <title>Estadisticas</title>
        <link rel="stylesheet" href="styles/sidebar.css">
        <link rel="stylesheet" href="styles/styles-monitor.css">
        <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link rel="icon" href="https://www.condumex.com.mx/wp-content/uploads/2020/05/favicon.png" type="image/png" sizes="16x16">
        <link rel="icon" href="https://www.condumex.com.mx/wp-content/uploads/2020/05/favicon.png" type="image/png" sizes="32x32">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.3.2/chart.min.js" integrity="sha512-VCHVc5miKoln972iJPvkQrUYYq7XpxXzvqNfiul1H4aZDwGBGC0lq373KNleaB2LpnC2a/iNfE5zoRYmB4TRDQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
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
            <li><a href="administracion-usuarios.html">Administraci??n</a></li>
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
            <span class="text">ESTADISTICAS</span>
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
            </div>
        </div>

        <div class="container">
            <div class="row">
              <div class="col-lg-12">
                  <form name="selector_datos" action="#" class="form-inline">
                      <div class="container">
                          <div class="row">
                              <div class="col-lg-3 d-block mx-auto my-1">
                                  <select class="form-control my-2 mx-1" name="area" id="area">
                                      <option value="null">-- Seleccionar ??rea --</option>
                                      <option value="Irradiado">Irradiado</option>
                                      <option value="Repase">Repase</option>
                                      <option value="Termo fijo">Termo fijo</option>
                                      <option value="Termo pl??stico">Termo pl??stico</option>
                                  </select>
                              </div>
                              <div class="col-lg-3 d-block mx-auto my-1">
                                  <select class="form-control my-2 mx-1"  name="maquina" id="maquina">
                                      <option value="null">-- Seleccionar M??quina --</option>
                                  </select>
                              </div>
                              <div class="col-lg-3 d-block mx-auto my-1">
                                  <select class="form-control my-2 mx-1">
                                      <option value="null">-- Seleccionar Variables --</option>
                                      <option value="estado-enrollador">Obtenci??n del estado del enrollador</option>
                                      <option value="actual-length">Medici??n de la producci??n conforme "Actual Length"</option>
                                      <option value="fallas-chispa">Matriz de fallas de chispa</option>
                                      <option value="fallas-superficie">Fallas de superficie</option>
                                      <option value="preset_length">Preset_length</option>
                                      <option value="spool-change">Cambio de bobina (spool change)</option>
                                      <option value="last-spool">Velocidad de operaci??n</option>
                                      <option value="last-spool">Concentricidad</option>
                                      <option value="last-spool">Hor??metro</option>
                                  </select>
                              </div>
                              <div class="col-lg-4 d-block mx-auto my-1">
                                  <div class="form-group row">
                                      <label for="staticEmail" class="col-sm-4 col-form-label">Fecha inicio</label>
                                      <div class="col-sm-7">
                                          <input type="date" name="" id="" class="form-control my-2 mx-1">
                                      </div>
                                  </div>
                              </div>
                              <div class="col-lg-4">
                                  <div class="form-group row">
                                      <label for="staticEmail" class="col-sm-4 col-form-label">Fecha fin</label>
                                      <div class="col-sm-7">
                                          <input type="date" name="" id="" class="form-control my-2 mx-1">
                                      </div>
                                  </div>
                              </div>
                              <div class="col-lg-3 d-block mx-auto my-1">
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

                <!-- GRAFICA -->
                <div class="col-lg-5 d-block mx-auto mt-2">
                    <div class="card">
                        <div class="card-body">
                            <canvas class="my-1" id="grafica-lineas" width="40%" height="40%"></canvas>
                        </div>
                    </div>
                </div>

                <!-- TABLA -->
                <div class="col-lg-7 d-block my-2 mx-auto">
                    <div class="card my-2">
                        <div class="card-body">
                            <table class="table table-striped mt-4">
                                <tr>
                                    <th>??tem</th>
                                    <th>Variable</th>
                                    <th>Valor</th>
                                    <th>Fecha inicio</th>
                                    <th>Hora inicio</th>
                                    <th>Fecha fin</th>
                                    <th>Hora fin</th>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
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
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        
                        

                        






    </section>




    <script src="js/sidebar.js"></script>
    <script src="js/main.js"></script>
    <script src="js/monitor.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="js/select.js"></script>
  </body>
</html>