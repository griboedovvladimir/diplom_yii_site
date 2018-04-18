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
        <a href="<?=Yii::$app->homeUrl;?>"><div class="logo3"><img src="/img/logo.png"></div>
            <div class="logo2"><img src="/img/logo2.png"></div></a>
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
                        <p class="navbar-text navbar-right">
                            <?
                            if (Yii::$app->user->identity->username){
                                $userid= Yii::$app->user->identity->users_id;
                                $username=Yii::$app->user->identity->username;
                                $goToProfile=Yii::$app->getUrlManager()->createUrl("profile").'/'.$userid;
                                $linkToProfile="<a style='text-decoration: underline' href='$goToProfile'>$username</a>";
                            echo "&nbsp".$linkToProfile.", Вы в даркруме!";}
                            else {echo "&nbsp Пока что Ваш статуст \"Гость\"";}
                            ?>
                        </p>

                        <? $link='<button type="button" class="btn btn-default navbar-btn btn-danger navbar-right">Выйти</button>'?>
                        <? $link2='<button type="button" class="btn btn-default navbar-btn btn-danger navbar-right">Войти</button>'?>
                            <?
                            if (Yii::$app->user->identity->username) {
                                echo Html::a("$link", ['/site/logout'], [
                                    'data' => ['method' => 'post'],
                                    'class' => 'white text-center',
                                ]);
                            }
                            else {
                                echo Html::a("$link2", Yii::$app->getUrlManager()->createUrl('login'), [
                                    'class' => 'white text-center',
                                ]);
                            }
                            ?>



                    </div>
                </div>
            </nav>

        </div>
    </div>
    <?= $content ?>
    <div class="footer">
        <hr>
        <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-3 footerLinks">
                Наши контакты:<br>
                <a href="mailto:darkroom.by@gmail.com"><i class="icon-email"></i> darkroom.by@gmail.com</a><br>
                <a href="skype:darkroom_by"><i class="icon-skype"></i> darkroom_by</a><br>
            </div>
            <div class="col-md-3">
                <!--Реклама-->
            </div>
            <div class="col-md-4 social">
                <div>
                <a href="https://vk.com/darkroom_by" data-toggle="tooltip" title="Мы в Вконтакте"><i class="icon-vk"></i></a>
                <a href="https://www.facebook.com/darkroom.by/" data-toggle="tooltip" title="Мы в Facebook"><i class="icon-facebook-rect-1"></i></a>
                <a href="#" data-toggle="tooltip" title="Мы в Flickr"><i class="icon-flickr-1"></i></a>
                <a href="#" data-toggle="tooltip" title="Мы в Instagram"><i class="icon-instagram-filled"></i></a>
                </div>
            </div>
            <div class="col-md-1"></div>
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


<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
