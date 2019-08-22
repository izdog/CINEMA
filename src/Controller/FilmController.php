<?php

namespace App\Controller;

use App\Model\FilmModel;

class FilmController extends Controller {

    private const LIMIT_FILM = 6;

    public function home(){
        $this->render('home');
    }

    public function show(int $id){
        $film = FilmModel::getFilmById($id);
        $genres = FilmModel::getGenres();

        $this->render('film', compact('film', 'genres'));
    }

    public function films(int $page = 1){
        $nbPages = ceil(FilmModel::getNbFilms() / self::LIMIT_FILM);

        $offset = 0 ;

        if($page > $nbPages){
           $this->redirect('films');
        }

        if($page > 1){
            $offset = ($page - 1) * self::LIMIT_FILM;    
        }

        $films = FilmModel::getFilmsForPagination($offset, self::LIMIT_FILM);
        $genres = FilmModel::getGenres();

        $this->render('films', compact('films', 'genres', 'nbPages', 'page'));
    }
}