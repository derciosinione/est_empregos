<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

use Services\UserService;
include '../../Services/UserService.php';

echo "<h1>Users</h1>";

$userService = new UserService();

foreach ($userService->getAllUserStaff() as $user){
    echo "User ID: " . $user->id . "<br>";
    echo "Name: " . $user->name . "<br>";
    echo "Email: " . $user->email . "<br>";
    echo "<hr>";
}

$myUserSearch = $userService->getUserById(1);

echo "search: ". $myUserSearch->email;


//if (isset($_POST['email'], $_POST['password'])){
//    $email = $_POST['email'];
//    $password = $_POST['password'];
//
//    if ($email!='derciosinione@gmail.com' || $password!='123456'){
////        header("../Test/loginTest.html");
//        echo "$email - $password - False";
//        return;
//    }
//
//    echo "$email - $password - False";
//
////    header("../Test/adminTest.html");
//}
//else{
//    echo "Provide email and password";
//}