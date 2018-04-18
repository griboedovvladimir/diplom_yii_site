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

<?
foreach($user as $usergallery){ $link=$usergallery->users_id;
     foreach($images as $img){if($usergallery->users_id==$img->users_id)
{if($img->image ){
    ?>

            <div class='item clearfix'>
                <div class='img hidden-lg hidden-md'>
                    <a href="<?=Yii::$app->getUrlManager()->createUrl('authorgallery/'.$link.'')?>"><img src='<? $i=0; foreach($images as $img){ $i++; if($i>5 && $usergallery->users_id==$img->users_id ){echo $img->image; break;}}?>' /></a>
                </div>
                <div class='txt'>
                    <div class='title'><a href='<?=Yii::$app->getUrlManager()->createUrl('authorgallery/'.$link.'')?>'><?=$usergallery->username." ".$usergallery->surname?> </a></div>
                    <div class='desc hidden-md hidden-xs'>

                    </div>
                    <a href='<?=Yii::$app->getUrlManager()->createUrl('authorgallery/'.$link.'')?>'>Подробнее<span class='arrow right grey'></span></a>
                </div>
                <div class='img hidden-sm hidden-xs'>
                    <a href='<?=Yii::$app->getUrlManager()->createUrl('authorgallery/'.$link.'')?>'><img src='<? $i=0; foreach($images as $img){ $i++; if($i>6 && $usergallery->users_id==$img->users_id){echo $img->image; break;}}?>' /></a>
                </div>
                <div class='mini hidden-sm hidden-xs'>
                    <? $i=0; foreach($images as $img)
                    {if($usergallery->users_id==$img->users_id)
                    {$link2=$img->image;?>
                        <a href='<?=Yii::$app->getUrlManager()->createUrl('authorgallery/'.$link.'')?>'><img src='<?=$link2?>' /></a>
                   <? $i++;
                    if($i >3) break; }}?>
                    <? $i=0; foreach($images as $img)
                    {if($usergallery->users_id==$img->users_id)
                    {$link2=$img->image;$i++; if($i >4){?>
                        <a href='<?=Yii::$app->getUrlManager()->createUrl('authorgallery/'.$link.'')?>'><img src='<?=$link2?>'  class='last'/></a>
                        <?;
                         break; }}}?>

                </div>
            </div>
<?break;}}}}?>

<!--            <div class='item clearfix'>-->
<!--                <div class='img hidden-lg hidden-md'>-->
<!--                    <a href='/authors/John-Pepper'><img src='img/pic3.jpg' /></a>-->
<!--                </div>-->
<!--                <div class='txt'>-->
<!--                    <div class='title'><a href='/authors/John-Pepper'>Имя автора </a></div>-->
<!--                    <div class='desc hidden-md hidden-xs'>-->
<!---->
<!--                    </div>-->
<!--                    <a href='/authors/John-Pepper'>Об авторе<span class='arrow right grey'></span></a>-->
<!--                </div>-->
<!--                <div class='img hidden-sm hidden-xs'>-->
<!--                    <a href='/authors/John-Pepper'><img src='img/pic3.jpg' /></a>-->
<!--                </div>-->
<!--                <div class='mini hidden-sm hidden-xs'>-->
<!--                    <a href='/authors/John-Pepper'><img src='img/pic3.jpg' /></a>-->
<!--                    <a href='/authors/John-Pepper'><img src='img/pic3.jpg' /></a>-->
<!--                    <a href='/authors/John-Pepper'><img src='img/pic3.jpg' /></a>-->
<!--                    <a href='/authors/John-Pepper'><img src='img/pic3.jpg' /></a>-->
<!--                    <a href='/authors/John-Pepper'><img src='img/pic3.jpg' class='last' /></a>-->
<!--                </div>-->
<!--            </div>-->

        </div>
    </div>
</div>
<div class="col-md-1"></div>