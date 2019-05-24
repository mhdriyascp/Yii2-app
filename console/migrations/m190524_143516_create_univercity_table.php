<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%univercity}}`.
 */
class m190524_143516_create_univercity_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%univercity}}', [
            'univercity_id' => $this->primaryKey(),
            'univercity_name'=>$this->string()->notNull()->unique(),
            'univercity_description'=>$this->text(),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
            'status' => $this->smallInteger()->notNull()->defaultValue(1),

        ]);

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%univercity}}');
    }
}
