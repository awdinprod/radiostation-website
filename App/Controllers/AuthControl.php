<?php

namespace App\Controllers;

use App\Models\User;
use App\Repositories\UserRepo;

class AuthControl extends Controller
{
    public function findUserByToken($token)
    {
        $check = $this->repo->findByToken($token);
        if (!$check) {
            throw new \Exception("Wrong token");
        } else {
            return [$check['username'], $check['role']];
        }
    }

    public function __construct()
    {
        $this->repo = new UserRepo();
    }

}