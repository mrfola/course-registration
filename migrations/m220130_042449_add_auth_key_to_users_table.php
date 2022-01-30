<?php

use yii\db\Migration;

/**
 * Class m220130_042449_add_auth_key_to_users_table
 */
class m220130_042449_add_auth_key_to_users_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        return $this->addColumn('users', 'auth_key', $this->string(100));
        
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {

        return $this->dropColumn('users', 'auth_key');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m220130_042449_add_auth_key_to_users_table cannot be reverted.\n";

        return false;
    }
    */
}
