<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%users}}`.
 */
class m220129_063731_create_users_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {

        $tableName = 'users';

        $this->createTable('{{%users}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(100)->notNull(),
            'email' => $this->string(100)->notNull(),
            'password' => $this->string(100)->notNull(),
            'level_id' => $this->integer()->notNull(),
            'department_id' => $this->integer()->notNull(),
            'school_id' => $this->integer()->notNull(),
            'created_at' => $this->date()->defaultValue(Date('Y-m-d H:i:s')),
            'updated_at' => $this->date()->defaultValue(Date('Y-m-d H:i:s')),
        ]);

        //add foreign keys
        $this->addForeignKey ('FK_users_to_level', $tableName, 'level_id', 'levels', 'id', 'CASCADE', 'CASCADE');
        $this->addForeignKey ('FK_users_to_department', $tableName, 'department_id', 'departments', 'id', 'CASCADE', 'CASCADE');
        $this->addForeignKey ('FK_users_to_school', $tableName, 'school_id', 'schools', 'id', 'CASCADE', 'CASCADE');

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%users}}');
    }
}
