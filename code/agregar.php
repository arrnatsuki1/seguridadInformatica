<?php
include("cn.php");

$nombre = $_POST["nombre"];
$pswd = $_POST["pswd2"];

    $codigoSQL = "INSERT INTO usuarios(nombre, contrasenia) VALUES ('$nombre', '$pswd')";
    $resultSet = mysqli_query($conexion , $codigoSQL);


    if($resultSet) {
        echo "<script>alert('Se registro');</script>";
        
    }


?>