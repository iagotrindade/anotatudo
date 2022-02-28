<?php
namespace src\controllers;

use \core\Controller;
use \src\handlers\LoginHandler;
use \src\handlers\NoteHandler;

class HomeController extends Controller {
    private $loggedUser;

    public function __construct () {
        $this->loggedUser = LoginHandler::checkLogin();
        if ($this->loggedUser === false ) {
            $this->redirect('/login');
        }
    }

    public function index() {
        $notes = NoteHandler::getNotesUser(
            $this->loggedUser->id
        );

        $this->render('home', [
            'loggedUser' => $this->loggedUser,
            'notes' => $notes
        ]);
    }
}