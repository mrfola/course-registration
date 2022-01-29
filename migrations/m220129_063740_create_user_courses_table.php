<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%user_courses}}`.
 */
class m220129_063740_create_user_courses_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $tableName = 'user_courses';

        $this->createTable('{{%user_courses}}', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer(),
            'course_id' => $this->integer(),
            'created_at' => $this->date()->defaultValue(Date('Y-m-d H:i:s')),
            'updated_at' => $this->date()->defaultValue(Date('Y-m-d H:i:s')),

        ]);

        //foreign keys
        $this->addForeignKey ('FK_user_courses_to_users', $tableName, 'user_id', 'users', 'id', 'CASCADE', 'CASCADE');
        $this->addForeignKey ('FK_user_courses_to_courses', $tableName, 'course_id', 'courses', 'id', 'CASCADE', 'CASCADE');



    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%user_courses}}');
    }
}
