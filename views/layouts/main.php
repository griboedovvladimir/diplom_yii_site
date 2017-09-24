<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use app\models\Nav as N;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>


<div class="container-fluid">
    <div id="logo" class="logo center-block">
        <a href="<?=Yii::$app->homeUrl;?>"><div class="logo3"><img src="img/logo.png"></div>
            <div class="logo2"><img src="img/logo2.png"></div></a>
    </div>

    <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-10">

            <!-- Классы navbar и navbar-default -->
            <nav class="navbar navbar-default ">
                <!-- Контейнер -->
                <div class="container-fluid">
                    <!-- Заголовок -->
                    <div class="navbar-header">
                        <!-- Кнопка «Гамбургер» -->
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-main" aria-expanded="false">
                            <span class=sr-only>Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div>
                    <!-- Основная часть меню -->
                    <div class="collapse navbar-collapse" id="navbar-main">

                        <!-- Содержимое основной части -->
                        <ul class="nav navbar-nav">
                            <li><a href="<?=Yii::$app->homeUrl;?>">Главная</a></li>
                            <li><a href="<?=Yii::$app->getUrlManager()->createUrl('about')?>">О проекте</a></li>
                            <li><a href="<?=Yii::$app->getUrlManager()->createUrl('laboratory')?>">Лаборатория</a></li>
                            <li><a href="<?=Yii::$app->getUrlManager()->createUrl('gallery')?>">Галерея</a></li>
                            <li><a href="<?=Yii::$app->getUrlManager()->createUrl('shop')?>">Фотолавка</a></li>
                            <li><a href="<?=Yii::$app->getUrlManager()->createUrl('blog')?>">Блог</a></li>
                        </ul>

                        <p class="navbar-text navbar-right">Вошли как Тимофей</p>
                        <button type="button" class="btn btn-default navbar-btn btn-danger navbar-right">Выйти</button>


                    </div>
                </div>
            </nav>

        </div>
    </div>
    <?= $content ?>
    <div class="footer">
        <hr>
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-3">
                Наши контакты:<br>
                <i class="icon-phone"></i> +37544000000<br>
                <i class="icon-email"></i> darkroom.by@gmail.com<br>
                <i class="icon-skype"></i> darkroom_by<br>
            </div>
            <div class="col-md-3">
                <div class="rights">Сайт разработан для сообщества darkroom.by</div></br>
            </div>
            <div class="col-md-4 social">
                <a href="https://vk.com/darkroom_by" data-toggle="tooltip" title="Мы в Вконтакте"><i class="icon-vk"></i></a>
                <a href="https://www.facebook.com/darkroom.by/" data-toggle="tooltip" title="Мы в Facebook"><i class="icon-facebook-rect-1"></i></a>
                <a href="#" data-toggle="tooltip" title="Мы в Flickr"><i class="icon-flickr-1"></i></a>
                <a href="#" data-toggle="tooltip" title="Мы в Instagram"><i class="icon-instagram-filled"></i></a>
            </div>

        </div>
        <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-11">
                <ul class=" nav-justified ">
                    <li><a href="<?=Yii::$app->homeUrl;?>">Главная</a></li>
                    <li><a href="<?=Yii::$app->getUrlManager()->createUrl('about')?>">О проекте</a></li>
                    <li><a href="<?=Yii::$app->getUrlManager()->createUrl('laboratory')?>">Лаборатория</a></li>
                    <li><a href="<?=Yii::$app->getUrlManager()->createUrl('gallery')?>">Галерея</a></li>
                    <li><a href="<?=Yii::$app->getUrlManager()->createUrl('shop')?>">Фотолавка</a></li>
                    <li><a href="<?=Yii::$app->getUrlManager()->createUrl('blog')?>">Блог</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>



<!---->
<!--<div class="wrap">-->
<!--    --><?php
//    NavBar::begin([
//        'brandLabel' => 'My Company',
//        'brandUrl' => Yii::$app->homeUrl,
//        'options' => [
//            'class' => 'navbar-inverse navbar-fixed-top',
//        ],
//    ]);
//    $nav = N::$arr;
//    //var_dump(N::toArr());
//    echo Nav::widget([
//        'options' => ['class' => 'navbar-nav navbar-right'],
//        'items' =>
//            //N::toArr(),
//            [
//
//            ['label' => 'Home', 'url' => ['/site/index']],
//            ['label' => 'About', 'url' => ['/site/about']],
//            ['label' => 'Contact', 'url' => ['/site/contact']],
//            Yii::$app->user->isGuest ? (
//                ['label' => 'Login', 'url' => ['/site/login']]
//            ) : (
//                '<li>'
//                . Html::beginForm(['/site/logout'], 'post')
//                . Html::submitButton(
//                    'Logout (' . Yii::$app->user->identity->username . ')',
//                    ['class' => 'btn btn-link logout']
//                )
//                . Html::endForm()
//                . '</li>'
//            )
//        ],
//    ]);
//    NavBar::end();
//    ?>
<!---->
<!--    <div class="container">-->
<!--        --><?//= Breadcrumbs::widget([
//            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
//        ]) ?>
<!--        --><?//= $content ?>
<!--    </div>-->
<!--</div>-->
<!---->
<!--<footer class="footer">-->
<!--    <div class="container">-->
<!--        <p class="pull-left">&copy; My Company --><?//= date('Y') ?><!--</p>-->
<!---->
<!--        <p class="pull-right">--><?//= Yii::powered() ?><!--</p>-->
<!--    </div>-->
<!--</footer>-->

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
