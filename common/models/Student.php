<?php

namespace common\models;

use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "student".
 *
 * @property integer $id
 * @property string  $password_hash
 * @property string  $email
 * @property string  $auth_key
 * @property string  $gravatar_id
 * @property string  $created_at
 * @property string  $updated_at
 *
 */
class Student extends UserIdentity
{
    public $password;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'student';
    }

    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            TimestampBehavior::className(),
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [
                [
                    'email'
                ],
                'required'
            ],
            [['password'], 'required', 'on' => 'create'],
            [['created_at', 'updated_at'], 'safe'],
            [
                ['email', 'password'],
                'string',
                'max' => 255
            ],
            [['password_hash'], 'string', 'max' => 60],
            [['gravatar_id'], 'string', 'max' => 60],
            [['auth_key'], 'string', 'max' => 32],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id'                   => 'ID',
            'password'             => 'Password',
            'password_hash'        => 'Password Hash',
            'email'                => 'Email',
            'auth_key'             => 'Auth Key',
            'password_reset_token' => 'Password Reset Token',
            'created_at'           => 'Created At',
            'updated_at'           => 'Updated At',
        ];
    }

}
