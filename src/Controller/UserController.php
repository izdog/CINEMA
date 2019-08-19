<?php

namespace App\Controller;

use App\Model\UserModel;

class UserController extends Controller {

    public function profile(){
        $user = UserModel::getUser($_SESSION['auth']);
        $this->render('profile', compact('user'));
    }
}