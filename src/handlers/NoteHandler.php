<?php
namespace src\handlers;
use \src\models\Note;

class NoteHandler {
    public static function addNote ($idUser, $noteTittle, $noteBody) {
        $noteTittle = trim($noteTittle);
        $noteBody = trim($noteBody);
        if(!empty($idUser && !empty($noteTittle) && !empty($noteBody))) {
            Note::insert([
                'id_user'=> $idUser,
                'tittle' => $noteTittle,
                'body' => $noteBody,
                'created_at' => date('Y/m/d H:i:s')
            ])->execute();
        }
    }

    public static function getNotesUser ($idUser) {
        $noteConstult = Note::select()->where('id_user', $idUser)->get();
        $userNotes = [];
        if(!empty($noteConstult)) {
        
            foreach ($noteConstult as $itemNote) {
                $userNotes[] = $itemNote['id'];
            }

            $notesList = Note::select()->where('id', 'in', $userNotes)->orderBy('created_at' , 'desc')->get();

            $notes = [];

            foreach ($notesList as $note) {
                $newNote = new Note();
                $newNote->id = $note['id'];
                $newNote->tittle = $note['tittle'];
                $newNote->body = $note['body'];
                $newNote->created = $note['created_at']; 

                $notes[] = $newNote;
            }

            return $notes;
        }   
    }

    public static function getNote($id) {
        $note = Note::select()->where('id', $id)->one();
        return $note;
    }

    public static function updateNote($id, $tittle, $body) {
        if($id && $tittle && $body) {
            $newCreated = date('Y/m/d H:i:s');
            Note::update()
                ->set('tittle', $tittle)
                ->set('body', $body)
                ->set('created_at', $newCreated)
                ->where('id', $id)
                ->execute();
        }
    }

    public static function delNote($id) {
        if($id) {
            Note::delete()->where('id', $id)->execute();
        }
    }
}