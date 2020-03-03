<?php

namespace app\controllers;

class SyliusCustomerController extends \yii\web\Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }

}
