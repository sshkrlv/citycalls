<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "solutionTechnology".
 *
 * @property int $technologyId
 * @property int $solutionId
 *
 * @property Technology $technology
 * @property Solution $solution
 */
class SolutionTechnology extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'solutionTechnology';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['technologyId', 'solutionId'], 'required'],
            [['technologyId', 'solutionId'], 'integer'],
            [['technologyId', 'solutionId'], 'unique', 'targetAttribute' => ['technologyId', 'solutionId']],
            [['technologyId'], 'exist', 'skipOnError' => true, 'targetClass' => Technology::className(), 'targetAttribute' => ['technologyId' => 'technologyId']],
            [['solutionId'], 'exist', 'skipOnError' => true, 'targetClass' => Solution::className(), 'targetAttribute' => ['solutionId' => 'solutionId']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'technologyId' => 'Technology ID',
            'solutionId' => 'Solution ID',
        ];
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
