<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>

<?php

include "displayMessageIfExists.php" ?>

<header>You are in Admin Painel</header>

<?php
use Models\Users\UserModel;

require_once __DIR__ . "/../../Models/Users/UserModel.php";
/** @var UserModel $loggedUser */

if(isset($_SESSION['loggedUser'])){
    $loggedUser = unserialize($_SESSION['loggedUser']);

    echo "<h1>Logged User</h1>";
    echo "<h3>Id: $loggedUser->id</h3>";
    echo "<h3>Email: $loggedUser->email</h3>";
    echo "<hr>";
}
?>
</body>
</html>