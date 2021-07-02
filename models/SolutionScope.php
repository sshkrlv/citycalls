<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "solutionScope".
 *
 * @property int $scopeId
 * @property int $solutionId
 *
 * @property Scope $scope
 * @property Solution $solution
 */
class SolutionScope extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'solutionScope';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['scopeId', 'solutionId'], 'required'],
            [['scopeId', 'solutionId'], 'integer'],
            [['scopeId', 'solutionId'], 'unique', 'targetAttribute' => ['scopeId', 'solutionId']],
            [['scopeId'], 'exist', 'skipOnError' => true, 'targetClass' => Scope::className(), 'targetAttribute' => ['scopeId' => 'scopeId']],
            [['solutionId'], 'exist', 'skipOnError' => true, 'targetClass' => Solution::className(), 'targetAttribute' => ['solutionId' => 'solutionId']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'scopeId' => 'Scope ID',
            'solutionId' => 'Solution ID',
        ];
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
