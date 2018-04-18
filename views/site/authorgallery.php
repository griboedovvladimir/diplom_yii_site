<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use \yii\bootstrap\ActiveForm;
use mihaildev\ckeditor\CKEditor;
use yii\widgets\LinkPager;


$this->title = $author->username." ".$author->surname;

?>
<div class="row">
    <div class="col-md-1"></div>
    <div class="col-md-10">
        <ol class="breadcrumb">
            <li><a href="<?=Yii::$app->getUrlManager()->createUrl('gallery')?>">Галерея</a></li>
            <li class="active"><?=$author->username?> <?=$author->surname?></li>
        </ol>
    </div>
    <div class="col-md-1"></div>
</div>
<div class="row">
    <div class="col-md-1"></div>
    <div class="col-md-3 aboutauthor"><h2><?=$author->username?> <?=$author->surname?></h2><p><?=$author->about?></p></div>
    <div class="col-md-7 avatar" style="background-image: url('/<?=$author->avatar?>');background-repeat: no-repeat"></div>
    <div class="col-md-1"></div>
</div>

<div class="row">
    <div class="col-md-1"></div>
    <div class="col-md-10 agal">
        <?php foreach ($allimg as $img){
            echo '<a href="/'.$img->image.'" data-fancybox data-caption=""><img class="works center-block" src="/'.$img->image.'" alt="" /></a>';
           // echo $img->image;
        }
        ?>

    </div>
    <div class="col-md-1"></div>
</div>


<div class="row">
    <div class="col-md-2"></div>
    <? if ((Yii::$app->user->can('update'))&& Yii::$app->request->get('id')==Yii::$app->user->identity->users_id){
    echo '<div class="col-md-8"><button type="button" id="galleryAddBtn" class="btn btn-default addbtn">Добавить / удалить фотоработу</button> </div>';}
    elseif(Yii::$app->user->can('admin')){
        echo '<div class="col-md-8"><button type="button" id="galleryAddBtn" class="btn btn-default addbtn">Добавить / удалить фотоработу</button> </div>';
    };
    ?>
    <div class="col-md-2"></div>
</div>

<!-- HTML-код модального окна -->
<div id="myModalBox" class="modal fade" >
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Заголовок модального окна -->
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title">Добавить / удалить фотоработу </h4>
            </div>
            <!-- Основное содержимое модального окна -->
            <form id="authorgalleryForm" method="post" enctype="multipart/form-data">
            <div class="modal-body">
                <div class="form-group">
                    <p>Загруженные работы:</p>
                    <div class="form-check">
<?php foreach ($allimg as $img){ ?>

    <label class="form-check-label" >
                            <input type = "checkbox" class="form-check-input" >
                            <img class="worksfordelete" src = "/<?=$img->image ?>">
                        </label >
    <?php } ?>
                    </div>
                    <button type="submit" class="btn btn-danger">Удалить отмеченные</button>

                </div>

                <div class="form-group">
                    <label for="inputWork">Добавить фото</label>
                    <input name="inputWork" type="file" id="inputWork" class="filestyle" data-placeholder="Файл не выбран">
                </div>

            </div>

            <!-- Футер модального окна -->
            <div class="modal-footer">
                <button type="button" class="btn btn-defaultmodal" data-dismiss="modal">Закрыть</button>
                <input class="btn btn-primary" type="submit" value="Добавить">
            </div>

            </form>
        </div>
    </div>
</div>
