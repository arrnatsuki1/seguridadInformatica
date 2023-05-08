<?php
    $user = "root";
    $route = "127.0.0.1";
    $pswd = "AACEF6E8D16F04BB";
    $table = "informatica";
    $charset = "UTF8";

    $conexion = mysqli_connect($route, $user, $pswd, $table);
    mysqli_set_charset($conexion, $charset);