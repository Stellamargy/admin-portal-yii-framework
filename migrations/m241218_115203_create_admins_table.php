<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%admins}}`.
 */
class m241218_115203_create_admins_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('admin', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull(),
            'email' => $this->string()->notNull()->unique(),
            'phone_number' => $this->string()->notNull(),
            'account_status' => $this->string()->notNull()->defaultValue('active'), // Use a string with a default value
            'password' => $this->string()->notNull(),
            'profile_id' => $this->integer()->notNull(),
        ]);
        $this->addForeignKey(
            'fk_admin_group_id', // Foreign key name
            'admin',             // Table with the foreign key
            'profile_id',          // Column in the `admin` table
            'profile',             // Referenced table
            'id',                // Referenced column
            'CASCADE',           // On delete
            'CASCADE'            // On update
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // migration is not reversible
        $this->dropTable('admin'); 
    }
}
