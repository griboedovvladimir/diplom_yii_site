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
class Blog extends ActiveRecord
{
    public static function tablename(){
        return 'Blog';
    }

    public function getNews()
    {
        return $this->hasOne(Blog::className(), ['blog_id' => 'blog_id']);
    }

    public function rules()
    {
        return [
            [['title'], 'required'],
        ];
    }


}
