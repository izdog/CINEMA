<?php

namespace App;

class Auth {

    public function user(): ?Entity\User {

    }

    public function login(string $username, string $password): ?Entity\User {
        
        $user = Model\UserModel::getUser($username);

        if($user){
            if(password_verify($password, $user->password)){
                if(session_status() === PHP_SESSION_NONE){
                    session_start();
                }
                $_SESSION['auth'] = $user->id;
                return $user;
            }
        }

        return null;

    }
}