<?php
<<<<<<< HEAD
include("../index.html")
                
                session_start();
                $nombre = $_SESSION["nombre"];
                include("cn.php");
                $verificarUsuario = "SELECT * FROM usuarios WHERE nombre = '$nombre'";
                $verificacion = mysqli_query($conexion,$verificarUsuario);

                if(mysqli_num_rows($verificacion) > 0){
                    $row = mysqli_fetch_assoc($verificacion);
                    echo '<li>Nombre: '.$row['nombre'].'</li>';
                    echo '<li>Imagen: <img src="data:image/jpeg;base64,'.base64_encode($row['imagen']).'"/></li>';
                  
                }
            ?>
=======
	header("location:sesion.html");
?>
>>>>>>> 6663dd18037d56611aa58e0a2d63985e0d5acfb4
