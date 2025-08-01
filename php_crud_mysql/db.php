<?php

    /* Establecer conexion con la base de datos */
    /* en localhost podremos poner la ip donde esta nuestra base de datos si procediera */
    /* root es el usuario por defecto que crea xampp */
    /* php_mysql_crud es el nombre de la base de datos que cree en myphpadmin */

    $conn= mysqli_connect(
        'localhost',
        'root',
        '',
        'php_mysql_crud'
        );

        /* Iniciamos sesion para poder usar variables globales */
        session_start();

    // si hay conexion mostrará mensaje. comprobé que habia conexion y lo comenté
    if (isset($conn)){
        echo 'hay conexion';
        }
    

?>

