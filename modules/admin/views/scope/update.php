<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Scope */

$this->title = 'Update Scope: ' . $model->scopeId;
$this->params['breadcrumbs'][] = ['label' => 'Scopes', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->scopeId, 'url' => ['view', 'id' => $model->scopeId]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="scope-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
