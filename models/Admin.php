<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "admin".
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property string $phone_number
 * @property string $account_status
 * @property string $password
 * @property int $profile_id
 *
 * @property Profile $profile
 */
class Admin extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'admin';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'email', 'phone_number', 'password', 'profile_id'], 'required'],
            [['profile_id'], 'integer'],
            [['name', 'email', 'phone_number', 'account_status', 'password'], 'string', 'max' => 255],
            [['email'], 'unique'],
            [['profile_id'], 'exist', 'skipOnError' => true, 'targetClass' => Profile::class, 'targetAttribute' => ['profile_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'email' => 'Email',
            'phone_number' => 'Phone Number',
            'account_status' => 'Account Status',
            'password' => 'Password',
            'profile_id' => 'Profile ID',
        ];
    }

    /**
     * Gets query for [[Profile]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProfile()
    {
        return $this->hasOne(Profile::class, ['id' => 'profile_id']);
    }
}
