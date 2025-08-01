<?php

    // Conexion con la base de datos
    include("db.php");

    /* PARA EVITAR ATAQUES DE INYECCION SQL USARE UNA CONSULTA PREPARADA. LA CONEXION CON LA BASE DE DATOS DEBE HACERSE MEDIANTE UN OBJETO */

    //  Obtengo la información proveniente del boton cuyo nombre es 'guardar_tarea' por metodo POST que proviene desde FormularioTareas.jsx 
    if(isset($_POST['guardar_tarea'])){
        
        // Almaceno en la vble descripcion el contenido del input cuyo nombre es descripcion
        $descripcion=$_POST['descripcion'];

        // Sanitizar salida (opcional, para debug)
        echo htmlspecialchars($descripcion);

        // Genero la nueva información que quiero añadir en la tabla: que la tarea no esta finalizada        
        $finalizada = false;

        // Consulta preparada
        $query = $conn->prepare("INSERT INTO tarea (descripcion, finalizada) VALUES (?, ?)");
        if ($query === false) {
            die("Error en la preparación de la consulta: " . $conn->error);
        }

        // Vincular y ejecutar
        $query->bind_param("si", $descripcion, $finalizada);
        $resultado = $query->execute();
            
        // Si no se ejecuta la consulta salgo del programa.
        if (!$resultado) {
            die("Error en la ejecución de la consulta: " . $query->error);
        }

        // Guardo en sesion el mensaje en color verde
        $_SESSION['message'] = 'Tarea guardada correctamente';
        $_SESSION['message_type'] = 'success';
        
        // Cerrar la conexión
        $conn->close();

        // Redirigir usando la variable de entorno
        $redirectUrl = getenv('VITE_REDIRECT_URL') ?: 'http://localhost:5173/';
        header("Location: " . $redirectUrl);

        // Detengo la ejecución del script para asegurarme que no se ejecute nigun codigo adicional despues de la redireccion
        exit();

    }

?>
