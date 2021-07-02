<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "callTechnology".
 *
 * @property int $callId
 * @property int $technologyId
 *
 * @property Call $call
 * @property Technology $technology
 */
class CallTechnology extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'callTechnology';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['callId', 'technologyId'], 'required'],
            [['callId', 'technologyId'], 'integer'],
            [['callId', 'technologyId'], 'unique', 'targetAttribute' => ['callId', 'technologyId']],
            [['callId'], 'exist', 'skipOnError' => true, 'targetClass' => Call::className(), 'targetAttribute' => ['callId' => 'callId']],
            [['technologyId'], 'exist', 'skipOnError' => true, 'targetClass' => Technology::className(), 'targetAttribute' => ['technologyId' => 'technologyId']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'callId' => 'Call ID',
            'technologyId' => 'Technology ID',
        ];
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

    /**
     * Gets query for [[Technology]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTechnology()
    {
        return $this->hasOne(Technology::className(), ['technologyId' => 'technologyId']);
    }
}
