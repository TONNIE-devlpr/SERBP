<?php

$host = "localhost";
$port="5432";
$user = "postgres";
$password = "Tonnie****2001";
$dbname = "e-waste_db";

$conn = pg_connect("host=$host port=$port dbname=$dbname user=$user password=$password");
 if (!$conn) {
    die("Connection failed: " . pg_last_error());
}

?>