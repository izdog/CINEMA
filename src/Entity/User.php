<?php
namespace App\Entity;

use App\Model\UserModel;
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
        return UserModel::getWhishes($this->id);
    }


}