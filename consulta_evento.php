<?php
include ('Conectarse.php');
$conexion = Conectar();
$consulta = "SELECT idevento, idmascota, titulo, descripcion, fecha, peso, url_imagen FROM evento";
$resultado = mysqli_query($conexion, $consulta);
$jsonarray = array();
if(mysqli_num_rows($resultado)){
    while($row=mysqli_fetch_object($resultado)){
        $jsonarray[] = $row;
    }
}
echo json_encode($jsonarray);
mysqli_close($conexion);
