<?php
    include("cn.php");
    $nombre = $_GET["nombre"];
    $contra = $_GET["contrasenia"];

    if($nombre=="" or $contra==""){
        echo '<script language="javascript">alert("Por favor llene todos los campos");window.location.href="../index.html"</script>';
        exit;
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
