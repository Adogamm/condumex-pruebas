<?php

date_default_timezone_set("America/Mexico_City");



    include("../databaseconnect/conection.php");
    $maquina = $_COOKIE['maquina'];
    $select = "SELECT * FROM MAQUINAS WHERE MAQUINA = '$maquina'";
    $query = sqlsrv_query($conexion, $select);
    while($row = sqlsrv_fetch_array($query)){
        $area = $row['TIPO_MAQUINA'];
        $linea = $row['MAQUINA'];
?>
    <img src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7" onload="
        var area = document.getElementById('area');
        var linea = document.getElementById('linea');
        var fecha = document.getElementById('fecha');
        var hora = document.getElementById('hora');
        var tiempo_muerto = document.getElementById('tiempo_muerto');
        var tiempo_perdido = document.getElementById('tiempo_perdido');
        var tiempo_ciclo = document.getElementById('tiempo_ciclo');

        area.textContent = 'Área: <?php echo $area ?>'
        linea.textContent = 'Linea: <?php echo $linea ?>'
        fecha.textContent = 'Fecha: <?php echo date("m/d/y"); ?>'
        hora.textContent = 'Hora: <?php echo date("H:i:s"); ?>'

        " hidden>
<?php } ?>