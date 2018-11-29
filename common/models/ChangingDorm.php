<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "changing_dorm".
 *
 * @property int $id
 * @property int $user_id
 * @property int $gender
 * @property string $fb_link
 * @property int $changing_from
 * @property int $changing_to
 * @property int $category
 * @property int $number_of_beds
 *
 * @property User $user
 * @property Dorm $changingFrom
 * @property Dorm $changingTo
 */
class ChangingDorm extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'changing_dorm';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'gender', 'fb_link', 'changing_from', 'changing_to', 'category', 'number_of_beds'], 'required'],
            [['user_id', 'gender', 'changing_from', 'changing_to', 'category', 'number_of_beds'], 'integer'],
            [['fb_link'], 'string', 'max' => 256],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => Student::className(), 'targetAttribute' => ['user_id' => 'id']],
            [['changing_from'], 'exist', 'skipOnError' => true, 'targetClass' => Dorm::className(), 'targetAttribute' => ['changing_from' => 'id']],
            [['changing_to'], 'exist', 'skipOnError' => true, 'targetClass' => Dorm::className(), 'targetAttribute' => ['changing_to' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'gender' => 'Gender',
            'fb_link' => 'Fb Link',
            'changing_from' => 'Changing From',
            'changing_to' => 'Changing To',
            'category' => 'Category',
            'number_of_beds' => 'Number Of Beds',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getChangingFrom()
    {
        return $this->hasOne(Dorm::className(), ['id' => 'changing_from']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getChangingTo()
    {
        return $this->hasOne(Dorm::className(), ['id' => 'changing_to']);
    }
}
