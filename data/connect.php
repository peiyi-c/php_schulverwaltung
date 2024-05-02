<?php
// https://www.w3schools.com/php/php_mysql_connect.asp
function connect()
{
  $servername = 'localhost';
  $username = 'root';
  $password = '';
  $dbname = 'schulverwaltung';

  $dsn = "mysql:host=$servername;dbname=$dbname";

  try {
    // connect to database and return database object
    $conn = new PDO($dsn, $username, $password);
    // echo "Connected successfully";
    return $conn;
  } catch (Exception $e) {
    // if error is thrown, catch it, echo the message, then exit
    echo "Connection failed: " . $e->getMessage();
  }
}
