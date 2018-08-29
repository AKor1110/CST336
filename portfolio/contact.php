<?php

$name = $_POST["name"];
$email = $_POST["email"];
$address = $_POST["address"];
$phone = $_POST["name"];
$comments = $_POST["comments"];

$data = array($name, $email, $address, $phone, $comments);

echo json_encode($data, JSON_NUMERIC_CHECK);

?>
