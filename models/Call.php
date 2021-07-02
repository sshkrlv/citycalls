<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "call".
 *
 * @property int $callId
 * @property string $callName
 * @property string $briefDescription
 * @property string $description
 * @property string $createDate
 * @property string|null $videoLink
 * @property string|null $expireDate
 * @property int|null $isArchived
 * @property int $isShowingOnMainPage
 * @property int $sortRank
 * @property string|null $comment
 * @property int|null $customerId
 *
 * @property ApplicationForm[] $applicationForms
 * @property Customer $customer
 * @property CallScope[] $callScopes
 * @property Scope[] $scopes
 * @property CallTechnology[] $callTechnologies
 * @property Technology[] $technologies
 * @property CallTypeofProblem[] $callTypeofProblems
 * @property TypeOfProblem[] $types
 * @property Call[] $relatedCalls
 * @property Review[] $reviews
 * @property SolutionForCall[] $solutionForCalls
 * @property Solution[] $solutions
 */
class Call extends \yii\db\ActiveRecord
{

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'call';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['callName', 'briefDescription', 'description'], 'required'],
            [['briefDescription', 'description', 'comment'], 'string'],
            [['createDate', 'expireDate'], 'safe'],
            [['isArchived', 'isShowingOnMainPage', 'sortRank', 'customerId'], 'integer'],
            [['callName'], 'string', 'max' => 55],
            [['videoLink'], 'string', 'max' => 255],
            [['customerId'], 'exist', 'skipOnError' => true, 'targetClass' => Customer::className(), 'targetAttribute' => ['customerId' => 'customerId']],

        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'callId' => 'Call ID',
            'callName' => 'Call Name',
            'briefDescription' => 'Brief Description',
            'description' => 'Description',
            'createDate' => 'Create Date',
            'videoLink' => 'Video Link',
            'expireDate' => 'Expire Date',
            'isArchived' => 'Is Archived',
            'isShowingOnMainPage' => 'Is Showing On Main Page',
            'sortRank' => 'Sort Rank',
            'comment' => 'Comment',
            'customerId' => 'Customer ID',
        ];
    }

    public function extraFields()
    {
        return ['customer', 'scopes', 'technologies', 'types', 'relatedCalls'];
    }

    /**
     * Gets query for [[ApplicationForms]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getApplicationForms()
    {
        return $this->hasMany(ApplicationForm::className(), ['callId' => 'callId']);
    }

    /**
     * Gets query for [[Customer]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCustomer()
    {
        return $this->hasOne(Customer::className(), ['customerId' => 'customerId']);
    }

    /**
     * Gets query for [[CallScopes]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCallScopes()
    {
        return $this->hasMany(CallScope::className(), ['callId' => 'callId']);
    }

    /**
     * Gets query for [[Scopes]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getScopes()
    {
        return $this->hasMany(Scope::className(), ['scopeId' => 'scopeId'])->viaTable('callScope', ['callId' => 'callId']);
    }

    /**
     * Gets query for [[CallTechnologies]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCallTechnologies()
    {
        return $this->hasMany(CallTechnology::className(), ['callId' => 'callId']);
    }

    /**
     * Gets query for [[Technologies]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTechnologies()
    {
        return $this->hasMany(Technology::className(), ['technologyId' => 'technologyId'])->viaTable('callTechnology', ['callId' => 'callId']);
    }

    /**
     * Gets query for [[CallTypeofProblems]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCallTypeofProblems()
    {
        return $this->hasMany(CallTypeofProblem::className(), ['callId' => 'callId']);
    }

    /**
     * Gets query for [[Types]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTypes()
    {
        return $this->hasMany(TypeOfProblem::className(), ['typeId' => 'typeId'])->viaTable('callTypeofProblem', ['callId' => 'callId']);
    }

    /**
     * Gets query for [[RelatedCalls]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRelatedCalls()
    {
        return $this->hasMany(Call::className(), ['callId' => 'relatedCallId'])->viaTable('relatedCalls', ['callId' => 'callId']);
    }

    /**
     * Gets query for [[Reviews]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getReviews()
    {
        return $this->hasMany(Review::className(), ['callId' => 'callId']);
    }

    /**
     * Gets query for [[SolutionForCalls]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSolutionForCalls()
    {
        return $this->hasMany(SolutionForCall::className(), ['callId' => 'callId']);
    }

    /**
     * Gets query for [[Solutions]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSolutions()
    {
        return $this->hasMany(Solution::className(), ['solutionId' => 'solutionId'])->viaTable('solutionForCall', ['callId' => 'callId']);
    }
}
