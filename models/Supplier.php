<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "supplier".
 *
 * @property int $supplierId
 * @property string $legalName
 * @property int $taxpayerNumber
 * @property string|null $brandName
 * @property string|null $e-mail
 * @property string|null $phone
 * @property string|null $website
 * @property int|null $cityId
 *
 * @property ApplicationForm[] $applicationForms
 * @property Solution[] $solutions
 * @property City $city
 */
class Supplier extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'supplier';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['legalName', 'taxpayerNumber'], 'required'],
            [['taxpayerNumber', 'cityId'], 'integer'],
            [['legalName', 'brandName', 'e-mail', 'website'], 'string', 'max' => 255],
            [['phone'], 'string', 'max' => 30],
            [['taxpayerNumber'], 'unique'],
            [['cityId'], 'exist', 'skipOnError' => true, 'targetClass' => City::className(), 'targetAttribute' => ['cityId' => 'cityId']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'supplierId' => 'Supplier ID',
            'legalName' => 'Legal Name',
            'taxpayerNumber' => 'Taxpayer Number',
            'brandName' => 'Brand Name',
            'e-mail' => 'E Mail',
            'phone' => 'Phone',
            'website' => 'Website',
            'cityId' => 'City ID',
        ];
    }

    /**
     * Gets query for [[ApplicationForms]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getApplicationForms()
    {
        return $this->hasMany(ApplicationForm::className(), ['taxpayerNumber' => 'taxpayerNumber']);
    }

    /**
     * Gets query for [[Solutions]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSolutions()
    {
        return $this->hasMany(Solution::className(), ['supplierId' => 'supplierId']);
    }

    /**
     * Gets query for [[City]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCity()
    {
        return $this->hasOne(City::className(), ['cityId' => 'cityId']);
    }
}
