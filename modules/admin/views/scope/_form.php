<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Scope */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="scope-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'scopeName')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'parentScopeId')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
