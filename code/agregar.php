<?php
include("cn.php");

$nombre = $_POST["nombre"];
$pswd1 = $_POST["pswd1"];
$pswd2 = $_POST["pswd2"];
	
if($nombre=="" or $pswd1=="" or $pswd2==""){
    echo '<script language="javascript">alert("Por favor rellene todos los campos");window.location.href="../paginas/registro.html"</script>';
	return;
}

	if($pswd1 != $pswd2){
        echo '<script language="javascript">alert("Las contraseñas no concuerdan");window.location.href="../paginas/registro.html"</script>';
	return;
}
    
$verificarNombre = "SELECT * FROM usuarios WHERE nombre = '$nombre'";
$verificacion = mysqli_query($conexion,$verificarNombre);

if($verificacion){
    echo '<script language="javascript">alert("Este usuario ya está registrado");window.location.href="../index.html"</script>';
    return;
}

    

    $codigoSQL = "INSERT INTO usuarios( nombre, contrasenia) VALUES ('$nombre', '$pswd1')";
    $resultSet = mysqli_query($conexion , $codigoSQL);


    if($resultSet) {
        echo '<script language="javascript">alert("Se ha insertado el usuario");window.location.href="../index.html"</script>';
    }
    

?>