<?php

namespace App\Controller;

use App\Model\FilmModel;

class FilmController extends Controller {

    public function home(){
        $this->render('home');
    }

    public function films(){
        $films = FilmModel::getFilms();
        $genres = FilmModel::getGenres();
        $this->render('films', compact('films', 'genres'));
    }
}