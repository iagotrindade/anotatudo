<?php
namespace src\controllers;

use \core\Controller;
use src\controllers\HomeController;
use \src\handlers\LoginHandler;
use \src\handlers\NoteHandler;

class NoteController extends Controller {
    public $loggedUser;

    public function __construct () {
        $this->loggedUser = LoginHandler::checkLogin();
        if ($this->loggedUser === false ) {
            $this->redirect('/login');
        }
    }

    public function newNote() {
        $this->render('newnote', [
            'loggedUser' => $this->loggedUser
        ]);
    }

    public function addNote() {
        $user = new HomeController();
        $noteTittle = filter_input(INPUT_POST, 'tittle');
        $noteBody = filter_input(INPUT_POST, 'body');

        if ($noteTittle && $noteBody) {
            NoteHandler::addNote(
                $this->loggedUser->id,
                $noteTittle,
                $noteBody);
        }

        $this->redirect('/');
    }

    public function editNote($id) {
        $note = NoteHandler::getNote($id); {
            
        };

        $this->render('editnote', [
            'loggedUser' => $this->loggedUser,
            'note' => $note
        ]);
    }

    public function updateNote($id) {
        $newNoteTittle = filter_input(INPUT_POST, 'newTittle');
        $newNoteBody = filter_input(INPUT_POST, 'newBody');
        $update = NoteHandler::updateNote($id, $newNoteTittle, $newNoteBody); {

        }

        $this->redirect('/');
    }

    public function delNote($id) {
        NoteHandler::delNote($id); {
            
        }

        $this->redirect('/');
    }
}