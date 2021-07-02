<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ReviewSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="review-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'reviewId') ?>

    <?= $form->field($model, 'isCustomer') ?>

    <?= $form->field($model, 'name') ?>

    <?= $form->field($model, 'post') ?>

    <?= $form->field($model, 'text') ?>

    <?php // echo $form->field($model, 'imageId') ?>

    <?php // echo $form->field($model, 'callId') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
