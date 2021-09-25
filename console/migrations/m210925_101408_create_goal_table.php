<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%goal}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%match}}`
 * - `{{%team}}`
 */
class m210925_101408_create_goal_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%goal}}', [
            'id' => $this->primaryKey(),
            'match' => $this->integer()->notNull()->comment('Встреча'),
            'team' => $this->integer()->notNull()->comment('Команда'),
            'minute' => $this->tinyInteger()->comment('Минута встречи'),
            'note' => $this->text()->comment('Примечания'),
        ]);

        // creates index for column `match`
        $this->createIndex(
            '{{%idx-goal-match}}',
            '{{%goal}}',
            'match'
        );

        // add foreign key for table `{{%match}}`
        $this->addForeignKey(
            '{{%fk-goal-match}}',
            '{{%goal}}',
            'match',
            '{{%match}}',
            'id',
            'CASCADE'
        );

        // creates index for column `team`
        $this->createIndex(
            '{{%idx-goal-team}}',
            '{{%goal}}',
            'team'
        );

        // add foreign key for table `{{%team}}`
        $this->addForeignKey(
            '{{%fk-goal-team}}',
            '{{%goal}}',
            'team',
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
        // drops foreign key for table `{{%match}}`
        $this->dropForeignKey(
            '{{%fk-goal-match}}',
            '{{%goal}}'
        );

        // drops index for column `match`
        $this->dropIndex(
            '{{%idx-goal-match}}',
            '{{%goal}}'
        );

        // drops foreign key for table `{{%team}}`
        $this->dropForeignKey(
            '{{%fk-goal-team}}',
            '{{%goal}}'
        );

        // drops index for column `team`
        $this->dropIndex(
            '{{%idx-goal-team}}',
            '{{%goal}}'
        );

        $this->dropTable('{{%goal}}');
    }
}
