<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "callScope".
 *
 * @property int $callId
 * @property int $scopeId
 *
 * @property Call $call
 * @property Scope $scope
 */
class CallScope extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'callScope';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['callId', 'scopeId'], 'required'],
            [['callId', 'scopeId'], 'integer'],
            [['callId', 'scopeId'], 'unique', 'targetAttribute' => ['callId', 'scopeId']],
            [['callId'], 'exist', 'skipOnError' => true, 'targetClass' => Call::className(), 'targetAttribute' => ['callId' => 'callId']],
            [['scopeId'], 'exist', 'skipOnError' => true, 'targetClass' => Scope::className(), 'targetAttribute' => ['scopeId' => 'scopeId']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'callId' => 'Call ID',
            'scopeId' => 'Scope ID',
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
     * Gets query for [[Scope]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getScope()
    {
        return $this->hasOne(Scope::className(), ['scopeId' => 'scopeId']);
    }
}
