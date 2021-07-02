<?php
use \yii\helpers\Html;

/* @var $this yii\web\View */

/** @var $callName string */
/** @var $customer string */
/** @var $briefDescription string */

?>

<div class="req-card ">
    <div class="req-card__top">
        <div class="req-card__header">
            <div class="department">
                <svg class="department__logo" width="44px" height="53px">
                <use xlink:href="img/svg-symbols.svg#moscow-for-fill"></use>
                </svg>
                <div class="department__name"><?= Html::encode($customer) ?>></div>
            </div>
        </div>
		<div class="req-card__date">30.06.2021</div>
		<div class="req-card__name"><?= Html::encode($callName) ?></div>
		<div class="req-card__description"><?= Html::encode($briefDescription) ?></div>
		<div class="tags-list">
            <a class="tag">Умные устройства</a><a class="tag">Интернет вещей</a><a class="tag">Искусственный интеллект</a>
        </div>
    </div>
    <div class="req-card__footer">
        <a target="_blank" href="https://innovationmap.innoagency.ru/request/?request=38" class="btn btn-outline-red">Откликнуться</a>
    </div>
</div>