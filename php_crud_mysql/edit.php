<!-- Comprobamos los datos que queremos editar -->
<?php
    include("db.php");

    //comprobamos que existe el id que hemos pasado desde el formulario de index.php
    if(isset($_GET['id'])){
        //Introducimos el valor del id en una vble para poder tratar con ella
        $id=$_GET['id'];
        //Ejecutamos la consulta y localizamos todos los campos asociados a ese id
        $query="SELECT * FROM task WHERE id=$id";
        //Guardamos el resultado de la consulta. Pasandole la conexion y la consulta
        $result=mysqli_query($conn,$query);
        //si obtengo resultados los muestro. Si tengo 1 lo muestro por pantalla
        
        if(mysqli_num_rows($result)==1){
            
            //echo 'Puedo editar'; prueba comentada de que he llegado bien hasta aqui
            //Almaceno en las vlbes title y description el titulo y descripcion obtenidas
            $row=mysqli_fetch_array($result);
            $title=$row['titulo'];
            $description=$row['descripcion'];
   
        }
    }
    /*  Cuando pulse el boton de actualizar del formulario que está mas abajo me reeviará
        a este mismo archivo php enviando por el metodo post el nombre update.
        Si existe es que quiero actualizar */
    
    if(isset($_POST['update'])){
        
        //echo 'vamos a actualizar';
        //el id lo obtuve por metodo get desde index.php.
        //el title y description lo obtube por metodo post desde el formulario de mas abajo
        $id=$_GET['id'];
        $title=$_POST['title'];
        $description=$_POST['description'];
        
        /* Mostraría lo que posteriormente insertaria en la consulta
        echo $id;
        echo $title;
        echo $description;  
        */

        //actualizo la bbdd, guardo mensajes en sesion y redirigo a index.php ya modificado
        $query="UPDATE task set titulo='$title', descripcion='$description' WHERE id='$id' ";
        mysqli_query($conn,$query);

        // Guardo en sesion el mensaje en color verde
        $_SESSION['message'] = 'Tarea actualizada correctamente';
        $_SESSION['message_type'] = 'warning';

        header("Location: index.php");
    }

?>

<!--  Formulario que contiene los resultados. Incluyo html de la cabecera y el pie al principio y final -->

<?php include ("includes/header.php") ?>
    <!-- Usaremos clases de bootstrap y el formulario en su interior -->
    <div class="container p-4">
        <!-- permitira centrarlo -->
        <div class="row">
            <!-- contendrá formulario con 4 columnas -->
            <div class="col-md-4 mx-auto">
                <!-- tarjeta -->
                <div class="card card-body">
                    <!-- formulario dentro de bootstrap -->
                    <form action="edit.php?id=<?php echo $id; ?>" method="POST">
                        <div class="form-group">
                            <!-- La class form-control sirve para que se estilice. placeholder para que muestre un texto -->
                            <input type="text" name="title" value="<?php echo $title; ?>" class="form-control" placeholder="Actualiza el titulo">
                        </div>
                        <div class="form-group">
                            <textarea name="description" rows="2" class="form-control" placeholder="Actualiza la descripcion"><?php echo $description;?> </textarea>
                        </div>
                        <button class="btn btn-success" name="update">
                            Actualiza
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

<?php include ("includes/footer.php") ?>
