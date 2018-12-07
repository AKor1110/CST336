<?php
include "Connection.php";

$username = (isset($_POST["username"]) ? $_POST["username"] : null);
$password = (isset($_POST["password"]) ? $_POST["password"] : null); 
$dbConn = getDatabaseConnection("c9");


$namedParameters = array();
$namedParameters[":username"] = $username;
$namedParameters[":password"] = sha1($password);

$sql = "SELECT * FROM p10_users WHERE username = :username AND password = :password";

$stmt = $dbConn->prepare($sql);
$stmt->execute($namedParameters);

$records = $stmt->fetch(PDO::FETCH_ASSOC);

if (!empty($records)) {
    session_start();
    $_SESSION = array();
    $_SESSION["userId"] = $records["userId"];
    $_SESSION["username"] = $username;
    
    header("Location: quiz.php");
}

?>