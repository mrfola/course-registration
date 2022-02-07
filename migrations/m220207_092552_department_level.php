<?php

use yii\db\Migration;

/**
 * Class m220207_092552_department_level
 */
class m220207_092552_department_level extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $tableName = "department_levels";

        $this->createTable('{{%department_levels}}', [
            'id' => $this->primaryKey(),
            'department_id' => $this->integer(),
            'level_id' => $this->integer(),
            'created_at' => $this->date()->defaultValue(Date('Y-m-d H:i:s')),
            'updated_at' => $this->date()->defaultValue(Date('Y-m-d H:i:s')),

        ]);

        //foreign keys
        $this->addForeignKey ('FK_department_levels_to_departments', $tableName, 'department_id', 'departments', 'id', 'CASCADE', 'CASCADE');
        $this->addForeignKey ('FK_department_levels_to_levels', $tableName, 'level_id', 'levels', 'id', 'CASCADE', 'CASCADE');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%user_courses}}');

    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m220207_092552_department_level cannot be reverted.\n";

        return false;
    }
    */
}
