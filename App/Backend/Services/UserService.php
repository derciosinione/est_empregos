<?php

namespace Services;

use Interfaces\IUser;
use Models\Users\UserManagerModel;

class UserService implements IUser
{

    public function login($email, $password)
    {
        // TODO: Implement login() method.
    }

    public function logOut()
    {
        // TODO: Implement logOut() method.
    }

    public function changePassword($password, $confirmPassword)
    {
        if ($password!=$confirmPassword) return false;

        //TODO: Implementar codigo de alteracao da senha no banco de dados
        return true;
    }


    public function getAllUserStaff()
    {
        $userAdmin = new UserManagerModel("dercio", "derds@gmail.com", "12344", "12/04/2000");
        $userManager1 = new UserManagerModel("manager1", "derds@gmail.com", "12344", "12/04/2000");
        $userManager2 = new UserManagerModel("maneger2", "derds@gmail.com", "12344", "12/04/2000");
        $userManager3 = new UserManagerModel("manager3", "derds@gmail.com", "12344", "12/04/2000");

        return [$userAdmin, $userManager1, $userManager2, $userManager3];
    }

    public function getUserById($userId)
    {
        return new UserManagerModel("dercio", "derds@gmail.com", "12344", "12/04/2000");
    }
}