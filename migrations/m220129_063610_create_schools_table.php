<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%schools}}`.
 */
class m220129_063610_create_schools_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%schools}}', [
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
        $this->dropTable('{{%schools}}');
    }
}
