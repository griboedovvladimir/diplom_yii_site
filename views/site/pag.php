<?php

use yii\widgets\LinkPager;
foreach ($models as $model) {
    // выводим название организации (пример)
    echo $model->Title;
}

// отображаем постраничную разбивку
echo LinkPager::widget([
    'pagination' => $pages,
]);

/**
 * Created by PhpStorm.
 * User: User
 * Date: 24.08.2017
 * Time: 19:44
 */