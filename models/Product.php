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
class Product extends ActiveRecord
{
    public static function tablename(){
        return 'Product';
    }

    public function getCategory()
    {
        return $this->hasOne(Category::className(), ['category_id' => 'category_id']);
    }
    public function getUser()
    {
        return $this->hasOne(User::className(), ['user_id' => 'users_id']);
    }

    public function rules()
    {
        return [
            [['product_name'], 'required'],
        ];
    }


}
