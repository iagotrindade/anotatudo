<?php
namespace src\handlers;
use \src\models\User;


class UserHandler {
    public static function updateUser($id, $newName, $newEmail, $newBirthday, $pass) {
        $user = User::select('password')->where('id', $id)->one();


        User::update()->set('name', $newName)->set('email', $newEmail)->set('birthday', $newBirthday)->where('id', $id)->execute();

    }
}
