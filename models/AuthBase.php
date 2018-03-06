<?php

namespace app\models;

/**
 * Class AuthBase
 * @package app\models
 */
class AuthBase extends \yii\base\Model
{
    /**
     * @var string
     */
    public $email;

    /**
     * @var string
     */
    public $password;

    /**
     * @var string
     */
    public $username;

    /**
     * @return null|static
     */
    public function getUser()
    {
        return User::findOne(['email' => $this->email]);
    }
}
