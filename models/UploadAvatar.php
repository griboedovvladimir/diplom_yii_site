<?php

namespace app\models;

use yii\base\Model;
use yii\web\UploadedFile;

class UploadAvatar extends Model
{
    /**
     * @var UploadedFile
     */
    public $imageFile;

    public function rules()
    {
        return [
            [['imageFile'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg, jpeg','maxSize' => 1200*1200],
        ];
    }
    public function attributeLabels()
    {
        return [
            'imageFile' => 'Загрузить аватар',

//etc...
        ];
    }
    public function upload($uniq)
    {
        if ($this->validate()) {
            $this->imageFile->saveAs('img/userimg/' .$uniq. $this->imageFile->baseName . '.' . $this->imageFile->extension);

            return true;
        } else {
            return false;
        }
    }
    public function afterDelete ($path) {
        if(file_exists (  $path )) {
            unlink($path);
        }
    }

}