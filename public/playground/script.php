<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');

$name = $_GET['name'] ?? $_POST['name'] ?? 'World';

echo 'Hello ' . $name . ' !';