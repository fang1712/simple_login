<?php

Class User{
    private $db;
    }
    public function_construct($db){
        $this->db = $db;
    }

    public function login($email, $password){
        $sql ="SELECT * FROM user WHERE email = :email";
        $stmt =$this->db->prepare($sql);
        $stmt ->blindParam(':email', $email);
        $stmt->execute();
        $user = $stmt->fetch();

    if($user  && password_verify($password, $user ['password'])){
        $SESSION['user_id'] = $user['id'];
        return $user;
    }
    return false;

    public function register($name, $email, $password){
        $sql = "INSERT INTO user (name, email, password) VALUE (:name, :email, :password)"
        $stmt = $this->db->prepare($sql);
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        $stmt->blindParam(':name', $name);
        $stmt->blindParam(':email', $email);
        $stmt->blindParam(':password', $hashed_password);
        return $stmt->execute();
    }
}
?>