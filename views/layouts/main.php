<?php
/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;

use app\assets\MainAsset;

MainAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta content="telephone=no" name="format-detection">

        <!-- This make sence for mobile browsers. It means, that content has been optimized for mobile browsers -->
        <meta name="HandheldFriendly" content="true">

        <!--[if (gt IE 9)|!(IE)]><!-->

        <!--<![endif]-->
        <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&display=swap" rel="stylesheet">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body class="page cities-requests">
<?php $this->beginBody() ?>

<div class="page__wrapper">

    <section class="section-header">
        <header>
            <div class="header container-fluid">
                <div class="section-body align-items-center">
                    <div class="section-body-lg align-items-center">
                        <div class="section-body__left">
                            <a href="https://innovationmap.innoagency.ru/" class="header__m-logo">
                                <img src="/img/general/logo.svg">
                            </a>
                            <a href="https://innoagency.ru/" target="_blank" class="header__logo d-none d-lg-block">
                                <img src="/img/general/aim.svg">
                            </a>
                            <a class="header-collapse close d-lg-none" role="button">
                                <div></div>
                                <span></span>
                            </a>
                        </div>
                        <div class="section-body__right">
                            <div class="header-collapse-menu">
                                <a href="https://innoagency.ru/" target="_blank" class="header__logo d-lg-none">
                                    <img src="/img/general/aim.svg">
                                </a>
                                <nav class="header-nav">
                                    <ul class="header-menu">
                                        <li class="header-menu__item">
                                            <a href="https://innovationmap.innoagency.ru/provider/" class="header-menu__link">
                                                <span>Инноваторам</span>
                                            </a>
                                        </li>
                                        <li class="header-menu__item">
                                            <a href="https://innovationmap.innoagency.ru/customer/" class="header-menu__link">
                                                <span>Заказчикам инноваций</span>
                                            </a>
                                        </li>
                                        <li class="header-menu__item">
                                            <a href="https://innovationmap.innoagency.ru/#catalog" class="header-menu__link">
                                                <span>Каталог решений</span>
                                            </a>
                                        </li>
                                        <li class="header-menu__item">
                                            <a href="https://innovationmap.innoagency.ru/calls" class="header-menu__link">
                                                <span>Городские запросы</span>
                                            </a>
                                        </li>
                                        <li class="header-menu__item">
                                            <a href="https://innovationmap.innoagency.ru/#special " class="header-menu__link">
                                                <span>Спецпроекты</span>
                                            </a>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
        </header>



    </section>

    <?= $content ?>

<footer class="page__footer">
            <div class="section-body footer">
                <div class="section-body__left">
                    <a href="https://innoagency.ru/" class="footer__logo" target="_blank">
                        <img src="static/img/general/aim.svg">
                    </a>
                    <h4>КАРТА ИННОВАЦИОННЫХ РЕШЕНИЙ</h4>
                    <p class="footer_copiright">© ГБУ «Агентство инноваций Москвы», 2021</p>
                </div>
                <div class="section-body__right">
                    <div>
                        <h5>О проекте</h5>
                        <ul class="footer-nav">
                            <li class="footer-nav__item">
                                <a href="https://innovationmap.innoagency.ru/#audience " class="footer-nav__link">

Для кого?

                        </a>
                            </li>
                            <li class="footer-nav__item">
                                <a href="https://innovationmap.innoagency.ru/#faq" class="footer-nav__link">

Часто задаваемые вопросы

</a>
                            </li>
                            <li class="footer-nav__item">
                                <a href="https://innovationmap.innoagency.ru/#special " class="footer-nav__link">

Спецпроекты

                        </a>
                            </li>
                            <li class="footer-nav__item">
                                <a href="https://innovationmap.innoagency.ru/list " class="footer-nav__link">

Перечень ИВП

</a>
                            </li>
                        </ul>

                        <h5 class="mt-3">Участнику</h5>

                        <ul class="footer-nav">
                            <li class="footer-nav__item">
                                <a href="https://innovationmap.innoagency.ru/#catalog" class="footer-nav__link">

Каталог решений

</a>
                            </li>
                            <li class="footer-nav__item">
                                <a href="https://innovationmap.innoagency.ru/calls " class="footer-nav__link">

Запросы от города

</a>
                            </li>
                            <li class="footer-nav__item">
                                <a href="https://innovationmap.innoagency.ru/provider/" class="footer-nav__link">

Инноваторам

                        </a>
                            </li>
                            <li class="footer-nav__item">
                                <a href="https://innovationmap.innoagency.ru/customer/" class="footer-nav__link">

Заказчикам инноваций

</a>
                            </li>
                        </ul>
                    </div>
                    <div>
                            <h5>Хотите быть в курсе новостей?</h5>
                            <form class="form-subscribe mb-5" id="form-subscribe">
                                <input class="form-control emailmask" placeholder="email@website.com" name="email" type="text">
                                <button type="submit" class="btn btn-black">Подписаться</button>
                            </form>
                            <div class="mb-3">
                                <a href="mailto:innovationmap@develop.mos.ru" class="footer__link">innovationmap@develop.mos.ru</a>
                            </div>
                            <small>

                            <a target="_blank"

                               href="https://innoagency.ru/poryadok_reshenia.pdf">

                                   Порядок размещения решений на карте</a>

                            <br/>
							<a target="_blank"

                               href="https://innoagency.ru/poryadok_zaprosi.pdf">

                                   Порядок размещения городских запросов </a>

                            <br/>

                            <a target="_blank"

                               href="https://innoagency.ru/polzovatelskoe_soglashenie.pdf">

                                   Пользовательское соглашение</a>

                            <br/>

                            <a target="_blank"

                               href="https://innoagency.ru/soglashenie_persdannie.pdf">

                                   Согласие на обработку персональных данных</a>

                        </small>
                        </div>
                </div>
            </div>
        </footer>
        <!--<script>
            $(document).ready(function(){
                $.ajax({
                    url: 'https://innovationmap.innoagency.ru/calls/gate.php',
                    type:'POST',
                    dataType: 'json',
                    data: {
                    'op': 'getOptions',
                    },
                }).done(function(res){
                    $('#count-active').html(res.active);
                    $.each(res.customer, function(k,v){
                        $('<option value="'+v+'">'+v+'</option>').appendTo("select#customer-select");
                    });
                    $.each(res.typeTask, function(k,v){
                        $('<option value="'+v+'">'+v+'</option>').appendTo("select#typeTask-select");
                    });
                    $.each(res.sphere, function(k,v){
                        $('<option value="'+v+'">'+v+'</option>').appendTo("select#sphere-select");
                    });
                    $.each(res.tech, function(k,v){
                        $('<option value="'+v+'">'+v+'</option>').appendTo("select#tech-select");
                    });
                    $('.city-select').selectpicker('refresh');
                });
                ajaxReq();


                let prevTypeTask,prevCustomer,prevSphere,prevTech;
                $("#typeTask-select").on('hide.bs.select', function(){
                    if($('#typeTask-select').val() !== prevTypeTask){
                        prevTypeTask = $('#typeTask-select').val();
                    }else{
                        $('#typeTask-select').val('');
                        $('#typeTask-select').removeClass('active');
                        ajaxReq();
                    }
                });
                $("#customer-select").on('hide.bs.select', function(){
                    if($('#customer-select').val() !== prevCustomer){
                        prevCustomer = $('#customer-select').val();
                    }else{
                        $('#customer-select').val('');
                        $('#customer-select').removeClass('active');
                        ajaxReq();
                    }
                });
                $("#sphere-select").on('hide.bs.select', function(){
                    if($('#sphere-select').val() !== prevSphere){
                        prevSphere = $('#sphere-select').val();
                    }else{
                        $('#sphere-select').val('');
                        $('#sphere-select').removeClass('active');
                        ajaxReq();
                    }
                });
                $("#tech-select").on('hide.bs.select', function(){
                    if($('#tech-select').val() !== prevTech){
                        prevTech = $('#tech-select').val();
                    }else{
                        $('#tech-select').val('');
                        $('#tech-select').removeClass('active');
                        ajaxReq();
                    }
                });


                $('select').on('change', function(){
                    ajaxReq();
                });
                $('#req-filters__checkbox').on('click', function () {
                    ajaxReq();
                });
            });
            function ajaxReq(){
                var arr = {};
                if($('select[name="typeTask"]').val() != ''){
                    typeTask = $('select[name="typeTask"]').val() || [];
                    //arr['typeTask'] = typeTask.join(", ");
                    arr['typeTask'] = $('select[name="typeTask"]').val();
                }
                if($('select[name="customer"]').val() != ''){
                    customer = $('select[name="customer"]').val() || [];
                    //arr['customer'] = customer.join(", ");
                    arr['customer'] = $('select[name="customer"]').val();
                }
                if($('select[name="sphere"]').val() != ''){
                    sphere = $('select[name="sphere"]').val() || [];
                    //arr['sphere'] = sphere.join(", ");
                    arr['sphere'] = $('select[name="sphere"]').val();
                }
                if($('select[name="tech"]').val() != ''){
                    tech = $('select[name="tech"]').val() || [];
                    //arr['tech'] = tech.join(", ");
                    arr['tech'] = $('select[name="tech"]').val();
                }
                if ($('#req-filters__checkbox').is(':checked')){
                    arr['archive'] = '';
                }else{
                    arr['archive'] = 'Нет';
                }
                $.ajax({
                    url: 'https://innovationmap.innoagency.ru/calls/gate.php',
                    type:'POST',
                    dataType: 'json',
                    data: {
                    'filters' : arr,
                        'op': 'getRequests',
                    },
                }).done(function(res){
                    if(window.innerWidth <= 625){
                        $("#req-cards").slick("unslick");
                    }
                    $('#req-cards').html(res.res);
                    if(res.moreLink != 1){
                        $('#more-link-wrap').hide();
                    }else{
                        $('#more-link-wrap').show();
                        $('.req-card:nth-child(n + 7)').removeClass('visible');
                        $('.more-link').removeClass('active');
                        $('.more-link').html('Показать еще');
                    }
                    if(window.innerWidth <= 625){
                        $("#req-cards").slick({
                                    slidesToShow: 1,
                                            slidesToScroll: 1,
                                            dots: true,
                                            infinite: false,
                                            arrows: false,
                                            autoplay: true,
                                            autoplaySpeed: 15000,
                                });
                    }
                });
            };
        </script> -->

        <!-- Main scripts. You can replace it, but I recommend you to leave it here     -->
    <?php $this->endBody() ?>
        <script src="/js/main.min.js"></script>
        <script src="kkk/js/script.js"></script>
    </body>

</html>
<?php $this->endPage() ?>