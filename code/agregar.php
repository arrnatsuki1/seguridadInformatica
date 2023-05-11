<?php
include("cn.php");

$nombre = $_POST["nombre"];
$pswd1 = $_POST["pswd1"];
$pswd2 = $_POST["pswd2"];

	
if($nombre=="" or $pswd1=="" or $pswd2==""){
    echo '<script language="javascript">alert("Por favor rellene todos los campos");window.location.href="../paginas/registro.html"</script>';
	return;
}

if (!preg_match("/^[a-zA-Z ]*$/", $nombre)) {
    echo '<script language="javascript">alert("El nombre solo debe contener letras y espacios");window.location.href="../paginas/registro.html"</script>';
    return;
}

<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> 23d5b0750344751ddcdc69d5eb4d87ac1d4c2201

if($pswd1 != $pswd2){
        echo '<script language="javascript">alert("Las contraseñas no concuerdan");window.location.href="../paginas/registro.html"</script>';
	return;
}elseif (!preg_match('/^[a-zA-Z]+$/', $pswd1)) {
    echo '<script language="javascript">alert("La contraseña solo debe contener letras y no debe tener espacios");window.location.href="../paginas/registro.html"</script>';
    return;
}

if(isset($_FILES['profileImage']) && $_FILES['profileImage']['error'] == 0){
    // el archivo se ha recibido correctamente, se puede proceder a su procesamiento
} else {
    // se ha producido un error al recibir el archivo
    echo '<script language="javascript">alert("No se ha seleccionado ningún archivo o se ha producido un error al recibirlo");window.location.href="../paginas/registro.html"</script>';
    return;
}

$imgData = addslashes(file_get_contents($_FILES['profileImage']['tmp_name']));

$fileExtension = pathinfo($_FILES['profileImage']['name'], PATHINFO_EXTENSION);
if (strtolower($fileExtension) !== 'png') {
    echo '<script language="javascript">alert("El archivo seleccionado no es una imagen en formato png");window.location.href="../paginas/registro.html"</script>';
    return;
}

// Encriptar la contraseña antes de insertarla en la base de datos
$contraseniaEncriptada = password_hash($pswd1, PASSWORD_DEFAULT);

$verificarNombre = "SELECT * FROM usuarios WHERE nombre = '$nombre'";
$verificacion = mysqli_query($conexion,$verificarNombre);

if(mysqli_num_rows($verificacion) > 0){
    echo '<script language="javascript">alert("Este usuario ya está registrado");window.location.href="../index.html"</script>';
    return;
}
if(isset($_FILES['profileImage']) && $_FILES['profileImage']['error'] == 0){
    $imgData = file_get_contents($_FILES['profileImage']['tmp_name']);

    // Convertir la imagen a una cadena codificada en base64
    $imgDataEncoded = base64_encode($imgData);

    // Escapar la cadena codificada en base64
    $imgDataEscaped = mysqli_real_escape_string($conexion, $imgDataEncoded);

    // Insertar el usuario con la contraseña encriptada y la imagen
    $codigoSQL = "INSERT INTO usuarios(nombre, contrasenia, imagen) VALUES ('$nombre', '$contraseniaEncriptada', '$imgDataEscaped')";
<<<<<<< HEAD
=======
=======
    $codigoSQL = "INSERT INTO usuarios( nombre, contrasenia) VALUES ('$nombre', '$pswd1')";
>>>>>>> 6663dd18037d56611aa58e0a2d63985e0d5acfb4
>>>>>>> 23d5b0750344751ddcdc69d5eb4d87ac1d4c2201
    $resultSet = mysqli_query($conexion , $codigoSQL);

    if($resultSet) {
        echo '<script language="javascript">alert("Se ha insertado el usuario");window.location.href="../index.html"</script>';
    }
} 


?>