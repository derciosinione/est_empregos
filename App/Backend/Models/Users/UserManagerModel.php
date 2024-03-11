<?php

namespace Models\Users;

use Models\Constants;

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
        $this->name = $name;
        $this->email = $email;
        $this->phoneNumber = $phoneNumber;
        $this->birthDay = $birthDay;

        parent::__construct($name, $email, $phoneNumber, $birthDay, Constants::$managerId);
    }
}