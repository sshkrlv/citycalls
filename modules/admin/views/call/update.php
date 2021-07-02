<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Call */
/* @var $customers app\models\Customer */
/* @var $extraAttributes app\models\TypeOfProblem */

$this->title = 'Update Call: ' . $model->callId;
$this->params['breadcrumbs'][] = ['label' => 'Calls', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->callId, 'url' => ['view', 'id' => $model->callId]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="call-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'customers' => $customers,
        'extraAttributes' => $extraAttributes,
        //'modelTypes' => $modelTypes,
    ]) ?>

</div>
