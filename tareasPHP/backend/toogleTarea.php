<?php

    // ACCEDE A LA TABLA TAREA, LOCALIZA UNA TAREA POR SU ID Y HACE UN TOOGLE DEL CAMPO FINALIZADA DE 0 A 1 O DE 1 A 0

    // Incluir la conexión a la base de datos. incluye la conexion en la vble $conn
    include 'db.php';

    /* PARA EVITAR ATAQUES DE INYECCION SQL USARE UNA CONSULTA PREPARADA. LA CONEXION CON LA BASE DE DATOS DEBE HACERSE MEDIANTE UN OBJETO */

    // Verifica si se recibió el ID
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        // Obtener el ID del cuerpo de la solicitud
        $id = $_POST['id'];

        // Ejecutar la consulta preparada
        if (!empty($id)) {

            // Preparar y ejecutar la consulta para alternar el estado de la tarea
            $stmt = $conn->prepare("UPDATE tarea SET finalizada = NOT finalizada WHERE id = ?");
            $stmt->bind_param("i", $id);

            if ($stmt->execute()) {
                header('Content-Type: application/json');    
                echo json_encode(['success' => true, 'message' => 'Tarea actualizada correctamente']);

                // Almaceno el mensaje de exito en la sesion
                $_SESSION['message'] = 'Tarea actualizada correctamente';
                $_SESSION['message_type'] = 'success';

            } else {
                echo json_encode(['success' => false, 'message' => 'Error al actualizar la tarea']);
            }

            $stmt->close();
        } else {
            echo json_encode(['success' => false, 'message' => 'ID no válido']);
        }

    } else echo json_encode(['success' => false, 'message' => 'Método no permitido']);
    

    // Cerrar la conexión
    $conn->close();

    // Detengo la ejecución del script para asegurarme que no se ejecute nigun codigo adicional despues de la redireccion
    exit();

?>