<!-- en visual studio pulsar ctrl+k+s abres los accesos directos -->
<!-- ctrl+k+c nos permite poner comentarios en html -->
<!-- Para poner comentarios en php debo hacerlo /* comentario que ocupan mas de una linea */     -->
<!-- Para comentarios en php de una sola linea uso // comentario -->

<?php include("./db.php") ?>
<?php include("./includes/header.php") ?>
<?php include("./includes/navigation.php") ?>        
        
<!-- CONTENEDOR -->
<div class="container" p-4>

    <!-- FILA -->
    <div class="row">

        <!-- COLUMNA CON UNA TARJETA QUE CONTENDRÁ EL FORMULARIO -->
        <div class="col-md-4">

            <!-- Valido los mensajes guardados en sesion y los muestro -->
            <?php if(isset($_SESSION['message'])) { ?>
                
                <!-- en la vble de sesiion message_type tengo el color del mensaje -->
                <div class="alert alert-<?= $_SESSION['message_type'];?> alert-dismissible fade show" role="alert">
                <?= $_SESSION['message'] ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                 <?php
                    /* limpia los datos de la sesion para que cuando refresquemos deje de salir el mensaje*/ 
                    session_unset();
                } ?>

                <!-- tarjeta -->
                <div class="card card-body">
                    <!-- formulario -->
                    <form action="save_task.php" method="POST">
                        <!-- Separará los campos -->
                        <div class="form-group">
                            <!-- campo de texto -->
                            <input type="text" name="title" class="form-control" placeholder="Nueva tarea" autofocus>
                        </div>
                        <div class="form-group">
                            <!-- campo para introducir mas texto -->
                            <textarea name="description" rows="2" class="form-control" placeholder="Descripcion de la tarea"></textarea>
                        </div>
                        <!-- campo para el botón -->
                        <!-- <input type="submit" class="btn bt-success btn-block" name="save_task" value ="Guardar"> -->
                        <button class="btn btn-success" name="save_task">Guardar </button>
                    </form>
                </div>
            </div>
            <!-- columna que contiene la tabla que mostrara las tareas guardadas -->
            <div class="col-md-8">
            <table class="table table-bordered">
                <thead>
                    <!-- fila  -->
                    <tr>
                        <th>Tarea</th>
                        <th>Descripcion</th>
                        <th>Fecha de creacion</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Obtenemos todas la tareas de la bd -->
                    <?php
                    $query = "SELECT * FROM task";
                    $result_task = mysqli_query($conn,$query);
                    //recorro el array y voy mostrando los resultados
                    while ($row = mysqli_fetch_array($result_task)){ ?>
                        <tr>
                            <td><?php echo $row['titulo'] ?></td>
                            <td><?php echo $row['descripcion'] ?></td>
                            <td><?php echo $row['creado_el'] ?></td>
                            <!-- enlaces hacia editar y eliminar -->
                            <!-- El ? situado en el enlace antes del id significa una consulta -->
                            <td>
                                <!-- Uso los iconos desde Font awesome  -->
                                <!-- link https://fontawesome.com/search?o=r&m=free&s=solid -->
                                <a href="edit.php?id=<?php echo $row['id']?>" class="btn btn-secondary">
                                    <i class="fas fa-pen"> </i> 
                                </a> 
                                <a href="delete_task.php?id=<?php echo $row['id']?>" class="btn btn-danger">
                                    <i class="fas fa-trash-alt"> </i>  
                                </a> 
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php include("includes/footer.php") ?>

     
       
