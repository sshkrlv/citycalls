<?php

namespace app\widgets;

use app\models\Customer;
use yii\base\Widget;
use yii\helpers\Html;
use app\models\Call;

class CallCard extends \yii\base\Widget
{

    public $callName;
    public $briefDescription;
    public $customer;
    public $model = [];

    public function init()
    {
        parent::init(); // TODO: Change the autogenerated stub
        $this->customer = Customer::findOne($this->customer)->brandName;
        //$this->model->customer = Customer::findOne($this->model->customer)->brandName;
    }

    public function run()
    {
        return $this->render('callcard', [
            'callName' => $this->callName, 'briefDescription' => $this->briefDescription, 'customer' => $this->customer,
        ]);
    }

}