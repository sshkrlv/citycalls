<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "callTypeofProblem".
 *
 * @property int $callId
 * @property int $typeId
 *
 * @property Call $call
 * @property TypeOfProblem $type
 */
class CallTypeofProblem extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'callTypeofProblem';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['callId', 'typeId'], 'required'],
            [['callId', 'typeId'], 'integer'],
            [['callId', 'typeId'], 'unique', 'targetAttribute' => ['callId', 'typeId']],
            [['callId'], 'exist', 'skipOnError' => true, 'targetClass' => Call::className(), 'targetAttribute' => ['callId' => 'callId']],
            [['typeId'], 'exist', 'skipOnError' => true, 'targetClass' => TypeOfProblem::className(), 'targetAttribute' => ['typeId' => 'typeId']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'callId' => 'Call ID',
            'typeId' => 'Type ID',
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
     * Gets query for [[Type]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getType()
    {
        return $this->hasOne(TypeOfProblem::className(), ['typeId' => 'typeId']);
    }
}
