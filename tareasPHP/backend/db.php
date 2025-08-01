<?php
    
    /* 
        Establezco la conexión con la base de datos mediante un objeto:
            - Esto me permitirá realizar consultas preparadas evitando ataques de inyección SQL            
            - Así podré usar prepare y bind_param en las consultas

            - En localhost podremos poner la IP donde se encuentra la base de datos.
                - Quizás deba cambiarlo cuando pase a producción
            
            - root es el usuario por defecto que crea XAMPP
            - tareas_crud es el nombre de la base de datos que creé en phpMyAdmin

            Configuro que PHP pueda leer variables de entorno
    */

    // Habilitar CORS para aceptar solicitudes desde cualquier origen
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
    header("Access-Control-Allow-Headers: Content-Type, Authorization");
    header('Content-Type: application/json');

    // Cargar las variables de entorno desde el archivo .env
    require __DIR__ . '/../vendor/autoload.php';

    $dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../');
    $dotenv->load();

    echo 'HOST: ' . $_ENV['VITE_DB_HOST'];
exit;



    $servername = getenv('VITE_DB_HOST');
    $username = getenv('VITE_DB_USER');
    $password = getenv('VITE_DB_PASSWORD');
    $dbname = getenv('VITE_DB_NAME');

    // Verificar si las variables de entorno se cargaron correctamente
    file_put_contents(__DIR__ . '/../error_log.txt', "DB Host: " . $servername . PHP_EOL, FILE_APPEND);
    file_put_contents(__DIR__ . '/../error_log.txt', "DB User: " . $username . PHP_EOL, FILE_APPEND);
    file_put_contents(__DIR__ . '/../error_log.txt', "DB Password: " . $password . PHP_EOL, FILE_APPEND);
    file_put_contents(__DIR__ . '/../error_log.txt', "DB Name: " . $dbname . PHP_EOL, FILE_APPEND);

    // Verificar si el archivo se está ejecutando
    file_put_contents(__DIR__ . '/../error_log.txt', "El archivo db.php se está ejecutando" . PHP_EOL, FILE_APPEND);

    // Crear conexión
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Verificar conexión
    if ($conn->connect_error) {
        file_put_contents(__DIR__ . '/../error_log.txt', "Conexión fallida: " . $conn->connect_error . PHP_EOL, FILE_APPEND);
        die("Conexión fallida: " . $conn->connect_error);
    }

    // Si la conexión es exitosa
    file_put_contents(__DIR__ . '/../error_log.txt', "Conexión exitosa" . PHP_EOL, FILE_APPEND);

?>