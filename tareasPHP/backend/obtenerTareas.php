<?php

    // Ayuda mostrando errores
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    // Incluir la conexión a la base de datos. incluye la conexion en la vble $conn
    include("db.php");

    // Obtener las tareas desde la base de datos
    $query = "SELECT * FROM tarea";
    $result = mysqli_query($conn, $query);

    $tareas = array();
    while ($row = mysqli_fetch_assoc($result)) {
        $tareas[] = $row;
    }

    // Devolver las tareas como JSON    
    echo json_encode($tareas);

     // Cerrar la conexión
     $conn->close();

?>
