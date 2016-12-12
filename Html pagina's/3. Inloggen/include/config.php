<?php
session_start();

// Connection to our db.
try {
  $pdo = new PDO('mysql:host=localhost;dbname=engrave', 'root', '', array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}

// Catch db connection errors.
catch(PDOException $e) {
  echo $e->getMessage();
  die();
}

// Include all.
require 'global.php';
require 'cookies.php';
require 'functions.php';
require 'template.php';

 ?>
