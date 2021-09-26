<?php


namespace backend\models;


use yii\web\UploadedFile;

class Team extends \common\models\Team
{
    /**
     * @var UploadedFile
     */
    public $newLogo;

    public function rules()
    {
        return [
            [['name', 'location'], 'required'],
            [['description'], 'string'],
            [['name', 'logo', 'location'], 'string', 'max' => 255],
            [['newLogo'], 'file', 'skipOnEmpty' => true, /*'extensions' => 'png, jpg'*/]
        ];
    }

    public function upload()
    {
        if ($this->newLogo){
            $file = $this->newLogo;
            $filename = \Yii::$app->security->generateRandomString() . '.' . $file->extension;
            $file->saveAs('@uploads/' . $filename);
            $this->logo = $filename;
            return true;
        }
    }

}