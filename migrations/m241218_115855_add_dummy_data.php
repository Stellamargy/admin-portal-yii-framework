<?php

use yii\db\Migration;

/**
 * Class m241218_115855_add_dummy_data
 */
class m241218_115855_add_dummy_data extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {

        // Seed the profile table
        $this->batchInsert('profile', ['id', 'name'], [
            [1, 'Super Admin'],
            [2, 'Manager'],
            [3, 'Viewer'],
        ]);

        // Seed the role table
        $this->batchInsert('role', ['id', 'role_name', 'description'], [
            [1, 'Create_Admin', 'Add admin account.'],
            [2, 'Update_Admin', 'Edit admin details.'],
            [3, 'Delete_Admin', 'Delete admin acount.'],
            [4, 'View_Admin', 'View Admin Details'],
            [5, 'Activate_Admin_Acc', 'Activate Admin Account'],
            [6, 'Inactivate_Admin_Acc', 'Inactivate Admin Account'],
        ]);

       

        // Seed the group_role table (pivot table)
        $this->batchInsert('profile_role', ['profile_id', 'role_id'], [
            [1, 1], 
            [1, 2], 
            [1, 3], 
            [1, 4],
            [1, 5],
            [1, 6],
            [2,2],
            [2,4],
            [3,4]

        ]);

        // Seed the admin table
        $this->batchInsert('admin', ['id', 'name', 'email', 'phone_number', 'account_status', 'password', 'profile_id'], [
            [1, 'John Doe', 'johndoe@example.com', '123456789', 'active', Yii::$app->security->generatePasswordHash('password123'), 1],
            [2, 'Jane Smith', 'janesmith@example.com', '987654321', 'active', Yii::$app->security->generatePasswordHash('password456'), 2],
            [3, 'Bob Johnson', 'bobjohnson@example.com', '555555555', 'active', Yii::$app->security->generatePasswordHash('password789'), 3],
            [4, 'Stella Margy', 'stellamargy@example.com', '77777777', 'inactive', Yii::$app->security->generatePasswordHash('password789'), 3],
        ]);

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m241218_115855_add_dummy_data cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m241218_115855_add_dummy_data cannot be reverted.\n";

        return false;
    }
    */
}
