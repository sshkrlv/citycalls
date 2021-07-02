<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "review".
 *
 * @property int $reviewId
 * @property int|null $isCustomer
 * @property string $name
 * @property string $post
 * @property string $text
 * @property int|null $imageId
 * @property int|null $callId
 *
 * @property Image $image
 * @property Call $call
 */
class Review extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'review';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['isCustomer', 'imageId', 'callId'], 'integer'],
            [['name', 'post', 'text'], 'required'],
            [['text'], 'string'],
            [['name', 'post'], 'string', 'max' => 255],
            [['imageId'], 'exist', 'skipOnError' => true, 'targetClass' => Image::className(), 'targetAttribute' => ['imageId' => 'imageId']],
            [['callId'], 'exist', 'skipOnError' => true, 'targetClass' => Call::className(), 'targetAttribute' => ['callId' => 'callId']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'reviewId' => 'Review ID',
            'isCustomer' => 'Is Customer',
            'name' => 'Name',
            'post' => 'Post',
            'text' => 'Text',
            'imageId' => 'Image ID',
            'callId' => 'Call ID',
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

    /**
     * Gets query for [[Call]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCall()
    {
        return $this->hasOne(Call::className(), ['callId' => 'callId']);
    }
}
