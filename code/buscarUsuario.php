<?php
    include("cn.php");
    $nombre = $_GET["nombre"];
    $contra = $_GET["contrasenia"];

<<<<<<< HEAD
    if($nombre=="" or $contra==""){
        echo '<script language="javascript">alert("Por favor llene todos los campos");window.location.href="../index.html"</script>';
        exit;
=======
<<<<<<< HEAD
    if($nombre=="" or $contra==""){
        echo '<script language="javascript">alert("Por favor llene todos los campos");window.location.href="../index.html"</script>';
        exit;
=======
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
                echo '<script language="javascript">alert("Felicidades, ingreso");window.location.href="../paginas/sesion.html"</script>';
                echo $nombre;
            }
        }
>>>>>>> 6663dd18037d56611aa58e0a2d63985e0d5acfb4
>>>>>>> 23d5b0750344751ddcdc69d5eb4d87ac1d4c2201
    }

    $verificarUsuario = "SELECT * FROM usuarios WHERE nombre = '$nombre'";
    $verificacion = mysqli_query($conexion,$verificarUsuario);

    if(mysqli_num_rows($verificacion) == 0){
        echo '<script language="javascript">alert("El usuario no existe");window.location.href="../index.html"</script>';
        return;
    }
    $row = mysqli_fetch_assoc($verificacion);
    $hash = $row['contrasenia'];

    if(password_verify($contra, $hash)) {
        echo '<script language="javascript">alert("Felicidades, ingreso");window.location.href="../paginas/sesion.php"</script>';
        session_start();
        $_SESSION["nombre"] = $row["nombre"];
        $_SESSION["imagen"] = $row["imagen"];
    } else {
        echo '<script language="javascript">alert("La contraseña no es correcta");window.location.href="../index.html"</script>';
    }
?>
