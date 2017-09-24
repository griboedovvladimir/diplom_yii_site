<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use \yii\bootstrap\ActiveForm;
use mihaildev\ckeditor\CKEditor;
use yii\widgets\LinkPager;

$this->title = 'Блог';

?>
<div class="row">
    <div class="col-md-1"></div>
    <div class="col-md-10">
        <ol class="breadcrumb">
            <li><a href="<?=Yii::$app->getUrlManager()->createUrl('gallery')?>">Галерея</a></li>
            <li class="active"><?=$author->name?> <?=$author->surname?></li>
        </ol>
    </div>
    <div class="col-md-1"></div>
</div>
<div class="row">
    <div class="col-md-1"></div>
    <div class="col-md-3 aboutauthor"><h2><?=$author->name?> <?=$author->surname?></h2><p><?=$author->about?></p></div>
    <div class="col-md-7 avatar" style="background-image: url('../img/userimg/vladava.jpg');)"></div>
    <div class="col-md-1"></div>
</div>

<div class="row">
    <div class="col-md-1"></div>
    <div class="col-md-5"><a href="img/userimg/vlad1.jpg" data-fancybox data-caption=""><img class="works center-block" src="img/userimg/vlad1.jpg" alt="" /></a></div>
    <div class="col-md-5"><a href="img/userimg/vlad2.jpg" data-fancybox data-caption=""><img class="works center-block" src="img/userimg/vlad2.jpg" alt="" /></a></div>
    <div class="col-md-1"></div>
</div>


<div class="row">
    <div class="col-md-2"></div>
    <div class="col-md-8"> <button type="button" id="galleryAddBtn" class="btn btn-default addbtn">Добавить фотоработу</button> </div>
    <div class="col-md-2"></div>
</div>

<!-- HTML-код модального окна -->
<div id="myModalBox" class="modal fade" >
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Заголовок модального окна -->
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title">Добавить фотоработу в галерею</h4>
            </div>
            <!-- Основное содержимое модального окна -->
            <div class="modal-body">
                <div class="form-group">
                    <p>Загруженные работы:</p>
                    <div class="form-check">
                        <label class="form-check-label">
                            <input type="checkbox" class="form-check-input">
                            <img class="worksfordelete" src="img/pic3.jpg">
                        </label>
                        <label class="form-check-label">
                            <input type="checkbox" class="form-check-input">
                            <img class="worksfordelete" src="img/pic3.jpg">
                        </label>
                        <label class="form-check-label">
                            <input type="checkbox" class="form-check-input">
                            <img class="worksfordelete" src="img/pic3.jpg">
                        </label>
                    </div>
                    <button type="submit" class="btn btn-danger">Удалить отмеченные</button>

                </div>

                <div class="form-group">
                    <label for="inputWork">Добавить фото</label>
                    <input type="file" id="inputWork" class="filestyle" data-placeholder="Файл не выбран">
                </div>
            </div>
            <!-- Футер модального окна -->
            <div class="modal-footer">
                <button type="button" class="btn btn-defaultmodal" data-dismiss="modal">Закрыть</button>
                <button type="submit" class="btn btn-primary">Добавить</button>
            </div>
        </div>
    </div>
</div>

<!-- Скрипт, вызывающий модальное окно после загрузки страницы -->
<!--<script>-->
<!--    $('#galleryAddBtn').click(function() {-->
<!--        $("#myModalBox").modal('show');-->
<!--        alert("22");-->
<!--    });-->
<!--</script>-->