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
class Users extends ActiveRecord
{
    public static function tablename(){
        return 'Users';
    }

    public function getImages()
    {
        return $this->hasMany(Images::className(), ['users_id' => 'users_id']);
    }
    public function getProduct()
    {
        return $this->hasMany(Product::className(), ['users_id' => 'users_id']);
    }
    public function findByUsername()
    {
        return User::find()->where(['username' => 'Владимир'])->one();
    }
    public function rules()
    {
        return [
            [['username'], 'required'],
        ];
    }


}
