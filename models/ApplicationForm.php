<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "applicationForm".
 *
 * @property int $applicationId
 * @property string $name
 * @property int $taxpayerNumber
 * @property string $e-mail
 * @property string $website
 * @property string $solutionName
 * @property string $description
 * @property int $personalDataConsent
 * @property int $termsAccept
 * @property string $timestamp
 * @property int|null $scopeId
 * @property int|null $callId
 *
 * @property Scope $scope
 * @property Call $call
 * @property Supplier $taxpayerNumber0
 */
class ApplicationForm extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'applicationForm';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'taxpayerNumber', 'e-mail', 'website', 'solutionName', 'description', 'personalDataConsent', 'termsAccept'], 'required'],
            [['taxpayerNumber', 'personalDataConsent', 'termsAccept', 'scopeId', 'callId'], 'integer'],
            [['description'], 'string'],
            [['timestamp'], 'safe'],
            [['name', 'e-mail', 'website', 'solutionName'], 'string', 'max' => 255],
            [['scopeId'], 'exist', 'skipOnError' => true, 'targetClass' => Scope::className(), 'targetAttribute' => ['scopeId' => 'scopeId']],
            [['callId'], 'exist', 'skipOnError' => true, 'targetClass' => Call::className(), 'targetAttribute' => ['callId' => 'callId']],
            [['taxpayerNumber'], 'exist', 'skipOnError' => true, 'targetClass' => Supplier::className(), 'targetAttribute' => ['taxpayerNumber' => 'taxpayerNumber']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'applicationId' => 'Application ID',
            'name' => 'Name',
            'taxpayerNumber' => 'Taxpayer Number',
            'e-mail' => 'E Mail',
            'website' => 'Website',
            'solutionName' => 'Solution Name',
            'description' => 'Description',
            'personalDataConsent' => 'Personal Data Consent',
            'termsAccept' => 'Terms Accept',
            'timestamp' => 'Timestamp',
            'scopeId' => 'Scope ID',
            'callId' => 'Call ID',
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
     * Gets query for [[Call]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCall()
    {
        return $this->hasOne(Call::className(), ['callId' => 'callId']);
    }

    /**
     * Gets query for [[TaxpayerNumber0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTaxpayerNumber0()
    {
        return $this->hasOne(Supplier::className(), ['taxpayerNumber' => 'taxpayerNumber']);
    }
}
