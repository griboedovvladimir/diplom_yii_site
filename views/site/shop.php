<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use \yii\bootstrap\ActiveForm;
use mihaildev\ckeditor\CKEditor;


$this->title = 'Фотолавка';
?>

<div class="row shopfon fadeIn animated">
    <div class="col-md-1"></div>
    <div class="col-md-10">
        <?php foreach($query as $cat){?>
            <?$link=$cat->category_id?>
      <a href="<?=Yii::$app->getUrlManager()->createUrl('products/'.$link.'')?>">  <div class="shop_category">
           <div>
                <h3><?=$cat->category_name?></h3>
                <p><?=$cat->category_about?></p>
            </div>
            <img src="/<?=$cat->Image?>" class="pull-right" ><div>
            </div>
          </div> </a>
<? } ?>
    </div>
    <div class="col-md-1"></div>
</div>