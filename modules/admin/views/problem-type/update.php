<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\TypeOfProblem */

$this->title = 'Update Type Of Problem: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Type Of Problems', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->typeId]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="type-of-problem-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
