<?php
namespace src\controllers;

use \core\Controller;
use \src\handlers\LoginHandler;

class LoginController extends Controller {
    public function signin() {
        $flash = '';
        if(!empty($_SESSION['flash'])) {
            $flash = $_SESSION['flash'];
            $_SESSION['flash'] = '';
        }
        $this->render('signin', [
            'flash' => $flash
        ]);
    }

    public function signinAction() {
        $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
        $password = filter_input(INPUT_POST, 'password');
        
        if($email && $password) {
            $token = LoginHandler::verifyLogin($email, $password);
            if($token) {
                $_SESSION['token'] = $token;
                $this->redirect ('/');
            }

            else {
                $_SESSION['flash'] = "Email e/ou senha não conferem";
                $this->redirect ('/login');
            }
        }

        else {
            $_SESSION['flash'] = "Digite os campos de email e/ou senha!";
            $this->redirect('/login');
        }
    }

    public function signup() {
        $flash = '';
        if(!empty($_SESSION['flash'])) {
            $flash = $_SESSION['flash'];
            $_SESSION['flash'] = '';
        }
        $this->render('signup', [
            'flash' => $flash
        ]);
    }

    public function signupAction () {
        $name = filter_input(INPUT_POST, 'name');
        $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
        $password = filter_input(INPUT_POST, 'password');
        $birthday = filter_input(INPUT_POST, 'birthday');

        if($name && $email  && $password  && $birthday ) {
            $birthday = explode('/', $birthday);
            if(count($birthday) != 3) {
                $_SESSION['flash'] = 'Data de nascimento inválida';
                $this->redirect('/cadastro');
            }

            $birthday = $birthday[2].'-'.$birthday[1].'-'.$birthday[0];
            if(strtotime($birthday) === false) {
                $_SESSION['flash'] = 'Data de nascimento inválida';
                $this->redirect('/cadastro');
            }

            if(LoginHandler::emailExists($email) === false) {
                $token = LoginHandler::addUser($name, $email, $password, $birthday);
                $_SESSION['token'] = $token;
                $this->redirect('/');
            }

            else {
                $_SESSION['flash'] = "E-mail já cadastrado";
                $this->redirect('/cadastro');
            }
            
        }

        else {
            $this->redirect('/cadastro');
        }
    }

    public function logout() {
        $_SESSION['token'] = '';
        $this->redirect('/login');
    }
}