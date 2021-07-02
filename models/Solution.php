<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "solution".
 *
 * @property int $solutionId
 * @property string $solutionName
 * @property string|null $briefDescription
 * @property string|null $description
 * @property int|null $supplierId
 * @property int $typeId
 *
 * @property TypeofSolution $type
 * @property Supplier $supplier
 * @property SolutionForCall[] $solutionForCalls
 * @property Call[] $calls
 * @property SolutionScope[] $solutionScopes
 * @property Scope[] $scopes
 * @property SolutionTechnology[] $solutionTechnologies
 * @property Technology[] $technologies
 * @property SolutionTypeofProblem[] $solutionTypeofProblems
 * @property TypeOfProblem[] $types
 */
class Solution extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'solution';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['solutionName', 'typeId'], 'required'],
            [['briefDescription', 'description'], 'string'],
            [['supplierId', 'typeId'], 'integer'],
            [['solutionName'], 'string', 'max' => 255],
            [['typeId'], 'exist', 'skipOnError' => true, 'targetClass' => TypeofSolution::className(), 'targetAttribute' => ['typeId' => 'typeId']],
            [['supplierId'], 'exist', 'skipOnError' => true, 'targetClass' => Supplier::className(), 'targetAttribute' => ['supplierId' => 'supplierId']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'solutionId' => 'Solution ID',
            'solutionName' => 'Solution Name',
            'briefDescription' => 'Brief Description',
            'description' => 'Description',
            'supplierId' => 'Supplier ID',
            'typeId' => 'Type ID',
        ];
    }

    /**
     * Gets query for [[Type]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getType()
    {
        return $this->hasOne(TypeofSolution::className(), ['typeId' => 'typeId']);
    }

    /**
     * Gets query for [[Supplier]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSupplier()
    {
        return $this->hasOne(Supplier::className(), ['supplierId' => 'supplierId']);
    }

    /**
     * Gets query for [[SolutionForCalls]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSolutionForCalls()
    {
        return $this->hasMany(SolutionForCall::className(), ['solutionId' => 'solutionId']);
    }

    /**
     * Gets query for [[Calls]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCalls()
    {
        return $this->hasMany(Call::className(), ['callId' => 'callId'])->viaTable('solutionForCall', ['solutionId' => 'solutionId']);
    }

    /**
     * Gets query for [[SolutionScopes]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSolutionScopes()
    {
        return $this->hasMany(SolutionScope::className(), ['solutionId' => 'solutionId']);
    }

    /**
     * Gets query for [[Scopes]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getScopes()
    {
        return $this->hasMany(Scope::className(), ['scopeId' => 'scopeId'])->viaTable('solutionScope', ['solutionId' => 'solutionId']);
    }

    /**
     * Gets query for [[SolutionTechnologies]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSolutionTechnologies()
    {
        return $this->hasMany(SolutionTechnology::className(), ['solutionId' => 'solutionId']);
    }

    /**
     * Gets query for [[Technologies]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTechnologies()
    {
        return $this->hasMany(Technology::className(), ['technologyId' => 'technologyId'])->viaTable('solutionTechnology', ['solutionId' => 'solutionId']);
    }

    /**
     * Gets query for [[SolutionTypeofProblems]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSolutionTypeofProblems()
    {
        return $this->hasMany(SolutionTypeofProblem::className(), ['solutionId' => 'solutionId']);
    }

    /**
     * Gets query for [[Types]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTypes()
    {
        return $this->hasMany(TypeOfProblem::className(), ['typeId' => 'typeId'])->viaTable('solutionTypeofProblem', ['solutionId' => 'solutionId']);
    }
}
