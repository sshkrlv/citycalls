<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model \app\models\Call */
/* @var $customers app\models\Customer */
/* @var $extraAttributes \app\modules\admin\models\CallViewModel */
/* @var $modelTypes app\models\TypeOfProblem */

/* @var $form yii\widgets\ActiveForm */
?>

<div class="call-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'callName')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'briefDescription')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'createDate')->textInput() ?>

    <?= $form->field($model, 'videoLink')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'expireDate')->textInput() ?>

    <?= $form->field($model, 'isArchived')->checkbox(['uncheck'=>0]) ?>
    <?= $form->field($model, 'isShowingOnMainPage')->checkbox(['uncheck'=>0], false)->label("показывать на гравной странице") ?>
    <?= $form->field($model, 'sortRank')->input('number') ?>


    <?= $form->field($model, 'customerId')->dropDownList(ArrayHelper::map($customers,  'customerId', 'legalName'))->label('customer') ?>

    <?= $form->field($extraAttributes, 'types')->checkboxList(ArrayHelper::map(\app\models\TypeOfProblem::find()->all(), 'typeId', 'name'))->label('Типы задачи'); ?>

    <?= $form->field($extraAttributes, 'scopes')->checkboxList(ArrayHelper::map(\app\models\Scope::find()->all(), 'scopeId', 'scopeName'))->label('Сферы применения'); ?>

    <?= $form->field($extraAttributes, 'technologies')->checkboxList(ArrayHelper::map(\app\models\Technology::find()->all(), 'technologyId', 'name'))->label('Технологии'); ?>

    <?= $form->field($extraAttributes, 'relatedCalls')->dropDownList(ArrayHelper::map(\app\models\Call::find()->all(),  'callId', 'callName'),
        [
            'multiple' => 'multiple'
        ]
    ); ?>
    <?php //$form->field($model, 'type1')->dropDownList(ArrayHelper::map($types,  'typeId', 'name'), ['prompt' => 'выбрать',])->label('тип задачи 1'
     //$form->field($model, 'type2')->dropDownList(ArrayHelper::map($types,  'typeId', 'name'), ['prompt' => 'выбрать',])->label('тип задачи 2')
     //$form->field($model, 'type3')->dropDownList(ArrayHelper::map($types,  'typeId', 'name'), ['prompt' => 'выбрать',])->label('тип задачи 3')?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
