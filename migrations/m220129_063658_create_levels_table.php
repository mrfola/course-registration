<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%levels}}`.
 */
class m220129_063658_create_levels_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%levels}}', [
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
        $this->dropTable('{{%levels}}');
    }
}
