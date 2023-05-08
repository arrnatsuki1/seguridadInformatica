<?php
    include("cn.php");
    $nombre = $_GET["nombre"];
    $contra = $_GET["contrasenia"];


    $codigoSQL = "SELECT nombre, contrasenia FROM usuarios WHERE nombre = '$nombre' AND contrasenia = '$contra'";
    $resultSet = mysqli_query($conexion, $codigoSQL);

     /* ESTO QUE ESTOY HACIENDO ES DESERIALIZACION INECESARIA POR LO QUE YA TENEMOS UNA VULNERABILIDAD */;
     if($resultSet) {
        while($row = $resultSet->fetch_assoc()) {
            if($row["nombre"] == $nombre and $row["contrasenia"] == $contra ) {
                echo "FELICIDADES SI INGRESO"."<br>";
                echo $nombre;
            }
        }
    }

    

?>