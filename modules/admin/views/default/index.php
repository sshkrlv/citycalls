<div class="admin-default-index">
    <h1><?= $this->context->action->uniqueId ?></h1>
    <p>
        This is the view content for action "<?= $this->context->action->id ?>".
        The action belongs to the controller "<?= get_class($this->context) ?>"
        in the "<?= $this->context->module->id ?>" module.
    </p>
    <p>
        You may customize this page by editing the following file:<br>
        <code><?= __FILE__ ?></code>
    </p>

    <p>
        <?=  yii\helpers\Html::a('технологии', ['technology/index'], ['class' => 'btn btn-success']) ?>
        <?=  yii\helpers\Html::a('сферы применения', ['scope/index'], ['class' => 'btn btn-success']) ?>
        <?=  yii\helpers\Html::a('заказчики', ['customer/index'], ['class' => 'btn btn-success']) ?>

        <?=  yii\helpers\Html::a('типы задач', ['problem-type/index'], ['class' => 'btn btn-success']) ?>
    </p>
    <p>
        <?=  yii\helpers\Html::a('запросы', ['call/index'], ['class' => 'btn btn-success']) ?>

        <?=  yii\helpers\Html::a('сми', ['smi/index'], ['class' => 'btn btn-success']) ?>
        <?=  yii\helpers\Html::a('отзывы', ['review/index'], ['class' => 'btn btn-success']) ?>
        <?=  yii\helpers\Html::a('изображения', ['image/index'], ['class' => 'btn btn-success']) ?>

    </p>
</div>
