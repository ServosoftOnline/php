<?php
    //incluimos la conexion a la base de datos
    include("db.php");

    //Comprobamos si existe el id pasado desde el formulario que incluye el boton de eliminar
    if(isset($_GET['id'])){
        //insertamos el contenido de id en una vble
        $id=$_GET['id'];
        
        //genero la consulta de eliminar todos los registros que contenga esa id
        $query= "DELETE FROM task WHERE id=$id";
        
        //ejecuto la consulta pasandole la vble que contiene la conexion de la base de datos
        $result = mysqli_query($conn,$query);

        //Si no he obtenido resultado acabo el programa indicando fallo
        if(!$result){
            die("querry failed");
        }

        //si llego hasta aqui es que se ha producido la eliminacion.
        //guardo el mensaje y el color en vbles globales que index.php usará para mostrar el resultado
        $_SESSION['message'] = 'Tarea eliminada correctamente';
        $_SESSION['message_type'] = 'danger';

        // Redirigo hacia index.php
        header("Location: index.php");
    }
    
?>