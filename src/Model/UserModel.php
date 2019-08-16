<?php

namespace App\Model;

class UserModel {

    /**
     * @tag can be username, email, id
     * @return null or User
     */
    public static function getUser($tag): ?\App\Entity\User {

        if(is_numeric($tag)){
            $stmt = ('SELECT * FROM user WHERE id = :tag');
        }else {
            $stmt = ('SELECT * FROM user WHERE username = :tag OR email = :tag');
        }
        
        $req = \App\App::getPDO()->prepare($stmt);
        $req->execute(['tag' => $tag]);
        $user = $req->fetchObject('\App\Entity\User');

        dump($user);
        if($user){
            return $user; 
        }

        return null;
    }
}