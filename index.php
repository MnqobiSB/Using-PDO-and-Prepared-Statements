<?php
  try {
    //Connect to DB
    $dbh = new PDO('mysql:host=localhost; dbname=company; charset=utf8', 'root', '');
  } catch (PDOException $e) {
    //Display Errors
    echo $e->getMessage();
  }
?>