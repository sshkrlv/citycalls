<?php

use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Call */

$this->title = $model->callId;
$this->params['breadcrumbs'][] = ['label' => 'Calls', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="call-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->callId], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->callId], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?php
        $types = "";$scopes = "";$technologies = "";
        foreach ($model->types as $type){   $types .= $type->name."\t\t";   }
        foreach ($model->scopes as $scope){   $scopes .= $scope->scopeName."\t\t";   }
        foreach ($model->technologies as $technology){   $technologies .= $technology->name."\t\t";   }
        ?>
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'callId',
            'callName',
            'briefDescription:ntext',
            'description:ntext',
            'createDate',
            'videoLink',
            'expireDate',
            'isArchived',
            'customer.legalName',

                [
                    'attribute'=> 'Типы задачи' ,
                    'value' => ($types == "") ? null : $types,
                ],

                [
                    'attribute'=> 'Сферы применения' ,
                    'value' => ($scopes == "") ? null : $scopes,
                ],

                [
                    'attribute'=> 'Технологии' ,
                    'value' => ($technologies == "") ? null : $technologies,
                ],
        ],
    ]) ?>


</div>
