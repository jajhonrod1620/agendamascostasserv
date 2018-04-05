<?php
include ('Conectarse.php');
$conexion = Conectar();
$mascota = $_POST["mascota"];
$titulo = $_POST["titulo"];
$descripcion = $_POST["descripcion"];
$fecha_even = $_POST["fecha_even"];
$peso = $_POST["peso"];
$url_imagen = $_POST["url_imagen"];

$sql ="SELECT MAX(idevento) as maximo FROM evento";
     
     $res = mysqli_query($conexion,$sql);
     
     $id = 0;
     
     while($row = mysqli_fetch_array($res)){
        $id = $row['maximo']+1;
     }
$path = "imagenes/evento_".$id.".jpeg";

$insertar = "INSERT INTO evento (idmascota, titulo, descripcion, fecha, peso, url_imagen) VALUES ($mascota, '$titulo', '$descripcion', '$fecha_even', $peso, '$path')";

if(mysqli_query($conexion,$insertar)){
    file_put_contents($path,base64_decode($url_imagen));
    echo "Insertado con Exito";
}
mysqli_close($conexion);
