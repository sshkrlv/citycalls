<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "typeofSolution".
 *
 * @property int $typeId
 * @property string $name
 *
 * @property Solution[] $solutions
 */
class TypeofSolution extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'typeofSolution';
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
     * Gets query for [[Solutions]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSolutions()
    {
        return $this->hasMany(Solution::className(), ['typeId' => 'typeId']);
    }
}
