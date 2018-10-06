<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "products".
 *
 * @property int $id
 * @property string $title
 * @property string $description
 * @property int $cath
 * @property int $parent
 * @property string $image
 */
class Products extends \yii\db\ActiveRecord
{

    public $file;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'products';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title', 'description', 'cath', 'parent'], 'required'],
            [['description'], 'string'],
            [['cath', 'parent'], 'integer'],
            [['title', 'image', 'thumbs'], 'string', 'max' => 256],
            ['file',  'file'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'title' => Yii::t('app', 'Title'),
            'description' => Yii::t('app', 'Description'),
            'cath' => Yii::t('app', 'Cath'),
            'parent' => Yii::t('app', 'Parent'),
            'image' => Yii::t('app', 'Image'),
        ];
    }

    public function getProducts() {
        return $this->hasOne(Products::className(), ['id' => 'parent']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(Category::className(), ['id' => 'cath']);
    }

    public function getImage($id)
    {
        if(isset($image) && file_exists($_SERVER['DOCUMENT_ROOT'].
        Yii::app()->urlManager->baseUrl.
        '/images/'.$create_year.'/'.$image))
            return CHtml::image(Yii::app()->getBaseUrl(true).'/images/'.$create_year.'/'.$image, $title, ['width'=>$width, 'class'=>$class]);
        else
            return CHtml::image(Yii::app()->getBaseUrl(true).'/images/pics/noimage.gif','Нет картинки',
            array(
            'width'=>$width,
            'class'=>$class
            ));
    }

    public function upload()
    {
        if ($this->validate()) {
            return true;
        } else {
            return false;
        }
    }
}
