<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "goal".
 *
 * @property int $id
 * @property int $match Встреча
 * @property int $team Команда
 * @property int|null $minute Минута встречи
 * @property string|null $note Примечания
 *
 * @property Match $match0
 * @property Team $team0
 */
class Goal extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'goal';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['match', 'team'], 'required'],
            [['match', 'team', 'minute'], 'integer'],
            [['note'], 'string'],
            [['match'], 'exist', 'skipOnError' => true, 'targetClass' => Match::class, 'targetAttribute' => ['match' => 'id']],
            [['team'], 'exist', 'skipOnError' => true, 'targetClass' => Team::class, 'targetAttribute' => ['team' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'match' => 'Встреча',
            'team' => 'Команда',
            'minute' => 'Минута встречи',
            'note' => 'Примечания',
        ];
    }

    /**
     * Gets query for [[Match0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getMatch0()
    {
        return $this->hasOne(Match::class, ['id' => 'match']);
    }

    /**
     * Gets query for [[Team0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTeam0()
    {
        return $this->hasOne(Team::class, ['id' => 'team']);
    }
}
