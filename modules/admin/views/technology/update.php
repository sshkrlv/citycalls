<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Technology */

$this->title = 'Update Technology: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Technologies', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->technologyId]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="technology-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
