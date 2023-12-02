<?php
require_once("../classes/classes.php");

class UserDB extends Dbh
{

    public function getUsers()
    {
        // not with prepared statement
        $sql = "SELECT * FROM users";
        $stmt = $this->connect()->query($sql);
        return $stmt;
    }


    public function getUsersStmt($email)
    {
        // with prepared statement
        $sql = "SELECT * FROM users WHERE Email = :email";
        $stmt = $this->connect()->prepare($sql);
        $stmt->bindParam(':email', $email);

        $stmt->execute();
        $result = $stmt->fetchAll();

        foreach ($result as $name) {
            return $name['Id'];
        }
    }
    public function getUsersId($id)
    {
        // with prepared statement
        $sql = "SELECT * FROM users WHERE Id = :id";
        $stmt = $this->connect()->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();

        $result = $stmt->fetch();
        return $result;
    }

    public function getUsersEmail($email)
    {
        // with prepared statement
        $sql = "SELECT * FROM users WHERE Email = :email";
        $stmt = $this->connect()->prepare($sql);
        $stmt->bindParam(':email', $email);
        $stmt->execute();

        $result = $stmt->fetch();
        return $result;
    }

    public function setUsersStmt($name, $email, $number, $password)
    {
        $sql = "INSERT INTO users(Name, Email, Number, Password, Type) VALUES (:name,:email,:number,:password,'MEMBER')";
        $stmt = $this->connect()->prepare($sql);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':number', $number);
        $stmt->bindParam(':password', $password);

        $stmt->execute();
    }

    public function DeleteUser($Id)
    {
        $sql = "DELETE FROM users WHERE Id = :Id";
        $stmt = $this->connect()->prepare($sql);

        $stmt->bindParam(':Id', $Id);
        $stmt->execute();

    }


    public function UpdateUser($Id, $Name, $Email, $Number, $Password, $blob)
    {
        $sql = "UPDATE users SET Name = :Name, Email = :Email, Number = :Number, Password = :Password, Image = :image WHERE Id = :Id ";
        $stmt = $this->connect()->prepare($sql);
        $stmt->bindParam(':Name', $Name);
        $stmt->bindParam(':Email', $Email);
        $stmt->bindParam(':Number', $Number);
        $stmt->bindParam(':Password', $Password);
        $stmt->bindParam(':Id', $Id);
        $stmt->bindParam(':image', $blob, PDO::PARAM_LOB);


        $stmt->execute();

    }

    public function UpdateLoggedUser($Id, $Name, $Email, $Password, $blob)
    {
        $sql = "UPDATE users SET Name = :Name, Email = :Email, Password = :Password, Image = :image WHERE Id = :Id ";
        $stmt = $this->connect()->prepare($sql);
        $stmt->bindParam(':Name', $Name);
        $stmt->bindParam(':Email', $Email);
        $stmt->bindParam(':Password', $Password);
        $stmt->bindParam(':Id', $Id);
        $stmt->bindParam(':image', $blob, PDO::PARAM_LOB);


        $stmt->execute();

    }


    public function LogInUser(string $email, string $password): bool
    {
        $sql = "SELECT * FROM users WHERE Email=:email and Password=:password ";
        $stmt = $this->connect()->prepare($sql);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password', $password);

        $stmt->execute();

        $num_of_rows = $stmt->rowCount();

        $stmt->bindColumn('Id', $id);
        $stmt->bindColumn('Type', $type);
        $stmt->fetch(PDO::FETCH_BOUND);

        if ($num_of_rows == 1) {
            $_SESSION["loggedin"] = true;
            $_SESSION["email"] = $email;
            $_SESSION["id"] = $id;
            $_SESSION["type"] = $type;
            return true;
        }
        return false;
    }
}
