<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%match}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%team}}`
 */
class m210925_095327_create_match_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%match}}', [
            'id' => $this->primaryKey(),
            'date' => $this->dateTime()->notNull()->comment('Дата и время проведения'),
            'note' => $this->text()->comment('Примечания'),
        ]);

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%match}}');
    }
}
