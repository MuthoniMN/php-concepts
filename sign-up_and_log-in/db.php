<?php
$host = 'localhost';
$username = 'root';
$password = '';
$database = 'users';

$connection = mysqli_connect($host, $username, $password, $database);

if ($connection) {
    echo "Connected to the database";
} else {
    echo "Connection error";
}
