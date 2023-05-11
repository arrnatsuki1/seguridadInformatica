<?php
session_start();
if (isset($_SESSION["nombre"])) {
    $nombre = $_SESSION["nombre"];
    include("../code/cn.php");

    $verificarUsuario = "SELECT * FROM usuarios WHERE nombre = '$nombre'";
    $verificacion = mysqli_query($conexion, $verificarUsuario);

    if (mysqli_num_rows($verificacion) > 0) {
		$row = mysqli_fetch_assoc($verificacion);
		file_put_contents('imagen.png', base64_decode($row['imagen']));
		$imagen = imagecreatefrompng('imagen.png');
		$nuevaImagen = imagescale($imagen, 200, 200);
		imagepng($nuevaImagen, 'imagen.png');
	}
} else {
    header("Location: ../index.html");
    exit;
}

?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../normalice.css">
    <link rel="stylesheet" href="sesion.css">
</head>
<body>
<header class="header">
        <p class="titulo">
            Pagina de exito
        </p>
    </header>
    <h1>Bienvenido(a) <?php echo $row['nombre']; ?></h1>
	<img src="imagen.png" alt="Imagen de perfil" class="perfil-img">
</body>
</html>
