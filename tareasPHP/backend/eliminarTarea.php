<?php

    // Conexion con la base de datos
    include("db.php");

    /* PARA EVITAR ATAQUES DE INYECCION SQL USARE UNA CONSULTA PREPARADA. LA CONEXION CON LA BASE DE DATOS DEBE HACERSE MEDIANTE UN OBJETO */

    // Verifica si el formulario fue enviado
    if (isset($_POST['eliminar_tarea'])) {

        // Obtengo los datos del formulario        
        $tarea_id = $_POST['tarea_id'];

        // Sanitizar salida (opcional, para debug)        
        echo htmlspecialchars($tarea_id);

        // Consulta preparada con marcadores de parámetros
        $query = $conn->prepare("DELETE FROM tarea WHERE id = ?");
        if ($query === false) {
            die("Error en la preparación de la consulta: " . $conn->error);
        }

        // Vincular parámetros (i para integer)
        $query->bind_param("i", $tarea_id);

        // Ejecutar la consulta
        $resultado = $query->execute();

        // Verificar si la consulta se ejecutó correctamente
        if (!$resultado) {
            die("Error en la ejecución de la consulta: " . $query->error);
        }

        // Mensaje de éxito
        $_SESSION['message'] = 'Tarea eliminada correctamente';
        $_SESSION['message_type'] = 'danger';

        // Cerrar la conexión
        $conn->close();

        // Redirigir usando la variable de entorno
        $redirectUrl = getenv('VITE_REDIRECT_URL') ?: 'http://localhost:5173/';
        header("Location: " . $redirectUrl);

        // Detengo la ejecución del script para asegurarme que no se ejecute nigun codigo adicional despues de la redireccion
        exit();
    }

?>