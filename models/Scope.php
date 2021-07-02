<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "scope".
 *
 * @property int $scopeId
 * @property string $scopeName
 * @property int|null $parentScopeId
 *
 * @property ApplicationForm[] $applicationForms
 * @property CallScope[] $callScopes
 * @property Call[] $calls
 * @property Scope $parentScope
 * @property Scope[] $scopes
 * @property SolutionScope[] $solutionScopes
 * @property Solution[] $solutions
 */
class Scope extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'scope';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['scopeName'], 'required'],
            [['parentScopeId'], 'integer'],
            [['scopeName'], 'string', 'max' => 255],
            [['parentScopeId'], 'exist', 'skipOnError' => true, 'targetClass' => Scope::className(), 'targetAttribute' => ['parentScopeId' => 'scopeId']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'scopeId' => 'Scope ID',
            'scopeName' => 'Scope Name',
            'parentScopeId' => 'Parent Scope ID',
        ];
    }

    /**
     * Gets query for [[ApplicationForms]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getApplicationForms()
    {
        return $this->hasMany(ApplicationForm::className(), ['scopeId' => 'scopeId']);
    }

    /**
     * Gets query for [[CallScopes]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCallScopes()
    {
        return $this->hasMany(CallScope::className(), ['scopeId' => 'scopeId']);
    }

    /**
     * Gets query for [[Calls]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCalls()
    {
        return $this->hasMany(Call::className(), ['callId' => 'callId'])->viaTable('callScope', ['scopeId' => 'scopeId']);
    }

    /**
     * Gets query for [[ParentScope]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getParentScope()
    {
        return $this->hasOne(Scope::className(), ['scopeId' => 'parentScopeId']);
    }

    /**
     * Gets query for [[Scopes]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getScopes()
    {
        return $this->hasMany(Scope::className(), ['parentScopeId' => 'scopeId']);
    }

    /**
     * Gets query for [[SolutionScopes]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSolutionScopes()
    {
        return $this->hasMany(SolutionScope::className(), ['scopeId' => 'scopeId']);
    }

    /**
     * Gets query for [[Solutions]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSolutions()
    {
        return $this->hasMany(Solution::className(), ['solutionId' => 'solutionId'])->viaTable('solutionScope', ['scopeId' => 'scopeId']);
    }
}
