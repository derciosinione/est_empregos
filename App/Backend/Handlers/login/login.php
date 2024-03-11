<?php

if (isset($_POST['email'], $_POST['password'])){
    $email = $_POST['email'];
    $password = $_POST['password'];

    if ($email!='derciosinione@gmail.com' || $password!='123456'){
//        header("../Test/loginTest.html");
        echo "$email - $password - False";
        return;
    }

    echo "$email - $password - False";

//    header("../Test/adminTest.html");
}
else{
    echo "Provide email and password";
}