<?php


namespace backend\models;


use common\models\Team;

class Match extends \common\models\Match
{
    public $day;
    public $time;
    public $homeTeam;
    public $guestTeam;

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['date', 'day', 'time'], 'safe'],
            [['note'], 'string'],
            [['day', 'time', 'home_team'], 'required'],
            [['homeTeam', 'guestTeam'], 'integer'],
            [['homeTeam'], 'exist', 'skipOnError' => true,
                'targetClass' => Team::class, 'targetAttribute' => ['homeTeam' => 'id']],
            [['guestTeam'], 'exist', 'skipOnError' => true,
                'targetClass' => Team::class, 'targetAttribute' => ['guestTeam' => 'id']],
        ];
    }


}