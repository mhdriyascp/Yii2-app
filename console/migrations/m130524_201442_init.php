<?php

use yii\db\Migration;

class m130524_201442_init extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%user}}', [
            'id' => $this->primaryKey(),
            'user_type'=>$this->integer()->notNull(),
            'username' => $this->string()->notNull()->unique(),
            'first_name'=>$this->string(100)->Null(),
            'last_name'=>$this->string(100)->Null(),
            'univercity_join_id'=>$this->integer()->Null()->unique(),
            'auth_key' => $this->string(32)->notNull(),
            'password_hash' => $this->string()->notNull(),
            'password_reset_token' => $this->string()->unique(),
            'phone' => $this->string()->notNull()->unique(),
            'email' => $this->string()->notNull()->unique(),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
            'status' => $this->smallInteger()->notNull()->defaultValue(1),
        ], $tableOptions);

        // add foreign key for table `univercity`
        // $this->addForeignKey(
        //     'fk-univercity_id',
        //     'user',
        //     'univercity_id',
        //     'univercity',
        //     'univercity_join_id',
        //     'CASCADE'
        // );
    }

    public function down()
    {
        $this->dropTable('{{%user}}');
    }
}
