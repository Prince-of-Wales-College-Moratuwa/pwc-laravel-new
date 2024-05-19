<?php

 // Database connection details
 $host = 'localhost';
 $dbname = 'pwc_db';
 $username = 'root';
 $password = '';

 // Attempt to connect to the database
 try {
     $connect = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
     $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 } catch(PDOException $e) {
     echo "Connection failed: " . $e->getMessage();
 }

 ?>