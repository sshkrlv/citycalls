<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ScopeSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Scopes';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="scope-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Scope', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'scopeId',
            'scopeName',
            'parentScopeId',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
