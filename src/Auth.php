<?php

namespace App;

class Auth {

    public function user(): ?Entity\User {

    }

    public function login(string $username, string $password): ?Entity\User {
        $stmt = ('SELECT * FROM user WHERE username = :username OR email = :username');
        $req = App::getPDO()->prepare($stmt);
        $req->execute(['username' => $username]);
        $user = $req->fetchObject('App\Entity\User');
        if($user){
            if(password_verify($password, $user->password)){
                session_start();
                $_SESSION['auth'] = $user->id;
                return $user;
            }
        }

        return null;
    }
}