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

        // dump($user);
        if($user){
            return $user; 
        }

        return null;
    }

    public static function getWhishes(int $userId) {
        $stmt = 'SELECT people.prenom AS director_pre, people.nom AS director_nom, films.titre, films.synopsis, films.date_sortie, films.id
        FROM user 
        INNER JOIN whishlist ON user.id = whishlist.user_id
        INNER JOIN films ON whishlist.films_id = films.id
        INNER JOIN people ON films.realisateur_id = people.id
        WHERE user.id = :user_id;';

        $req = \App\App::getPDO()->prepare($stmt);
        $req->execute(['user_id' => $userId]);

        return $req->fetchAll(\PDO::FETCH_ASSOC);
    }

    public static function addWhish(int $userId, int $filmId){
        $stmt = 'INSERT INTO whishlist SET whislist.user_id = :user_id, whislist.film_id = :film_id';
        $req = \App\App::getPDO()->prepare($stmt);
        $req->execute([
            'user_id' => $userId,
            'film_id' => $filmId
        ]);
    }

    public static function removeWhish(int $userId, int $filmId){
        $stmt = 'DELETE FROM whishlist WHERE whishlist.user_id = :user_id AND whishlist.film_id = :film_id';
        $req = \App\App::getPDO()->prepare($stmt);
        $req->execute([
            'user_id' => $userId,
            'film_id' => $filmId
        ]);
    }
}