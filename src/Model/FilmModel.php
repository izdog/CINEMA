<?php

namespace App\Model;

class FilmModel {

    public static function getFilmById(){

    }

    public static function getFilms(){
        $stmt = 'SELECT people.prenom AS realisateur_pre, people.nom AS realisateur_nom, films.titre, films.synopsis, films.date_sortie, films.id, realisateur_id
        FROM films
        INNER JOIN people ON films.realisateur_id = people.id;';

        $req = \App\App::getPDO()->query($stmt);
        $req->execute();
        
        return $req->fetchAll(\PDO::FETCH_CLASS, '\App\Entity\Film');
    }

    public static function getFilmsByGenre(){

    }

    public static function getNbFilms(){
        $stmt = 'SELECT COUNT(films.id) AS nbFilms FROM films';
        $req = \App\App::getPDO()->query($stmt);

        $nbFilms = $req->fetch(\PDO::FETCH_ASSOC);

        return $nbFilms['nbFilms'];
    }

    public static function getFilmsForPagination(int $offset, int $limit){
        $stmt = 'SELECT films.titre, films.id 
        FROM films LIMIT :limit OFFSET :offset';
       
        $req = \App\App::getPDO()->prepare($stmt);

        $req->bindParam('limit', $limit, \PDO::PARAM_INT);
        $req->bindParam('offset', $offset, \PDO::PARAM_INT);

        $req->execute();

        return $req->fetchAll(\PDO::FETCH_CLASS, '\App\Entity\Film');
    }

    public static function getGenresByFilm(int $filmId){
        $stmt = 'SELECT genre.id, genre.name 
        FROM films 
        INNER JOIN genre_assoc ON films.id = genre_assoc.films_id 
        INNER JOIN genre ON genre_assoc.genre_id = genre.id 
        WHERE films.id = :film_id
        ORDER BY genre.name ASC';

        $req = \App\App::getPDO()->prepare($stmt);
        $req->execute(['film_id' => $filmId]);

        return $req->fetchAll(\PDO::FETCH_ASSOC);
    }

    public static function getGenres(){
        $stmt = 'SELECT genre.id, genre.name FROM genre ORDER BY genre.name ASC;';
        $req = \App\App::getPDO()->query($stmt);

        $req->execute();

        return $req->fetchAll(\PDO::FETCH_ASSOC);
    }

}