<?php
$host = "localhost";
$dbname = "friendle";
$username = "root";
$password = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $wordle = $_POST['wordle'];
    $wordle_score = $_POST['wordle_score'];
    $wordle_nu