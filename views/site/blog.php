<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use \yii\bootstrap\ActiveForm;
use mihaildev\ckeditor\CKEditor;
use yii\widgets\LinkPager;

$this->title = 'Блог';

?>

    <div class="row blogpage">
    <div class="col-md-1"></div>
    <div class="col-md-8 blogback">

<?php
foreach ($models as $mod) {
    $img="<img class='blogimg' src='/".$mod->blog_image."'>";
    $title="<div class='blogtitle'>$mod->title</div>";
    echo "<a href=".Yii::$app->getUrlManager()->createUrl('blog')."/".$mod->blog_id."><h3>".$img.$title."</h3></a>";
}
$get=Yii::$app->request->get('id');

echo "<h2>$article->title</h2><p>$article->text</p>";
if($get || $get==='0'){
    $linkblog=Yii::$app->getUrlManager()->createUrl('blog');
    echo "<a href='$linkblog'> <button type=\"button\" class=\"btn btn-default btn-danger\">Назад</button></a>";
}
?>

<?php
if(!$get) {
    echo LinkPager::widget([
        'pagination' => $pages,
    ]);
}
;?>

    </div>
        <div class="col-md-1"></div>
    </div>