<?php

$hostname = "localhost";
$username = "root";
$password = "";
$database = "pengaduan_masyarakat";

$conn = new mysqli($hostname, $username, $password, $database);

session_start();
