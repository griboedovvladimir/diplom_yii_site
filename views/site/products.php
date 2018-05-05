<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use \yii\bootstrap\ActiveForm;
use mihaildev\ckeditor\CKEditor;

$this->title = $cat->category_name;

?>

<div class="productsfon fadeIn animated">
    <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-8">
            <ol class="breadcrumb">
                <li><a href="<?=Yii::$app->getUrlManager()->createUrl('shop')?>">Фотолавка</a></li>
                <li class="active"><?=$cat->category_name?></li>
            </ol>
        </div>
        <div class="col-md-2">
            <button type="button" data-toggle="dropdown" id="catbtn" class="btn btn-default dropdown-toggle">Выбрать категорию<span class="caret"></span></button>
            <ul class="dropdown-menu">
                <?
                foreach ($allcat as $allcategory){ $link=$allcategory->category_id?>
                <li><a href="<?=Yii::$app->getUrlManager()->createUrl('products/'.$link.'')?>"><?=$allcategory->category_name?></a></li>
                <?}?>
            </ul>
        </div>
        <div class="col-md-1"></div>
    </div>

    <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-10">

            <div class="productwrap">
                <? foreach  ($productcard as $card){?>
                <div class="product productcard">
                   <? if ($card->users_id==Yii::$app->user->identity->users_id || Yii::$app->user->can('admin')) {
                       ///echo '<button class="removeItem" style = "background-color: transparent; border: none;float:right;font-size: 16pt" data - toggle = "tooltip" title = "Удалить товар" >&#215</button>';
                       echo Html::a('&#215',
                           ['products/' . $cat->category_id],  [
                               'data-method' => 'POST',
                               'data-params' => [
                                   'product_id' => $card->product_id,
                                   'productImg'=> $card->image
                               ]
                           ]);
                   };?>
                    <script>
                        var a=document.querySelectorAll('.productcard a');
                     a.forEach(function(i,item)
                        {
                            i.setAttribute('data-toggle', 'tooltip');
                            i.setAttribute('title', 'Удалить товар');
                        })
                    </script>
                    <div class="product-img">
                        <img style='max-height:190px' src="/<?=$card->image?>" alt="">
                    </div>
                    <h4 class="product-title"><?=$card->product_name?></h4>
                    <p class="product-desc"><?=$card->aboutproduct?></p>
                    <p style="color:grey">Имя продавца:</p>
                    <? foreach  ($username as $name){
                        if($name->users_id==$card->users_id){
                          echo  "<p>".$name->username." ".$name->surname."</p>";
                        }
                    }?>
                    <p style="color:grey">Контакты продавца:</p>
                    <p><?=$card->contacts?></p>
                    <p class="product-price">Цена: <?=$card->price?> руб.</p>
                </div>
<?}?>

            </div>
        </div>
        <div class="col-md-1"></div>
    </div>
</div>
<div class="row">
    <div class="col-md-2"></div>
    <?
    if (Yii::$app->user->can('update')) {
        echo '<div class="col-md-8" > <button type = "button" id = "productAddBtn" class="btn btn-default addbtn" > Добавить товар </button > </div >';
    }
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
                <h4 class="modal-title">Добавить товар в категорию "<?=$cat->category_name?>"</h4>
            </div>
            <!-- Основное содержимое модального окна -->
            <form id="productsForm" method="post" enctype="multipart/form-data">
                <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]) ?>

            <div class="modal-body">
                <div class="form-group">
                    <label for="inputProductName">Наименование товара</label>
                    <input name="inputProductName" class="form-control" id="inputProductName" placeholder="Введите названеи товара">

                    <label for="aboutProductTextArea">Краткая информация о товаре</label>
                    <textarea name="aboutProductTextArea" class="form-control" id="aboutProductTextArea" rows="3"></textarea>
                </div>
                <div class="form-group">
<!
                    <label for="inputProductContacts">Контактная информация</label>
                    <input name="inputProductContacts" class="form-control" id="inputProductContacts" placeholder="Введите контакты">
                    <label for="inputProductPrice">Цена товара</label>
                    <input name="inputProductPrice" class="form-control" id="inputProductPrice" placeholder="Введите цену в рублях">

                </div>
                <div class="form-group">
                    <?= $form->field($model, 'imageFile')->fileInput() ?>
                </div>
            </div>
            <!-- Футер модального окна -->
            <div class="modal-footer">
                <button type="button" class="btn btn-defaultmodal" data-dismiss="modal">Закрыть</button>
                <input class="btn btn-primary" type="submit"  value="Добавить">
            </div>
                <?php ActiveForm::end() ?>
            </form>
        </div>
    </div>
</div>

