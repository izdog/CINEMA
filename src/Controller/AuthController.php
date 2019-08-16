<?php

namespace App\Controller;

class AuthController extends Controller {

    public $errors;

    public function show() {
        $this->render('login');
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
                header('Location: profil.php');
                exit();
            } else {
                header('Location: login.php');
                exit();
            }
        }

    }

    public function logout(){
        if(isset($_SESSION['auth'])){
            session_start();
            session_destroy();
            header('Location: ../');
            exit();
        }
    }

    private function validateForm(array $data){
        $this->errors = [];

        if(!isset($data['username']) || empty($data['password'])){
            $this->errors['username'] = 'Le champs username est manquant';
        }

        if(!isset($data['username']) || empty($data['password'])){
            $this->errors['password'] = 'Le champs password est manquant';
        }
    }
}