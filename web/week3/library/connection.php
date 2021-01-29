<?php


function connectDB(){

  $parts = (parse_url(getenv('DATABASE_URL') ?: 'postgresql://username:password@localhost:5432/your_database_name_here'));
    extract($parts);
    $path = ltrim($path, "/");
    return new PDO("pgsql:host={$host};port={$port};dbname={$path}", $user, $pass);
}

//connectDB();
?>