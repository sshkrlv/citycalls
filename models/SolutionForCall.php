<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "solutionForCall".
 *
 * @property int $callId
 * @property int $solutionId
 * @property int $isApproved
 *
 * @property Call $call
 * @property Solution $solution
 */
class SolutionForCall extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'solutionForCall';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['callId', 'solutionId'], 'required'],
            [['callId', 'solutionId', 'isApproved'], 'integer'],
            [['callId', 'solutionId'], 'unique', 'targetAttribute' => ['callId', 'solutionId']],
            [['callId'], 'exist', 'skipOnError' => true, 'targetClass' => Call::className(), 'targetAttribute' => ['callId' => 'callId']],
            [['solutionId'], 'exist', 'skipOnError' => true, 'targetClass' => Solution::className(), 'targetAttribute' => ['solutionId' => 'solutionId']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'callId' => 'Call ID',
            'solutionId' => 'Solution ID',
            'isApproved' => 'Is Approved',
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
     * Gets query for [[Solution]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSolution()
    {
        return $this->hasOne(Solution::className(), ['solutionId' => 'solutionId']);
    }
}
