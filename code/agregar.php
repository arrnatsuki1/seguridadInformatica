<?php
include("cn.php");

$a = 'a';

echo $a;

$nombre = $_POST["nombre"];
$pswd = $_POST["pswd2"];

    $codigoSQL = "INSERT INTO usuarios(id, nombre, contrasenia) VALUES (1, '$nombre', '$pswd')";
    $resultSet = mysqli_query($conexion , $codigoSQL);


    if($resultSet) {
        echo "<script>alert('Se registro');</script>";
        
    }


?>