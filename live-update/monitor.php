<?php
    include("../databaseconnect/conection.php");
    $select_avg = "SELECT TIPO_MAQUINA,ROUND(AVG(RENDIMIENTO), 2) AS RENDIMIENTO FROM MAQUINAS GROUP BY TIPO_MAQUINA";
    $query = sqlsrv_query($conexion,$select_avg);

    $select = "SELECT DISTINCT TIPO_MAQUINA, TIPO_MAQUINA_HIDDEN FROM MAQUINAS GROUP BY TIPO_MAQUINA, TIPO_MAQUINA_HIDDEN;";
    $query1 = sqlsrv_query($conexion,$select);

    while($avg = sqlsrv_fetch_array($query) and $tipo_maquina = sqlsrv_fetch_array($query1)){
        $tipo = $tipo_maquina['TIPO_MAQUINA_HIDDEN'];
        $avg_area = $avg['RENDIMIENTO'];
?>

<input type="number" name="rendimiento<?php echo $tipo ?>" id="rendimiento<?php echo $tipo ?>" value="<?php echo $avg_area ?>" hidden>
<img src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7" onload="
        var rendimiento = document.getElementById('rendimiento<?php echo $tipo ?>').value;
        $('#medidor<?php echo $tipo ?>').attr('data-value',rendimiento);
        " hidden>
<?php } ?>


