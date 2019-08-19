<?php

namespace App;

class Auth {

    public function user(): ?Entity\User {

    }

    public function login(string $username, string $password): ?Entity\User {
        
        $user = Model\UserModel::getUser($username);

        if($user){
            if(password_verify($password, $user->password)){
                $_SESSION['auth'] = $user->id;
                return $user;
            }
        }

        return null;

    }
}