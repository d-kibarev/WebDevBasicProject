<?php

class AccountModel extends BaseModel{

    public function register($username, $password){
        $statement = self::$db->prepare(
            "SELECT COUNT(Id)FROM users WHERE username = ?");
        $statement->bind_param("s", $username);
        $statement->execute();
        $result = $statement->get_result()->fetch_assoc();
        if($result["COUNT(Id)"]) {
            return false;
        }

        $hashPass = password_hash($password, PASSWORD_BCRYPT);

        $registerStatement = self::$db->prepare( "INSERT INTO users (username, password, email) VALUES (?, ?, '')" );
        $registerStatement->bind_param("ss", $username, $hashPass);
        $registerStatement->execute();

        return true;
    }

    public function login($username, $password){
        $statement = self::$db->prepare(
            "SELECT * FROM users WHERE username = ?");
        $statement->bind_param("s", $username);
        $statement->execute();
        $result = $statement->get_result()->fetch_assoc();

        if(password_verify($password, $result["password"])){
            return true;
        }
            return false;
    }

    public function getUserId($username){
        $statement = self::$db->prepare(
            "SELECT id FROM users WHERE username = ?");
        $statement->bind_param("s", $username);
        $statement->execute();
        $result = $statement->get_result()->fetch_assoc();

        $_SESSION['user-id'] = $result['id'];
    }

    public function getProfile($user_id){
        $statement = self::$db->prepare(
            "SELECT username, email FROM users WHERE id = ?");
        $statement->bind_param("i", $user_id);
        $statement->execute();
        $result = $statement->get_result()->fetch_assoc();
        return $result;
    }
}