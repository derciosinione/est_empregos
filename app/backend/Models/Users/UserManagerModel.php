<?php

namespace Models\Users;

use Models\Constants;

require_once __DIR__ .'/../Users/UserModel.php';


class UserManagerModel extends UserModel
{
    /**
     * @param $name
     * @param $email
     * @param $phoneNumber
     * @param $birthDay
     */
    public function __construct($name, $email, $phoneNumber, $birthDay)
    {
        parent::__construct($name, $email, $phoneNumber, $birthDay, Constants::$managerId);
    }
}