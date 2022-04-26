<?php

namespace App\Repositories;

use App\Mailer\Mailer;
use App\Models\User;

class UserRepo extends Repository
{
    /**
     * @throws \Exception
     */
    public function signup($username, $email, $password, $conf_password)
    {
        if (empty($username)) {
            throw new \Exception("Username is required");
        }
        if (empty($password)) {
            throw new \Exception("Password is required");
        }
        if ($password != $conf_password) {
            throw new \Exception("Passwords do not match");
        }

        $stm = $this->pdo->query("SELECT * FROM users WHERE username='$username' OR email='$email' LIMIT 1");
        $found = $stm->fetchAll();
        if (!empty($found)) {
            throw new \Exception("User already exists");
        }

        $token = md5($email . date("Y-m-d H:i:s"));

        $sql = "INSERT INTO users (username, email, password, status, token) VALUES (?, ?, ?, ?, ?)";
        $stm = $this->pdo->prepare($sql);
        $stm->execute([$username, $email, md5($password), 'pending', $token]);

        $mail = new Mailer();
        $mail->sendConfirmationMail($email, $token);

        return $token;
    }

    public function login($username, $password)
    {
        $stm = $this->pdo->query("SELECT * FROM users WHERE username='$username' OR email='$username' LIMIT 1");
        $found = $stm->fetch();
        if (!$found) {
            throw new \Exception("User not found");
        }
        if ($found['status'] == "pending") {
            throw new \Exception("Confirm email!");
        }
        if ($found['password'] == md5($password)) {
            $user = new User($found);
        } else {
            throw new \Exception("User not found");
        }

        return $user;
    }

    public function checkConfirmation($token)
    {
        $stm = $this->pdo->query("SELECT * FROM users WHERE token='$token' LIMIT 1");
        $user_checked = $stm->fetch();
        if (!empty($user_checked)) {
            $id = $user_checked['user_id'];
            $this->pdo->query("UPDATE users SET status='confirmed' WHERE user_id=$id");
        } else {
            throw new \Exception("Wrong token");
        }
    }

    public function __construct()
    {
        parent::__construct();
    }
}