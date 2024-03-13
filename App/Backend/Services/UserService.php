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
    private $connection;

    public function __construct()
    {
        $db = new DbContext();
        $this->connection = $db->getConnection();
    }

    public function login($email, $password)
    {
        $query = "SELECT Id, Email, UserName, PasswordHash FROM Users WHERE Email=? AND PasswordHash=?";

        $statement = $this->connection->prepare($query);
        $statement->bind_param("ss", $email, $password);

        $statement->execute();

        $result = $statement->get_result();

        if (!$result || $result->num_rows == 0)
            return null;

        $row = $result->fetch_assoc();

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
        $result = $this->connection->query($query);

        if (!$result){
            echo "Error: " . $this->connection->error;
            return [];
        }

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $users[] = new UserModel($row["Id"],$row["Name"],$row["Email"]);
            }
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

        $statement->execute();

        $result = $statement->get_result();

        if (!$result || $result->num_rows == 0)
            return null;

        $row = $result->fetch_assoc();

        return new UserModel($row["Id"], $row["Name"], $row["Email"]);
    }

    /**
     * @param $userId
     * @return UserModel
     */
    public function getUserByEmail($email)
    {
        $query = "SELECT * FROM Users WHERE Id = ?";

        $statement = $this->connection->prepare($query);
        $statement->bind_param("i", $email);

        $statement->execute();

        $result = $statement->get_result();

        if (!$result || $result->num_rows == 0)
            return null;

        $row = $result->fetch_assoc();

        $user = new UserModel($row["Id"], $row["Name"], $row["Email"]);
        $user->setPasswordHash($row["PasswordHash"]);
        return $user;
    }
}