<?php 

namespace App\Entity;

use App\Model\FilmModel;

class Film {
    public $id;
    public $titre;
    public $synopsis;
    public $date_sortie;
    public $realisateur_pre;
    public $realisateur_nom;
    public $realisateur_id;
    public $genres = [];
    public $actors = [];

    public function __construct(){
        $this->genres = FilmModel::getGenresByFilm($this->id);
        $this->titre = $this->titreTransform();
        $this->actors = FilmModel::getActors($this->id);
    }

    public function getRealisateur(){
        return \ucfirst($this->realisateur_pre).' '.\ucfirst($this->realisateur_nom);    
    }

    public function displayGenres(){
        $string = '';

        foreach($this->genres as $genre){
            if(end($this->genres) === $genre){
                $string .= ucfirst($genre['name']);
            } else {
                $string .= ucfirst($genre['name']).', ';
            }
        }

        return $string;
    }

    private function titreTransform(){
        $titre = '';
        $words = explode(' ', $this->titre);
        foreach($words as $word){
            if(end($words) === $word){
                $titre .= ucfirst($word);
            }else {
                $titre .= \ucfirst($word).' ';
            }
        }

        return $titre;
    }

    public function getDateFormat(){
        $date = new \DateTime($this->date_sortie);

        return $date->format('l, d F Y');
    }
}