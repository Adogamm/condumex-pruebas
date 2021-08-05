<?php




$servername = "laboratoriosql.c829vdik7kmt.us-east-1.rds.amazonaws.com";
$connectionInfo = array("Database"=>"pruebas","UID"=>"admin","PWD"=>"labsql01");
$conexion = sqlsrv_connect($servername,$connectionInfo);

// $consulta = "SELECT * FROM MAQUINAS;";
// $ejecutar = sqlsrv_query($conexion,$consulta);
// while($fila = sqlsrv_fetch_array($ejecutar)){
//     $maquina = $fila['MAQUINA'];
//     echo $maquina.'<br>';
// }




// BDD LOCAL $conexion = mysqli_connect("localhost","PRUEBAUSER","Pruebas1","PRUEBAS");
// BDD PRADIOT $conexion = mysqli_connect("condumex.pradiot.com","pradiot_condumex","lNziorNl=&?+","pradiot_condumex");
// if (!$conexion) {
//    echo 'Error al conectar a la base de datos';
// } else {
//     echo 'Conectado a la base de datos';
// }

?>
