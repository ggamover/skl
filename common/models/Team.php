<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "team".
 *
 * @property int $id
 * @property string|null $name Наименование
 * @property string|null $logo Логотип
 * @property string|null $location Город
 * @property string|null $description Описание
 *
 * @property Goal[] $goals
 * @property MatchTeam[] $matchTeams
 * @property Match[] $matches
 */
class Team extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'team';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['description'], 'string'],
            [['name', 'logo', 'location'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Наименование',
            'logo' => 'Логотип',
            'location' => 'Город',
            'description' => 'Описание',
        ];
    }

    /**
     * Gets query for [[Goals]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getGoals()
    {
        return $this->hasMany(Goal::class, ['team' => 'id']);
    }

    /**
     * Gets query for [[MatchTeams]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getMatchTeams()
    {
        return $this->hasMany(MatchTeam::class, ['team_id' => 'id']);
    }

    /**
     * Gets query for [[Matches]].
     *
     * @return \yii\db\ActiveQuery
     */
    /*public function getMatches()
    {
        return $this->hasMany(Match::class, ['home_team' => 'id']);
    }*/

    /**
     * Gets query for [[Matches]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getMatches()
    {
        return $this->hasMany(Match::class, ['id' => 'match_id'])
            ->viaTable('match_team', ['team_id' => 'id']);
    }
}
