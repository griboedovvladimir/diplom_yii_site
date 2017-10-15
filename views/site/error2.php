<?php

/* @var $this yii\web\View */
/* @var $name string */
/* @var $message string */
/* @var $exception Exception */

use yii\helpers\Html;

$this->title = $name;
?>
<div class="site-error">

<!--    <h1>--><?//= Html::encode($this->title) ?><!--</h1>-->

    <div class="alert alert-danger">
        <?="<h3>Эта страница не существует, либо у вас недостаточно прав для ее просмотра</h3>" ?>
    </div>

</div>
