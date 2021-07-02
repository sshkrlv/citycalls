<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\CallSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="call-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'callId') ?>

    <?= $form->field($model, 'callName') ?>

    <?= $form->field($model, 'briefDescription') ?>

    <?= $form->field($model, 'description') ?>

    <?= $form->field($model, 'createDate') ?>

    <?php // echo $form->field($model, 'videoLink') ?>

    <?php // echo $form->field($model, 'expireDate') ?>

    <?php // echo $form->field($model, 'isArchived') ?>

    <?php // echo $form->field($model, 'customerId') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
