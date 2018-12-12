<?php

session_start();

include "../inc/Connection.php";

$dbConn = getDatabaseConnection("c9");

$loginType = $_POST["login"];

print_r($_POST);

if ($loginType == "Continue As Guest") {
    header("Location: guest.php");
}

$username = $_POST["username"];
$password = sha1($_POST["password"]);

$sql = "SELECT * FROM final_admin WHERE username = :username AND password = :password";

$namedParameters = array();
$namedParameters[":username"] = $username;
$namedParameters[":password"] = $password;

$stmt = $dbConn->prepare($sql);
$stmt->execute($namedParameters);
$record = $stmt->fetch(PDO::FETCH_ASSOC);

if (empty($record)) {
    $_SESSION['failedLogin'] = true;
    header('Location: ../index.php');
} else {
   $_SESSION['adminFullName'] = $record['firstName'] .  "   "  . $record['lastName'];
   header('Location: admin.php');
}

?>