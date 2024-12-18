<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "role".
 *
 * @property int $id
 * @property string $role_name
 * @property string|null $description
 *
 * @property ProfileRole[] $profileRoles
 * @property Profile[] $profiles
 */
class Role extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'role';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['role_name'], 'required'],
            [['description'], 'string'],
            [['role_name'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'role_name' => 'Role Name',
            'description' => 'Description',
        ];
    }

    /**
     * Gets query for [[ProfileRoles]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProfileRoles()
    {
        return $this->hasMany(ProfileRole::class, ['role_id' => 'id']);
    }

    /**
     * Gets query for [[Profiles]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProfiles()
    {
        return $this->hasMany(Profile::class, ['id' => 'profile_id'])->viaTable('profile_role', ['role_id' => 'id']);
    }
}
