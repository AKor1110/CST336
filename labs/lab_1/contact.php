<?php

$name = $_POST["name"];
$email = strtolower($_POST["email"]);
$address = $_POST["address"];
$phone = $_POST["name"];
$comments = $_POST["comments"];

$data = array($name, $email, $address, $phone, $comments);
$json = json_encode($data, JSON_NUMERIC_CHECK);

echo "<script> console.log($json); </script>";

header("location: contact.html");


?>
