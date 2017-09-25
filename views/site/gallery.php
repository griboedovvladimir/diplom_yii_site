<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use \yii\bootstrap\ActiveForm;
use mihaildev\ckeditor\CKEditor;


$this->title = 'Галерея';

?>
<div class="row">
    <div class="col-md-1"></div>
    <div class="col-md-10">
        <div class="gallery fadeIn animated">


            <div class='item clearfix'>
                <div class='img hidden-lg hidden-md'>
                    <a href='<?=Yii::$app->getUrlManager()->createUrl('authorgallery/1')?>'><img src='img/userimg/vlad1.jpg' /></a>
                </div>
                <div class='txt'>
                    <div class='title'><a href='<?=Yii::$app->getUrlManager()->createUrl('authorgallery/1')?>'>Имя автора </a></div>
                    <div class='desc hidden-md hidden-xs'>

                    </div>
                    <a href='<?=Yii::$app->getUrlManager()->createUrl('authorgallery/1')?>'>Об авторе<span class='arrow right grey'></span></a>
                </div>
                <div class='img hidden-sm hidden-xs'>
                    <a href='<?=Yii::$app->getUrlManager()->createUrl('authorgallery/1')?>'><img src='img/userimg/vlad1.jpg' /></a>
                </div>
                <div class='mini hidden-sm hidden-xs'>
                    <a href='<?=Yii::$app->getUrlManager()->createUrl('authorgallery/1')?>'><img src='img/userimg/vlad2.jpg' /></a>
                    <a href='<?=Yii::$app->getUrlManager()->createUrl('authorgallery/1')?>'><img src='img/userimg/vlad3.jpg' /></a>
                    <a href='<?=Yii::$app->getUrlManager()->createUrl('authorgallery/1')?>'><img src='img/userimg/vlad4.jpg' /></a>
                    <a href='<?=Yii::$app->getUrlManager()->createUrl('authorgallery/1')?>'><img src='img/userimg/vlad5.jpg' /></a>
                    <a href='<?=Yii::$app->getUrlManager()->createUrl('authorgallery/1')?>'><img src='img/userimg/vlad6.jpg' class='last' /></a>
                </div>
            </div>


            <div class='item clearfix'>
                <div class='img hidden-lg hidden-md'>
                    <a href='/authors/John-Pepper'><img src='img/pic3.jpg' /></a>
                </div>
                <div class='txt'>
                    <div class='title'><a href='/authors/John-Pepper'>Имя автора </a></div>
                    <div class='desc hidden-md hidden-xs'>

                    </div>
                    <a href='/authors/John-Pepper'>Об авторе<span class='arrow right grey'></span></a>
                </div>
                <div class='img hidden-sm hidden-xs'>
                    <a href='/authors/John-Pepper'><img src='img/pic3.jpg' /></a>
                </div>
                <div class='mini hidden-sm hidden-xs'>
                    <a href='/authors/John-Pepper'><img src='img/pic3.jpg' /></a>
                    <a href='/authors/John-Pepper'><img src='img/pic3.jpg' /></a>
                    <a href='/authors/John-Pepper'><img src='img/pic3.jpg' /></a>
                    <a href='/authors/John-Pepper'><img src='img/pic3.jpg' /></a>
                    <a href='/authors/John-Pepper'><img src='img/pic3.jpg' class='last' /></a>
                </div>
            </div>

        </div>
    </div>
</div>
<div class="col-md-1"></div>