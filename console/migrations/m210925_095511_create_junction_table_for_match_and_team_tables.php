<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%match_team}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%match}}`
 * - `{{%team}}`
 */
class m210925_095511_create_junction_table_for_match_and_team_tables extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%match_team}}', [
            'match_id' => $this->integer(),
            'team_id' => $this->integer(),
            'PRIMARY KEY(match_id, team_id)',
        ]);

        // creates index for column `match_id`
        $this->createIndex(
            '{{%idx-match_team-match_id}}',
            '{{%match_team}}',
            'match_id'
        );

        // add foreign key for table `{{%match}}`
        $this->addForeignKey(
            '{{%fk-match_team-match_id}}',
            '{{%match_team}}',
            'match_id',
            '{{%match}}',
            'id',
            'CASCADE'
        );

        // creates index for column `team_id`
        $this->createIndex(
            '{{%idx-match_team-team_id}}',
            '{{%match_team}}',
            'team_id'
        );

        // add foreign key for table `{{%team}}`
        $this->addForeignKey(
            '{{%fk-match_team-team_id}}',
            '{{%match_team}}',
            'team_id',
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
            '{{%fk-match_team-match_id}}',
            '{{%match_team}}'
        );

        // drops index for column `match_id`
        $this->dropIndex(
            '{{%idx-match_team-match_id}}',
            '{{%match_team}}'
        );

        // drops foreign key for table `{{%team}}`
        $this->dropForeignKey(
            '{{%fk-match_team-team_id}}',
            '{{%match_team}}'
        );

        // drops index for column `team_id`
        $this->dropIndex(
            '{{%idx-match_team-team_id}}',
            '{{%match_team}}'
        );

        $this->dropTable('{{%match_team}}');
    }
}
