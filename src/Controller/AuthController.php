<?php

namespace App\Controller;

class AuthController extends Controller {

    public $errors;

    public function show() {
        if(!isset($_SESSION['auth'])){
            $this->render('login');
        } else {
            header('Location: profil');
            exit();
        }
        
    }

    public function login(){
        $this->validateForm($_POST);

        if(count($this->errors) > 0){
            $errors = $this->errors;
            $this->render('login', compact('errors'));
        } else {
            $auth = new \App\Auth();
            $user = $auth->login($_POST['username'], $_POST['password']);
        
            if($user){
                header('Location: profil');
                exit();
            } else {
                header('Location: login');
                exit();
            }
        }

    }

    public function logout(){
        if(isset($_SESSION['auth'])){
            session_start();
            session_destroy();
            header('Location: login');
            exit();
        }
    }

    private function validateForm(array $data){
        $this->errors = [];

        if(!isset($data['username']) || empty($data['username'])){
            $this->errors['username'] = 'Le champs username est manquant';
        }

        if(!isset($data['password']) || empty($data['password'])){
            $this->errors['password'] = 'Le champs password est manquant';
        }
    }
}