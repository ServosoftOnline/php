<?php
    // conexion con la base de datos
    include("db.php");

    // COMPROBAMOS QUE OBTENEMOS title y description de save_task que viene de formulario.php
    if(isset($_POST['save_task'])){
        $titulo=$_POST['title'];
        $descripcion=$_POST['description'];
        /* nos sirve para mostrar que hemos recibido correctamente los datos del formulario. 
        echo $titulo;
        echo $descripcion;
        */

        /* inserto las vbles que contienen los datos obtenidos por el formulario 
          $conn que viene de db.php*/
        $query = "INSERT INTO task(titulo,descripcion) VALUES ('$titulo','$descripcion')";
        $result = mysqli_query($conn,$query);
        
        if(!$result){
            die("Query failed");
        }

        // Guardo en sesion el mensaje en color verde
        $_SESSION['message'] = 'Tarea guardada correctamente';
        $_SESSION['message_type'] = 'success';
        
        // Redirigo hacia index.php
        header("Location: index.php");
    }
?>
