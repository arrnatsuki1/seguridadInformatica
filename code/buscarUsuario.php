<?php
    include("cn.php");
    $nombre = $_GET["nombre"];
    $contra = $_GET["contrasenia"];

if($nombre=="" or $contra==""){
    echo '<script language="javascript">alert("Error de autentificacion");window.location.href="../index.html"</script>';
    exit;
}

$verificarUsuario = "SELECT * FROM usuarios WHERE nombre = '$nombre' AND contrasenia ='$contra'";
$verificacion = mysqli_query($conexion,$verificarUsuario);

if(mysqli_num_rows($verificacion) == 0){
    echo '<script language="javascript">alert("El usuario no existe");window.location.href="../index.html"</script>';
    return;
}
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