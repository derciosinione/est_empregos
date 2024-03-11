<?php

namespace Interfaces;

interface IUser
{
    public function login();
    public function logOut();
    public function changePassword();
    public function getUserById();
}