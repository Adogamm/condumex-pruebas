<?php
    include("../databaseconnect/conection.php");
    $tipo_maquina = $_COOKIE['tipo_maquina'];
?>
<div class="container">
    <div class="row">
            <?php 
            $select = "SELECT * FROM MAQUINAS WHERE TIPO_MAQUINA = '$tipo_maquina'";
            $query = sqlsrv_query($conexion, $select);
    while($row = sqlsrv_fetch_array($query)){

        // Asignacion a nombre de variables
        $maquina = $row["MAQUINA"];
        $rendimiento = $row["RENDIMIENTO"];
 ?>

<!-- Input para actualizar los medidores -->
        <input type="number" name="rendimiento<?php echo $maquina ?>" id="rendimiento<?php echo $maquina ?>" value="<?php echo $rendimiento ?>" hidden>

<!-- Script para actualizar los medidores y el titulo -->
        <img src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7" onload="
        var rendimiento = document.getElementById('rendimiento<?php echo $maquina ?>').value;
        var titulo = document.getElementById('text<?php echo $maquina ?>');
        var led = document.getElementById('led<?php echo $maquina ?>');

        titulo.textContent = 'OEE: <?php echo $rendimiento ?>'+' %'
        $('#medidor<?php echo $maquina ?>').attr('data-value',rendimiento);

        if(<?php echo $rendimiento ?> >=  0 && <?php echo $rendimiento ?> <= 60){
            led.classList.remove('led-green');
            led.classList.remove('led-yellow');
            led.classList.add('led-red');
        } else if(<?php echo $rendimiento ?> >=  61 && <?php echo $rendimiento ?> <= 85){
            led.classList.remove('led-green');
            led.classList.remove('led-red');
            led.classList.add('led-yellow');
        } else if(<?php echo $rendimiento ?> >=  85){
            led.classList.remove('led-yellow');
            led.classList.remove('led-red');
            led.classList.add('led-green');
        }


        " hidden>
<?php } ?>
    </div>
</div>



