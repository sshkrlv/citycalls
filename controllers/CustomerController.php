<?php

namespace app\controllers;
use yii\rest\ActiveController;

class CustomerController extends ActiveController
{

    public function beforeAction($action)
    {
        header('Access-Control-Allow-Origin: *');
        return parent::beforeAction($action); // TODO: Change the autogenerated stub
    }

    public $modelClass = 'app\models\Customer';
}