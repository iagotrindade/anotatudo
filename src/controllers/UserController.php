<?php
namespace src\controllers;

use \core\Controller;
use src\controllers\HomeController;
use \src\handlers\LoginHandler;
use \src\handlers\UserHandler;

class UserController extends Controller {
    public function __construct () {
        $this->loggedUser = LoginHandler::checkLogin();
        if ($this->loggedUser === false ) {
            $this->redirect('/login');
        }
    }

    public function getUser() {
        $userBirthday = $this->loggedUser->birthday;

        $userBirthday = explode('-', $this->loggedUser->birthday);
        $userBirthday = $userBirthday[2] . $userBirthday[1] . $userBirthday[0];

        $this->loggedUser->birthday = $userBirthday;

        $this->render('/edituser', [
            'loggedUser' => $this->loggedUser,
            'userBirthday' => $userBirthday
        ]); 
    }

    public function update($id) {
        $newName = filter_input(INPUT_POST, 'newName');
        $newEmail = filter_input(INPUT_POST, 'newEmail');
        $newBirthday = filter_input(INPUT_POST, 'newBirthday');
        $pass = filter_input(INPUT_POST, 'password');

        $newBirthday = explode('/', $newBirthday);

        if(count($newBirthday) != 3) {
            $_SESSION['flash'] = 'Data de nascimento inválida';
            $this->redirect('/edit_user');
        }

        $newBirthday = $newBirthday[2].'-'.$newBirthday[1].'-'.$newBirthday[0];
        if(strtotime($newBirthday) === false) {
            $_SESSION['flash'] = 'Data de nascimento inválida';
            $this->redirect('/edit_user');
        }

        $verify = UserHandler::updateUser($this->loggedUser->id, $newName, $newEmail, $newBirthday, $pass);

        if ($verify === true) {
            $this->redirect('/');
        }

        else {
            $this->redirect('/edit_user');
        }
        
        
            
    }
}