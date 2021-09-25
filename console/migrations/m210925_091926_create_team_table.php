<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%team}}`.
 */
class m210925_091926_create_team_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%team}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(),
            'logo' => $this->string(),
            'location' => $this->string(),
            'description' => $this->text(),
        ]);

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%team}}');
    }
}
