<?php
use \yii\helpers\Html;

/* @var $this yii\web\View */

/** @var $post string */
/** @var $name string */
/** @var $text string */
/** @var $image string */

?>

<div class="review-item">
    <div class="review-item__img-container">
        <div class="review-item__img" style="background-image: url('<?= $image ?>')"></div>
    </div>
    <div class="review-item__content">
        <div class="review-item__title">
            <?= ($name) ?>
        </div>
        <div class="review-item__subtitle">
            <?= ($post) ?>
        </div>
        <div class="review-item__text">
            <p><?= ($text) ?></p>
        </div>
    </div>
</div>

