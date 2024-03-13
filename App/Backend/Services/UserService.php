<?php

namespace Services;

use Config\DbContext;
use Interfaces\IUser;
use Models\Users\UserModel;

require_once __DIR__ .'/../Interfaces/IUser.php';
require_once __DIR__ .'/../Config/DbContext.php';
require_once __DIR__ .'/../Models/Users/UserManagerModel.php';

class UserService implements IUser
{
    private $db;
    private $connection;

    public function __construct()
    {
        $this->db = new DbContext();
        $this->connection = $this->db->getConnection();
    }

    public function login($email, $password)
    {
//        $password = md5($password);
        $query = "SELECT Id, Email, UserName, PasswordHash FROM Users WHERE Email=? AND PasswordHash=?";

        $statement = $this->connection->prepare($query);
        $statement->bind_param("ss", $email, $password);

        $row = $this->db->executeSqlCommand($statement);

        if ($row==null) return null;

        return new UserModel($row["Id"], null, $row["Email"]);
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

    /**
     * Get all users from the database.
     *
     * @return UserModel[] Array of UserModel objects.
     */
    public function getAllUserStaff()
    {
        $users = [];
        $query = "SELECT * FROM Users";

        $data = $this->db->executeSqlQuery($query);

        if ($data==null) return $users;

        while ($row = $data) {
            $users[] = new UserModel($row["Id"],$row["Name"],$row["Email"]);
        }

        return $users;
    }


    /**
     * Get the user with provided id from the database.
     *
     * @return UserModel UserModel objects.
     */
    public function getUserById($userId)
    {
        $query = "SELECT * FROM Users WHERE Id = ?";

        $statement = $this->connection->prepare($query);
        $statement->bind_param("i", $userId);

        $row = $this->db->executeSqlCommand($statement);

        if ($row==null) return null;

        return new UserModel($row["Id"], $row["Name"], $row["Email"]);
    }

    /**
     * @param $email
     * @return UserModel|null
     */
    public function getUserByEmail($email)
    {
        $query = "SELECT * FROM Users WHERE Email = ?";
        $statement = $this->connection->prepare($query);
        $statement->bind_param("i", $email);

        $row = $this->db->executeSqlCommand($statement);

        if ($row==null) return null;

        $user = new UserModel($row["Id"], $row["Name"], $row["Email"]);
        $user->setPasswordHash($row["PasswordHash"]);
        return $user;
    }

}