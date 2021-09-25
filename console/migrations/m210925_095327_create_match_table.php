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
            'date' => $this->dateTime(),
            'note' => $this->text(),
            'home_team' => $this->integer()->notNull(),
        ]);

        // creates index for column `home_team`
        $this->createIndex(
            '{{%idx-match-home_team}}',
            '{{%match}}',
            'home_team'
        );

        // add foreign key for table `{{%team}}`
        $this->addForeignKey(
            '{{%fk-match-home_team}}',
            '{{%match}}',
            'home_team',
            '{{%team}}',
            'id',
            'CASCADE'
        );

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `{{%team}}`
        $this->dropForeignKey(
            '{{%fk-match-home_team}}',
            '{{%match}}'
        );

        // drops index for column `home_team`
        $this->dropIndex(
            '{{%idx-match-home_team}}',
            '{{%match}}'
        );

        $this->dropTable('{{%match}}');
    }
}
