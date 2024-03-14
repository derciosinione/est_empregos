<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>

<?php

include "displayMessageIfExists.php" ?>

<header>Member Detail</header>

<?php
    use Models\Users\UserModel;
    use Services\UserService;
    require_once '../../Services/UserService.php';

    require_once __DIR__ . "/../../Models/Users/UserModel.php";
    /** @var UserModel $loggedUser */

    if(isset($_SESSION['loggedUser'])){
        $loggedUser = unserialize($_SESSION['loggedUser']);

        echo "<h1>Logged User</h1>";
        echo "<h3>Email: $loggedUser->email</h3>";
        echo "<hr>";
    }

    if (isset($_GET['userId'])){
        $userId = $_GET['userId'];

        $userService = new UserService();
        $createdManager =  $userService->getUserById($userId);

        echo "Manager created successfully!<br>";
        echo "Manager ID: " . $createdManager->id . "<br>";
        echo "Manager Name: " . $createdManager->name . "<br>";
        echo "Manager Email: " . $createdManager->email . "<br>";
    }else{
        echo "<h1>Provide the user id to show details</h1>";
    }

?>

<div><a href="adminTest.php">Back</a></div> <br>
<a href="createMemberTest.php">Create Member</a>
</body>
</html>