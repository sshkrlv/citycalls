<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "typeOfProblem".
 *
 * @property int $typeId
 * @property string $name
 *
 * @property CallTypeofProblem[] $callTypeofProblems
 * @property Call[] $calls
 * @property SolutionTypeofProblem[] $solutionTypeofProblems
 * @property Solution[] $solutions
 */
class TypeOfProblem extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'typeOfProblem';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['name'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'typeId' => 'Type ID',
            'name' => 'Name',
        ];
    }

    /**
     * Gets query for [[CallTypeofProblems]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCallTypeofProblems()
    {
        return $this->hasMany(CallTypeofProblem::className(), ['typeId' => 'typeId']);
    }

    /**
     * Gets query for [[Calls]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCalls()
    {
        return $this->hasMany(Call::className(), ['callId' => 'callId'])->viaTable('callTypeofProblem', ['typeId' => 'typeId']);
    }

    /**
     * Gets query for [[SolutionTypeofProblems]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSolutionTypeofProblems()
    {
        return $this->hasMany(SolutionTypeofProblem::className(), ['typeId' => 'typeId']);
    }

    /**
     * Gets query for [[Solutions]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSolutions()
    {
        return $this->hasMany(Solution::className(), ['solutionId' => 'solutionId'])->viaTable('solutionTypeofProblem', ['typeId' => 'typeId']);
    }
}
