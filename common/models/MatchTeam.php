<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "match_team".
 *
 * @property int $match_id
 * @property int $team_id
 *
 * @property Match $match
 * @property Team $team
 */
class MatchTeam extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'match_team';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['match_id', 'team_id'], 'required'],
            [['match_id', 'team_id'], 'integer'],
            [['match_id', 'team_id'], 'unique', 'targetAttribute' => ['match_id', 'team_id']],
            [['match_id'], 'exist', 'skipOnError' => true, 'targetClass' => Match::class, 'targetAttribute' => ['match_id' => 'id']],
            [['team_id'], 'exist', 'skipOnError' => true, 'targetClass' => Team::class, 'targetAttribute' => ['team_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'match_id' => 'Match ID',
            'team_id' => 'Team ID',
        ];
    }

    /**
     * Gets query for [[Match]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getMatch()
    {
        return $this->hasOne(Match::class, ['id' => 'match_id']);
    }

    /**
     * Gets query for [[Team]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTeam()
    {
        return $this->hasOne(Team::class, ['id' => 'team_id']);
    }
}
