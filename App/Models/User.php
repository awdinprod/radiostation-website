<?php

namespace App\Models;

class User extends Model
{
    protected $username;
    protected $email;
    protected $password;
    protected $role;
    protected $token;

    public function getUsername()
    {
        return $this->username;
    }

    public function getRole()
    {
        return $this->role;
    }

    public function __construct($user)
    {
        $this->id = $user['user_id'];
        $this->username = $user['username'];
        $this->email = $user['email'];
        $this->password = $user['password'];
        $this->role = $user['role'];
        $this->token = $user['token'];
    }
}
