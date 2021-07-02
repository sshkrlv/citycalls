<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Smi */

$this->title = 'Create Smi';
$this->params['breadcrumbs'][] = ['label' => 'Smis', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="smi-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
