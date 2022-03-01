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
        $this->render('/edituser', [
            'loggedUser' => $this->loggedUser
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

        if (UserHandler::updateUser($this->loggedUser->id, $newName, $newEmail, $newBirthday, $pass)) {
            $this->redirect('/');
        }

        else {
            $_SESSION['flash'] = 'A senha esta incorreta';
            $this->redirect('/edit_user');
        }
    }
}