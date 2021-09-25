<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "match".
 *
 * @property int $id
 * @property string|null $date Дата и время проведения
 * @property string|null $note Примечания
 * @property int $home_team Принимающая сторона
 *
 * @property Goal[] $goals
 * @property Team $homeTeam
 * @property MatchTeam[] $matchTeams
 * @property Team[] $teams
 */
class Match extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'match';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['date'], 'safe'],
            [['note'], 'string'],
            [['home_team'], 'required'],
            [['home_team'], 'integer'],
            [['home_team'], 'exist', 'skipOnError' => true, 'targetClass' => Team::class, 'targetAttribute' => ['home_team' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'date' => 'Дата и время проведения',
            'note' => 'Примечания',
            'home_team' => 'Принимающая сторона',
        ];
    }

    /**
     * Gets query for [[Goals]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getGoals()
    {
        return $this->hasMany(Goal::class, ['match' => 'id']);
    }

    /**
     * Gets query for [[HomeTeam]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getHomeTeam()
    {
        return $this->hasOne(Team::class, ['id' => 'home_team']);
    }

    /**
     * Gets query for [[MatchTeams]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getMatchTeams()
    {
        return $this->hasMany(MatchTeam::class, ['match_id' => 'id']);
    }

    /**
     * Gets query for [[Teams]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTeams()
    {
        return $this->hasMany(Team::class, ['id' => 'team_id'])->viaTable('match_team', ['match_id' => 'id']);
    }
}
