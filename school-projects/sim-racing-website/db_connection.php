<?php
// Database connection details
$host = 'localhost'; // Change if necessary
$dbname = 'db_timelap'; // Use the new database name
$username = 'root'; // Default username for phpMyAdmin
$password = ''; // Default password for phpMyAdmin

try {
    // Create a PDO connection
    $db = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}
?>