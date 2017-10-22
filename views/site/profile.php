<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 13.10.2017
 * Time: 23:45
 */
/* @var $this yii\web\View */

use yii\helpers\Html;
use \yii\bootstrap\ActiveForm;
use mihaildev\ckeditor\CKEditor;
use yii\widgets\LinkPager;

$this->title = 'Личный кабинет';
?>

<div class="row profilefon">
    <div class="col-md-1"></div>
    <div class="col-md-10">
        <div class="profile">
            <h2>Добро пожаловать в Ваш личный кабинет, <?=$user->username?>!</h2>
            <figure><img src="/<?=$user->avatar?>"></figure>
            <div class="authorinfo">
                <P>Имя пользователя:</P>
                <P class="pole"><?=$user->username?></P>
                <P>Фамилия пользователя:</P>
                <P class="pole"><?=$user->surname?></P>
                <p>Информация о пользователе:</p>
                <P class="pole"><?=$user->about?></P>
                <p>E-mail:</p>
                <P class="pole"><?=$user->email?></P>
                <p>Контактный телефон:</p>
                <P class="pole"><?=$user->tel?></P>

                <?if(Yii::$app->user->can('admin')){
                    $button='<button type="button"  class="btn btn-danger addbtn">Администрировать</button>';
                    $link=Yii::$app->getUrlManager()->createUrl('error');
                echo "<a href='".$link."'>".$button."</a>";
                };?>

            </div>
            <p class="small">Аватар и информация об авторе будут отображены в разделе "Галлерея". Личные данные недоступны для просмотра другими пользователями.
            </p>
        </div>
    </div>
</div>
<div class="col-md-1"></div>
</div>
<div class="row">
    <div class="col-md-2"></div>
    <div class="col-md-8"> <button type="button" id="profilebtn" class="btn btn-default addbtn">Редактировать профайл</button> </div>
    <div class="col-md-2"></div>
</div>

<!-- HTML-код модального окна -->
<div id="myModalBox" class="modal fade" >
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Заголовок модального окна -->
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title">Изменить личные данные</h4>
            </div>
            <!-- Основное содержимое модального окна -->
            <form id="profileForm" method="post" enctype="multipart/form-data">
            <div class="modal-body">
                <div class="form-group">
<!--                    <label for="inputEmail">Адрес email</label>-->
<!--                    <input type="email" class="form-control" id="inputEmail" placeholder="Введите email">-->

                    <label for="inputPassword">Пароль</label>
                    <input type="password" class="form-control" id="inputPassword" placeholder="Введите пароль">
                </div>
                <div class="form-group">
                    <label for="inputName">Имя</label>
                    <input type="text"  name="username" class="form-control" id="inputName" placeholder="Введите свое имя">

                    <label for="inputSurname">Фамилия</label>
                    <input type="text" name="surname" class="form-control" id="inputSurname" placeholder="Введите свою фамилию">

                    <label for="phone">Контактный телефон</label>
                    <input type="phone" name="tel" class="form-control" id="phone" placeholder="Введите номер телефона">

                </div>
                <div class="form-group">
                    <label for="exampleTextarea">Краткая информация о себе</label>
                    <textarea name="about" class="form-control" id="exampleTextarea" rows="3"></textarea>
                </div>

                <div class="form-group">
                    <label for="inputAvatar">Аватар</label>
                    <input type="file" id="inputAvatar" class="filestyle" data-placeholder="Файл не выбран">
                </div>
            </div>

            <!-- Футер модального окна -->
            <div class="modal-footer">
                <button type="button" class="btn btn-defaultmodal" data-dismiss="modal">Закрыть</button>
                <input class="btn btn-primary" type="submit" value="Сохранить изменения">
            </div>
            </form>
        </div>
    </div>
</div>

<!-- Скрипт, вызывающий модальное окно после загрузки страницы -->
<script>
    $('#profilebtn').click(function() {
        $("#myModalBox").modal('show');
    });
</script>
