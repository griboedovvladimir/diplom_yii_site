<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\db\ActiveRecord;

/**
 * LoginForm is the model behind the login form.
 *
 * @property User|null $user This property is read-only.
 *
 */
class Category extends ActiveRecord
{
    public static function tablename(){
        return 'Category';
    }

    public function getProduct()
    {
        return $this->hasMany(Product::className(), ['category_id' => 'category_id']);
    }

    public function rules()
    {
        return [
            [['product_name'], 'required'],
        ];
    }


}
