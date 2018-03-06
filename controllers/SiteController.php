<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\SignUp;
use app\models\Login;

/**
 * Class SiteController
 * @package app\controllers
 */
class SiteController extends Controller
{
    /**
     * @return string
     */
    public function actionIndex()
    {
        if (Yii::$app->user->isGuest) {
            return $this->redirect(['/site/login']);
        }

        return $this->render('index');
    }

    /**
     * @return string|\yii\web\Response
     */
    public function actionSignup()
    {
        $signUp = new SignUp();

        if (Yii::$app->request->post('SignUp')) {
            $signUp->attributes = Yii::$app->request->post('SignUp');

            if ($signUp->validate()) {
                $signUp->signUp();
                Yii::$app->user->login($signUp->getUser());

                return $this->goHome();
            }
        }

        return $this->render('signup', ['signUpModel' => $signUp]);
    }

    /**
     * @return string|\yii\web\Response
     */
    public function actionLogin()
    {
        $login = new Login();
        if (Yii::$app->request->post('Login')) {
            $login->attributes = Yii::$app->request->post('Login');

            if ($login->validate()) {
                Yii::$app->user->login($login->getUser());

                return $this->goHome();
            }
        }

        return $this->render('login', ['loginModel' => $login]);
    }

    /**
     * @return \yii\web\Response
     */
    public function actionLogout()
    {
        if (!Yii::$app->user->isGuest) {
            Yii::$app->user->logout();

            return $this->redirect(['login']);
        }
    }
}
