<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "nav".
 *
 * @property integer $id
 * @property string $name
 * @property string $adres
 */
class Nav extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'nav';
    }

    public static $arr = [
        ['name' => 'About', 'adres' => '#'],
        ['name' => 'gallery', 'adres' => '#'],
        ['name' => 'shop', 'adres' => '#']
    ];

    public static function toArr()
    {
        $array = [];
        foreach (self::$arr as $item) {
            $array[] = ['url' => $item['adres'], 'label' => $item['name']];
        }
        return $array;
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'adres'], 'required'],
            [['name'], 'string', 'max' => 120],
            [['adres'], 'string', 'max' => 80],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'название',
            'adres' => 'адрес',
        ];
    }
}
