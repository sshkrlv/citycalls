<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "mediaArticles".
 *
 * @property int $articleId
 * @property string $title
 * @property string $date
 * @property string $link
 * @property int $imageId
 *
 * @property Image $image
 */
class Smi extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'mediaArticles';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title', 'date', 'link', 'imageId'], 'required'],
            [['date'], 'safe'],
            [['imageId'], 'integer'],
            [['title', 'link'], 'string', 'max' => 255],
            [['imageId'], 'exist', 'skipOnError' => true, 'targetClass' => Image::className(), 'targetAttribute' => ['imageId' => 'imageId']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'articleId' => 'Article ID',
            'title' => 'Title',
            'date' => 'Date',
            'link' => 'Link',
            'imageId' => 'Image ID',
        ];
    }

    /**
     * Gets query for [[Image]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getImage()
    {
        return $this->hasOne(Image::className(), ['imageId' => 'imageId']);
    }
}
