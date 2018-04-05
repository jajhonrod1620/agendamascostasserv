<?php
include ('Conectarse.php');
$conexion = Conectar();
$nombre = $_POST["nombre"];
$tipo = $_POST["tipo"];
$raza = $_POST["raza"];
$fecha_nac = $_POST["fecha_nac"];
$descripcion = $_POST["descripcion"];
$urlimagen = $_POST["urlimagen"];



$sql ="SELECT MAX(idmascota) as maximo FROM mascota";
     
     $res = mysqli_query($conexion,$sql);
     
     $id = 0;
     
     while($row = mysqli_fetch_array($res)){
        $id = $row['maximo']+1;
     }
$path = "imagenes/$id.jpeg";

$insertar = "INSERT INTO mascota (nombre, tipo, raza, fecha_nac, descripcion, urlimagen) VALUES('$nombre','$tipo','$raza','$fecha_nac','$descripcion','$path')";


if(mysqli_query($conexion,$insertar)){
    file_put_contents($path,base64_decode($urlimagen));
    echo "Insertado con Exito";
}
mysqli_close($conexion);
