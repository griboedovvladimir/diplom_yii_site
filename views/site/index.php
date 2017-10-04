<?php

/* @var $this yii\web\View */
use yii\helpers\Html;
$this->title = 'DARKROOM.BY';

?>
<? $link='<button id="authorization" type="button" class="btn btn-danger btn-sm">Выйти</button>';
$link2='<button id="authorization" type="button" class="btn btn-danger btn-sm">Войти</button>' ?>
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

<!--<a href="#"><button id="authorization" type="button" class="btn btn-danger btn-sm">Выйти</button></a>-->

<div class="row">
    <div class="col-md-2"></div>
    <div class="col-md-8">
        <div id="about" class="fadeInDownBig animated"><a href="<?=Yii::$app->getUrlManager()->createUrl('about')?>"><p id="page1" class="stiker">О проекте</p></a><a href="<?=Yii::$app->getUrlManager()->createUrl('about')?>"><div id="event1" class="hover"><div id="pic2" class="center-block"></div><img src="img/fonbotton.png"></div></a></div>
        <div id="laboratory" class="fadeInRightBig animated" ><a href="<?=Yii::$app->getUrlManager()->createUrl('laboratory')?>"><p id="page2" class="stiker">Лаборатория</p></a><a href="<?=Yii::$app->getUrlManager()->createUrl('laboratory')?>"><div id="event2" class="hover"><div id="pic2" class="center-block"></div><img src="img/fonbotton2.png"></div></a></div>
        <div id="gallery" class="fadeInLeftBig animated"><a href="<?=Yii::$app->getUrlManager()->createUrl('gallery')?>"><p id="page3" class="stiker">Галерея</p></a><a href="<?=Yii::$app->getUrlManager()->createUrl('gallery')?>"><div id="event3" class="hover"><div id="pic2" class="center-block"></div><img src="img/fonbotton3.png"></div></a></div>
        <div id="shop" class="fadeInRightBig animated"><a href="<?=Yii::$app->getUrlManager()->createUrl('shop')?>"><p id="page4" class="stiker">Фотолавка</p></a><a href="<?=Yii::$app->getUrlManager()->createUrl('shop')?>"><div id="event4" class="hover"><div id="pic2" class="center-block"></div><img src="img/fonbotton4.png"></div></a></div>
        <div id="blog" class="fadeInUpBig animated"><a href="<?=Yii::$app->getUrlManager()->createUrl('blog')?>"><p id="page5" class="stiker">Блог</p></a><a href="<?=Yii::$app->getUrlManager()->createUrl('blog')?>"><div id="event5" class="hover"><div id="pic2" class="center-block"></div><img src="img/fonbotton.png"></div></a></div>
    </div>
    <div class="col-md-2"></div>
</div>

<!--<!-- HTML-код модального окна
<!--<div id="myModalBox" class="modal fade"
<!--    <div class="modal-dialog">-->
<!--        <div class="modal-content">-->
<!--            <!-- Заголовок модального окна
<!--            <div class="modal-header">-->
<!--                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>-->
<!--                <h4 class="modal-title">Авторизация</h4>-->
<!--            </div>-->
<!--            <!-- Основное содержимое модального окна
<!--            <div class="modal-body">-->
<!--                <div class="form-group">-->
<!--                    <label for="inputEmail">Адрес email</label>-->
<!--                    <input type="email" class="form-control" id="inputEmail" placeholder="Введите email">-->

<!--                    <label for="inputPassword">Пароль</label>-->
<!--                    <input type="password" class="form-control" id="inputPassword" placeholder="Введите пароль">-->
<!--                </div>-->
<!--            </div>-->
<!--            <div class="registration">-->
<!--                <p>Не зарегистрированы?</p><a href="#">Регистрация</a>-->
<!--            </div>-->
<!--            <!-- Футер модального окна
<!--            <div class="modal-footer">-->
<!--                <button type="button" class="btn btn-defaultmodal" data-dismiss="modal">Закрыть</button>-->
<!--                <button type="submit" class="btn btn-primary">Войти</button>-->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->
<!--</div>-->

