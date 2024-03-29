<?php

namespace Models\Users;

use Models\Constants;
require_once __DIR__ .'/../Users/UserModel.php';


class UserAdminModel extends UserModel
{
    /**
     * @param $name
     * @param $email
     * @param $phoneNumber
     * @param $birthDay
     */
    public function __construct($name, $email, $phoneNumber, $birthDay)
    {
        $this->name = $name;
        $this->email = $email;
        $this->phoneNumber = $phoneNumber;
        $this->birthDay = $birthDay;

        parent::__construct($name, $email, $phoneNumber, $birthDay, Constants::$adminId);
    }
}