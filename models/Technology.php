<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "technology".
 *
 * @property int $technologyId
 * @property string $name
 *
 * @property CallTechnology[] $callTechnologies
 * @property Call[] $calls
 * @property SolutionTechnology[] $solutionTechnologies
 * @property Solution[] $solutions
 */
class Technology extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'technology';
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
            'technologyId' => 'Technology ID',
            'name' => 'Name',
        ];
    }

    /**
     * Gets query for [[CallTechnologies]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCallTechnologies()
    {
        return $this->hasMany(CallTechnology::className(), ['technologyId' => 'technologyId']);
    }

    /**
     * Gets query for [[Calls]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCalls()
    {
        return $this->hasMany(Call::className(), ['callId' => 'callId'])->viaTable('callTechnology', ['technologyId' => 'technologyId']);
    }

    /**
     * Gets query for [[SolutionTechnologies]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSolutionTechnologies()
    {
        return $this->hasMany(SolutionTechnology::className(), ['technologyId' => 'technologyId']);
    }

    /**
     * Gets query for [[Solutions]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSolutions()
    {
        return $this->hasMany(Solution::className(), ['solutionId' => 'solutionId'])->viaTable('solutionTechnology', ['technologyId' => 'technologyId']);
    }
}
