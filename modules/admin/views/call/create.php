<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Call */
/* @var $modelTypes app\models\TypeOfProblem */
/* @var $customers app\models\Customer */
/* @var $extraAttributes \app\modules\admin\models\CallViewModel */

$this->title = 'Create Call';
$this->params['breadcrumbs'][] = ['label' => 'Calls', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="call-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'customers' => $customers,
        'extraAttributes' => $extraAttributes,
        //'modelTypes' => $modelTypes,
    ]) ?>

</div>
