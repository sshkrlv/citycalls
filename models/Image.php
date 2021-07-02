<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "image".
 *
 * @property int $imageId
 * @property string|null $caption
 * @property string $filename
 *
 * @property MediaArticles[] $mediaArticles
 * @property Review[] $reviews
 */
class Image extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'image';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['filename'], 'required'],
            [['caption', 'filename'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'imageId' => 'Image ID',
            'caption' => 'Caption',
            'filename' => 'Filename',
        ];
    }

    /**
     * Gets query for [[MediaArticles]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getMediaArticles()
    {
        return $this->hasMany(MediaArticles::className(), ['imageId' => 'imageId']);
    }

    /**
     * Gets query for [[Reviews]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getReviews()
    {
        return $this->hasMany(Review::className(), ['imageId' => 'imageId']);
    }
}
