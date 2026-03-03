<?php

// use PHPMailer\PHPMailer\PHPMailer;
// use PHPMailer\PHPMailer\Exception;

// require 'vendor/autoload.php';

$servername = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbname = "apk_web";

// Form input
$formUsername = $_POST['name'];
$email = $_POST['email'];
$description = $_POST['message'];

try {
  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $dbUsername, $dbPassword);
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  $sql = $conn->prepare("INSERT INTO orders (username, email, description) VALUES (:username, :email, :description)");
  $sql->bindParam(':username', $formUsername);
  $sql->bindParam(':email', $email);
  $sql->bindParam(':description', $description);

  $sql->execute();
  echo "Data inserted successfully";
} catch(PDOException $e) {
  echo "Error: " . $e->getMessage();
}

$conn = null;
?>
