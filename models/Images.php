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
class Images extends ActiveRecord
{
    public static function tablename(){
        return 'Images';
    }

    public function getUser()
    {
        return $this->hasOne(Users::className(), ['users_id' => 'users_id']);
    }

    public function rules()
    {
        return [
            [['image'], 'required'],
        ];
    }


}
