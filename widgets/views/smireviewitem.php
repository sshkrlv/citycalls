<?php
use \yii\helpers\Html;

/* @var $this yii\web\View */

/** @var $title string */
/** @var $date string */
/** @var $link string */
/** @var $image string */

?>

<div class="review-item">
    <div class="review-item__img-container">
        <div class="review-item__img" style="background-image: url('<?= $image ?>')"></div>
        <!-- Если надо  с рамочкой  <div class="review-item__img review-item__img_is-logo" style="background-image: url('static/img/content/reviews-slider/rb-200.png')"></div>-->
    </div>
    <div class="review-item__content">
        <div class="review-item__title">
            <?= ($title) ?>
        </div>
        <div class="review-item__subtitle">
            <?= ($date) ?>
        </div>
        <div class="review-item__text">
            <?= Html::a('Перейти к новости', $link, ['target'=>"_blank"])?>
        </div>
    </div>
</div>