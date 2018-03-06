<?php

namespace app\models;

/**
 * Class Signup
 * @package app\models
 */
class SignUp extends AuthBase
{
    /**
     * @return array
     */
    public function rules()
    {
        return [
            [['email', 'password', 'username'], 'required'],
            ['email', 'email'],
            ['email', 'unique', 'targetClass' => 'app\models\User'],
            ['password', 'string', 'min' => 6, 'max' => 20]
        ];
    }

    /**
     * @return bool
     */
    public function signUp()
    {
        $user = new User();

        $user->email = $this->email;
        $user->password = password_hash($this->password, PASSWORD_DEFAULT);
        $user->username = $this->username;

        return $user->save();
    }
}
