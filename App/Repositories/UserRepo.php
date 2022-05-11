<?php

namespace App\Repositories;

class UserRepo extends Repository
{
    /**
     * @throws \Exception
     */
    public function checkUser($username, $email)
    {
        $stm = $this->pdo->query("SELECT * FROM users WHERE username='$username' OR email='$email' LIMIT 1");
        return $stm->fetchAll();
    }

    public function signup($username, $email, $password, $token)
    {
        $sql = "INSERT INTO users (username, email, password, status, token) VALUES (?, ?, ?, ?, ?)";
        $stm = $this->pdo->prepare($sql);
        $stm->execute([$username, $email, md5($password), 'pending', $token]);
    }

    public function login($username)
    {
        $stm = $this->pdo->query("SELECT * FROM users WHERE username='$username' OR email='$username' LIMIT 1");
        return $stm->fetch();
    }

    public function findByToken($token)
    {
        $stm = $this->pdo->query("SELECT * FROM users WHERE token='$token' LIMIT 1");
        return $stm->fetch();
    }

    public function changePassword($password, $id)
    {
        $md5password = md5($password);
        $this->pdo->query("UPDATE users SET password='$md5password' WHERE user_id=$id");
    }

    public function changeUserData($username, $email, $id)
    {
        if ($username != "") {
            $this->pdo->query("UPDATE users SET username='$username' WHERE user_id=$id");
        }
        if ($email != "") {
            $this->pdo->query("UPDATE users SET email='$email' WHERE user_id=$id");
        }
    }

    public function checkConfirmation($token)
    {
        $user_checked = $this->findByToken($token);
        if (!empty($user_checked)) {
            $id = $user_checked['user_id'];
            $this->pdo->query("UPDATE users SET status='confirmed' WHERE user_id=$id");
        } else {
            throw new \Exception("Wrong token");
        }
    }

    public function checkEmail($email)
    {
        $stm = $this->pdo->query("SELECT * FROM users WHERE email='$email' LIMIT 1");
        return $stm->fetch();
    }

    public function __construct()
    {
        parent::__construct();
    }
}