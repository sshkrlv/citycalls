<?php


namespace app\modules\api\controllers;


class ApiController extends \yii\rest\ActiveController
{
    public function beforeAction($action) //костыль для обхода CORS
    {
        header('Access-Control-Allow-Origin: *');
        return parent::beforeAction($action); // TODO: Change the autogenerated stub
    }
}