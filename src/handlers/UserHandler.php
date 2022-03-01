<?php
namespace src\handlers;
use \src\models\User;


class UserHandler {
    public static function updateUser($id, $newName, $newEmail, $newBirthday, $pass) {
        $user = User::select()->where('id', $id)->one();

        if ($user) {
            if(password_verify($pass, $user['password'])) {
                User::update()->set('name', $newName)->set('email', $newEmail)->set('birthday', $newBirthday)->where('id', $id)->execute();
                return true;
            }
        }
        
        else {
            return false;
        }
    }
}
