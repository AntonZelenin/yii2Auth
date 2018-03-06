<?php

namespace app\models;

/**
 * Class Login
 * @package app\models
 */
class Login extends AuthBase
{
    /**
     * @return array
     */
    public function rules()
    {
        return [
            [['email','password'],'required'],
            ['email','email'],
            ['password','validatePassword']
        ];
    }

    /**
     * @return bool
     */
    public function validatePassword($attribute, $params)
    {
        if(!$this->hasErrors()) // если нет ошибок в валидации
        {
            $user = User::findOne(['email' => $this->email]);

            if (!$user || !password_verify($this->password, $user->password)) {
//            if (!$user || $this->password != $user->password) {
                $this->addError($attribute, 'Пароль или имейл введены неверно');
            }
        }
    }
}
