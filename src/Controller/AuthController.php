<?php

namespace App\Controller;

class AuthController extends Controller {

    public $errors;

    public function show() {
        if(!isset($_SESSION['auth'])){
            $this->render('login');
        } else {
            $this->redirect('profil');
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
                $this->redirect('profil');
            } else {
                $this->redirect('login');
            }
        }

    }

    public function logout(){
        if(isset($_SESSION['auth'])){
            session_start();
            session_destroy();
            $this->redirect('login');
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