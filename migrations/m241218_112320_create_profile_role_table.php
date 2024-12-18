<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%profile_role}}`.
 */
class m241218_112320_create_profile_role_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
       
            $this->createTable('profile_role', [
                'profile_id' => $this->integer()->notNull(),
                'role_id' => $this->integer()->notNull(),
            ]);
    
            // Add composite primary key
            $this->addPrimaryKey('pk_profile_role', 'profile_role', ['profile_id', 'role_id']);
    
            // Add foreign keys
            $this->addForeignKey(
                'fk_profile_role_profile_id',
                'profile_role',
                'profile_id',
                'profile',
                'id',
                'CASCADE'
            );
    
            $this->addForeignKey(
                'fk_profile_role_role_id',
                'profile_role',
                'role_id',
                'role',
                'id',
                'CASCADE'
            );
       
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
      // Drop foreign keys
      $this->dropForeignKey('fk_profile_role_profile_id', 'profile_role');
      $this->dropForeignKey('fk_profile_role_role_id', 'profile_role');

      // Drop primary key
      $this->dropPrimaryKey('pk_profile_role', 'profile_role');

      $this->dropTable('profile_role');
    }
}
