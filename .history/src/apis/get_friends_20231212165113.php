<?php
$host = "localhost";
$dbname = "friendle";
$username = "root";
$password = "";

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $conn = new mysqli($host, $username, $password, $dbname);
    