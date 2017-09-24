<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use \yii\bootstrap\ActiveForm;
use mihaildev\ckeditor\CKEditor;


$this->title = 'About';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-about">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        This is the About page. You may modify the following file to customize its content:
    </p>

    <code><?= __FILE__ ?></code>
</div>
<div class="row">
    <div class="col-lg-12">
        <?php
        $form = ActiveForm::begin([
            'layout' => 'horizontal',
            'fieldConfig' => [
                'template' => "{label}\n<div class=\"col-lg-8\">{input}</div>\n<div class=\"col-lg-3\">{error}</div>",
                'labelOptions' => ['class' => 'col-lg-1 control-label'],
            ],
        ]);
        ?>
        <h2>Header</h2>
        <?php echo $form->field($model, 'name')->textInput(['class' => 'foo']); ?>
        <?= $form->field($model, 'data')->widget(CKEditor::className(), [
            'editorOptions' => [
                'preset' => 'full', //разработанны стандартные настройки basic, standard, full данную возможность не обязательно использовать
                'inline' => false, //по умолчанию false
            ],
        ]); ?>
        <input type="submit">
        <?php $form::end(); ?>
    </div>
</div>