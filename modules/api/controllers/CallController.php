<?php
namespace app\modules\api\controllers;

use app\models\Call;
use yii\data\ActiveDataProvider;
use yii\rest\ActiveController;

class CallController extends ApiController
{

    

    public $modelClass = 'app\models\Call';

}
