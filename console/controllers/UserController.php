<?php

namespace console\controllers;

use common\models\User;
use yii\helpers\Console;

class UserController extends \yii\console\Controller
{
    public function actionCreateAdmin($name, $password, $email)
    {
        $user = new User();
        $user->username = $name;
        $user->email = $email;
        $user->status = User::STATUS_ACTIVE;
        $user->setPassword($password);
        $user->generateAuthKey();
        $user->generateEmailVerificationToken();
        if($user->save()){
            $this->stdout('admin user created', Console::FG_GREEN);
        }else{
            $this->stdout('could not create admin user', Console::FG_RED);
        }
        $this->stdout(PHP_EOL);
        return 1;
    }

    public function actionIndex()
    {
        $this->stdout('Usage: yii user/create-admin <name> <password> <email>' . PHP_EOL);
    }

}
