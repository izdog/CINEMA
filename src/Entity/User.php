<?php
namespace App\Entity;

class User {

    public $id;
    public $username;
    public $password;
    public $email;
    public $whishlist;

    public function __construct(){
        $this->whishlist = $this->getFilms();
    }

    private function getFilms(){
        $pdo = \App\App::getPDO();
        $stmt = 'SELECT people.prenom AS director_pre, people.nom AS director_nom, films.titre, films.synopsis, films.date_sortie, films.id
        FROM user 
        INNER JOIN whishlist ON user.id = whishlist.user_id
        INNER JOIN films ON whishlist.films_id = films.id
        INNER JOIN people ON films.realisateur_id = people.id
        WHERE user.id = :id;';
        $req = $pdo->prepare($stmt);
        $req->bindParam(':id', $this->id);
        $req->execute();

        return $req->fetchAll(\PDO::FETCH_ASSOC);

    }


}