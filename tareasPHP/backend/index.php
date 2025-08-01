<?php

    // Mostrar el contenido de las variables de entorno
    echo "VITE_API_URL: " . getenv('VITE_API_URL') . "\n";
    echo "VITE_REDIRECT_URL: " . getenv('VITE_REDIRECT_URL') . "\n";
    echo "VITE_DB_HOST: " . getenv('VITE_DB_HOST') . "\n";
    echo "VITE_DB_USER: " . getenv('VITE_DB_USER') . "\n";
    echo "VITE_DB_PASSWORD: " . getenv('VITE_DB_PASSWORD') . "\n";
    echo "VITE_DB_NAME: " . getenv('VITE_DB_NAME') . "\n";
    echo "MYSQL_ROOT_PASSWORD: " . getenv('MYSQL_ROOT_PASSWORD') . "\n";
    echo "MYSQL_DATABASE: " . getenv('MYSQL_DATABASE') . "\n";
    
    // index.php. Fue oblitario crearlo para subir el crud a Render
    echo "Backend is running";
?>
