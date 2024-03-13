<?php

namespace Interfaces;

interface IUser
{
    public function login($email, $password);
    public function logOut();
    public function changePassword($password, $confirmPassword);
    public function getUserById($userId);
    public function getUserByEmail($email);
    public function getAllUserStaff();
}