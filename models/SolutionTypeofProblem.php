<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "solutionTypeofProblem".
 *
 * @property int $typeId
 * @property int $solutionId
 *
 * @property TypeOfProblem $type
 * @property Solution $solution
 */
class SolutionTypeofProblem extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'solutionTypeofProblem';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['typeId', 'solutionId'], 'required'],
            [['typeId', 'solutionId'], 'integer'],
            [['typeId', 'solutionId'], 'unique', 'targetAttribute' => ['typeId', 'solutionId']],
            [['typeId'], 'exist', 'skipOnError' => true, 'targetClass' => TypeOfProblem::className(), 'targetAttribute' => ['typeId' => 'typeId']],
            [['solutionId'], 'exist', 'skipOnError' => true, 'targetClass' => Solution::className(), 'targetAttribute' => ['solutionId' => 'solutionId']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'typeId' => 'Type ID',
            'solutionId' => 'Solution ID',
        ];
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
