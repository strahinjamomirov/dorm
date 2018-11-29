<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "dorm".
 *
 * @property int $id
 * @property int $name
 *
 * @property ChangingDorm[] $changingDorms
 * @property ChangingDorm[] $changingDorms0
 */
class Dorm extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'dorm';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['name'], 'string', 'max' => 64],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getChangingDorms()
    {
        return $this->hasMany(ChangingDorm::className(), ['changing_from' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getChangingDorms0()
    {
        return $this->hasMany(ChangingDorm::className(), ['changing_to' => 'id']);
    }
}
