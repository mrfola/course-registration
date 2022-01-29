<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%faculties}}`.
 */
class m220129_063633_create_faculties_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%faculties}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(100)->notNull(),
            'created_at' => $this->date()->defaultValue(Date('Y-m-d H:i:s')),
            'updated_at' => $this->date()->defaultValue(Date('Y-m-d H:i:s')),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%faculties}}');
    }
}
