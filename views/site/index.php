<?php

use app\widgets\ReviewItem;
use app\widgets\SmiReviewItem;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use app\widgets\CallCard;

/* @var $this yii\web\View */
/* @var $searchModel app\models\CallSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var $filters \app\models\FiltersModel */
/* @var $reviews \app\models\Review */
/* @var $smireviews \app\models\Smi */


$this->title = 'Карта инновационных решений';
?>

<div class="section main">
    <div class="container-fluid req-cols">
        <div class="req-cols__left">
            <h1 class="main__title">Городские запросы</h1>
            <div class="main__subtitle">Актуальные задачи Правительства Москвы на&nbsp;поиск инновационных решений</div>
        </div>
        <div class="req-cols__right">
            <div class="requests-finish">
                <div class="requests-finish__date">
                    <b style="font-weight: 300;" id="count-active"></b>&nbsp;открытых запросов
                    <span>до&nbsp;30&nbsp;июня</span>
                </div>
                <div class="requests-finish__btn">
                    Успейте предложить свое решение!
                </div>
            </div>
        </div>
    </div>
</div>


<section class="section">
    <div class="container-fluid">
        <div class="btn-group req-filters" role="group" id="req-filters">
            <div class="btn-group req-filters__btn-group" role="group">

                <select class="city-select" name="typeTask" id="typeTask-select" onclick="alert('1');" title="Тип задачи" data-selected-text-format="static" >
                </select>
            </div>
            <div class="btn-group req-filters__btn-group" role="group">

                <select class="city-select" name="customer" id="customer-select" onclick="alert('2');" title="Заказчик" data-selected-text-format="static" >

                    <?php foreach ($filters->customers as $item) :?>
                        <option value="<?=$item->customerId?>"><?= $item->brandName ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="btn-group req-filters__btn-group" role="group">
                <select class="city-select" name="sphere" id="sphere-select" onclick="alert('3');" title="Сфера применения" data-selected-text-format="static" >
                </select>
            </div>
            <div class="btn-group req-filters__btn-group" role="group">
                <select class="city-select" name="tech" id="tech-select" onclick="alert('4');" title="Технология" data-selected-text-format="static" >
                </select>
            </div>
            <div class="custom-control custom-checkbox form-check req-filters__checkbox">
                <input type="checkbox" class="custom-control-input form-check-input" id="req-filters__checkbox" name="form-request-agree1" required>
                <label class="custom-control-label form-check-label" for="req-filters__checkbox"><span>Показывать архивные запросы</span>
                </label>
            </div>
        </div>

        <div class="req-cards" id="req-cards">


            <?php $models = $dataProvider->getModels();?>

            <?php foreach ($models as $item) :?>
                <?=CallCard::widget(['callName' => $item->callName, 'briefDescription' => $item->briefDescription, 'customer' => $item->customerId, ]);?>
            <?php endforeach; ?>


        <?=CallCard::widget(['callName' => "иииии", 'briefDescription' => "оооооооооооооооооооооо", 'customer' => 1, ]);?>

        </div>


        <div class="more-link-wrap" id="more-link-wrap">
            <a class="more-link">Показать еще</a>
        </div>
    </div>
</section>


<section class="section">
    <div class="container-fluid">
        <div class="about">
            <h1 class="text-center">О нас</h1>
            <div class="reviews-container">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-4 col-12 mb-4 mb-xl-0">
                            <div class="reviews-name">
                                Отзывы заказчиков
                            </div>
                        </div>
                        <div class="col-xl-8 col-12">
                            <div class="reviews-slider customers-rev">
                                <?php foreach ($reviews as $item) :?>
                                    <?php if ($item->isCustomer === 1) :?>
                                    <?=\app\widgets\ReviewItem::widget(['name' => $item->name, 'post' => $item->post, 'text' => $item->text, 'image' => $item->getImage()->filename,]);?>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="reviews-container">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-4 col-12 mb-4 mb-xl-0">
                            <div class="reviews-name">
                                Отзывы компаний
                            </div>
                        </div>
                        <div class="col-xl-8 col-12">
                            <div class="reviews-slider customers-rev">
                                <?php foreach ($reviews as $item) :?>
                                <?php if ($item->isCustomer === 0) :?>
                                    <?=\app\widgets\ReviewItem::widget(['name' => $item->name, 'post' => $item->post, 'text' => $item->text, 'image' => $item->getImage()->filename,]);?>
                                <?php endif; ?>
                                <?php endforeach; ?>
                                <?=ReviewItem::widget(['name' => "иииии", 'post' => "оооооооооооооооооооооо", 'text' => "awdawdawda", 'image' => "https://innovationmap.innoagency.ru/calls/static/img/content/reviews-slider/А.Рыжов.jpg",]);?>
                                <?=ReviewItem::widget(['name' => "321231", 'post' => "awdad", 'text' => "Департамент строительства сформировал более 10 запросов на поиск инноваций. В&nbsp;результате совместной работы мы посмотрели десятки интересных продуктов и несколько из них уже внедряется в инфраструктуре
                                                города.", 'image' => "https://innovationmap.innoagency.ru/calls/static/img/content/reviews-slider/А.Рыжов.jpg",]);?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="reviews-container">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-4 col-12 mb-4 mb-xl-0">
                            <div class="reviews-name">
                                Публикации в&nbsp;СМИ
                            </div>
                        </div>
                        <div class="col-xl-8 col-12">
                            <div class="reviews-slider customers-rev">
                                <div class="review-item">
                                    <div class="review-item__img-container">
                                        <div class="review-item__img" style="background-image: url('/img/content/reviews-slider/rb-200.png')"></div>
                                        <!-- Если надо  с рамочкой  <div class="review-item__img review-item__img_is-logo" style="background-image: url('static/img/content/reviews-slider/rb-200.png')"></div>-->
                                    </div>
                                    <div class="review-item__content">
                                        <div class="review-item__title">
                                            Карта инновационных решений теперь доступна на портале i.moscow
                                        </div>
                                        <div class="review-item__subtitle">
                                            24.03.2021
                                        </div>
                                        <div class="review-item__text"><a href="https://rb.ru/news/karta-moskvy-dlya-innovacii/" target="_blank">Перейти к новости</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="review-item">
                                    <div class="review-item__img-container">
                                        <div class="review-item__img" style="background-image: url('/img/content/reviews-slider/mos-200.png')"></div>
                                    </div>
                                    <div class="review-item__content">
                                        <div class="review-item__title">
                                            Прорывные решения для новых вызовов: итоги 2020 года
                                        </div>
                                        <div class="review-item__subtitle">
                                            09.01.2021
                                        </div>
                                        <div class="review-item__text"><a href="https://www.mos.ru/news/item/84954073/" target="_blank">Перейти к новости</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="review-item">
                                    <div class="review-item__img-container">
                                        <div class="review-item__img" style="background-image: url('/img/content/reviews-slider/mos-200.png')"></div>
                                    </div>
                                    <div class="review-item__content">
                                        <div class="review-item__title">
                                            Более двух тысяч продуктов и сервисов разместили на «Карте инновационных решений» в этом году
                                        </div>
                                        <div class="review-item__subtitle">
                                            28.12.2020
                                        </div>
                                        <div class="review-item__text"><a href="https://www.mos.ru/news/item/84642073/" target="_blank">Перейти к новости</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="review-item">
                                    <div class="review-item__img-container">
                                        <div class="review-item__img" style="background-image: url('/img/content/reviews-slider/vc-200.png')"></div>
                                    </div>
                                    <div class="review-item__content">
                                        <div class="review-item__title">
                                            Проекты Агентства инноваций Москвы стали победителями и призерами международных и российских премий
                                        </div>
                                        <div class="review-item__subtitle">
                                            24.12.2020
                                        </div>
                                        <div class="review-item__text"><a href="https://vc.ru/cdp/191042-proekty-agentstva-innovaciy-moskvy-stali-pobeditelyami-i-prizerami-mezhdunarodnyh-i-rossiyskih-premiy" target="_blank">Перейти к новости</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="review-item">
                                    <div class="review-item__img-container">
                                        <div class="review-item__img" style="background-image: url('static/img/content/reviews-slider/РосГаз.png')"></div>
                                    </div>
                                    <div class="review-item__content">
                                        <div class="review-item__title">
                                            Наталья Сергунина: В Москве запустили Карту инновационных решений
                                        </div>
                                        <div class="review-item__subtitle">
                                            28.09.2020
                                        </div>
                                        <div class="review-item__text"><a href="https://rg.ru/2020/09/28/reg-cfo/natalia-sergunina-v-moskve-zapustili-kartu-innovacionnyh-reshenij.html

" target="_blank">Перейти к новости</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

</div>