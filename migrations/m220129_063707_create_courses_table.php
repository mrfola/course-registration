<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%courses}}`.
 */
class m220129_063707_create_courses_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $tableName = 'courses';

        $this->createTable('{{%courses}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(100)->notNull(),
            'course_code' => $this->string(100)->notNull(),
            'level_id' => $this->integer()->notNull(),
            'department_id' => $this->integer()->notNull(),
            'created_at' => $this->date()->defaultValue(Date('Y-m-d H:i:s')),
            'updated_at' => $this->date()->defaultValue(Date('Y-m-d H:i:s')),
        ]);

        //foreign keys
        $this->addForeignKey('FK_courses_to_level', $tableName, 'level_id', 'levels', 'id', 'CASCADE', 'CASCADE');
        $this->addForeignKey('FK_add_courses_to_department', $tableName, 'department_id', 'departments', 'id', 'CASCADE', 'CASCADE');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%courses}}');
    }
}
