<?php
include ('Conectarse.php');
$conexion = Conectar();
$consulta = "SELECT idmascota, nombre, tipo, raza, fecha_nac, descripcion, urlimagen FROM mascota";
$resultado = mysqli_query($conexion, $consulta);
$jsonarray = array();
if(mysqli_num_rows($resultado)){
    while($row=mysqli_fetch_object($resultado)){
        $jsonarray[] = $row;
    }
}
//print_r($jsonarray);
echo json_encode($jsonarray, JSON_UNESCAPED_SLASHES);
mysqli_close($conexion);
