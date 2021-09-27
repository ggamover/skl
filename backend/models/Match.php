<?php


namespace backend\models;


use common\models\MatchTeam;
use common\models\Team;

class Match extends \common\models\Match
{
    public $day;
    public $time;
    public $homeTeam;
    public $guestTeam;
    public $homeScore;
    public $guestScore;

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['date', 'day', 'time'], 'safe'],
            [['note'], 'string'],
            [['day', 'time', 'homeTeam', 'guestTeam'], 'required'],
            [['homeTeam', 'guestTeam', 'homeScore', 'guestScore'], 'integer'],
            [['homeTeam'], 'exist', 'skipOnError' => true,
                'targetClass' => Team::class, 'targetAttribute' => ['homeTeam' => 'id']],
            [['guestTeam'], 'exist', 'skipOnError' => true,
                'targetClass' => Team::class, 'targetAttribute' => ['guestTeam' => 'id']],
        ];
    }

    public function attributeLabels ()
    {
        return [
            'date' => 'Дата',
            'day' => 'День',
            'time' => 'Время',
            'homeTeam' => 'Хозяева',
            'guestTeam' => 'Гости',
            'note' => 'Примечания'
        ];
    }

    public function beforeSave ($insert)
    {
        $dto = \DateTime::createFromFormat('Y-m-d H:i', $this->day . ' ' . $this->time);
        $this->date = $dto->format('Y-m-d H:i:s');
        return parent::beforeSave($insert);
    }


    public function afterSave ($insert, $changedAttributes)
    {
        parent::afterSave($insert, $changedAttributes);

        if(!$insert){
            $this->unlinkAll('teams', true);
        }

        $homeTeam = new MatchTeam;
        $homeTeam->home_team = 1;
        $homeTeam->team_id = $this->homeTeam;
        $homeTeam->score = $this->homeScore;
        $this->link('matchTeams', $homeTeam);

        $guestTeam = new MatchTeam;
        $guestTeam->team_id = $this->guestTeam;
        $guestTeam->score = $this->guestScore;
        $this->link('matchTeams', $guestTeam);

    }

    public function teamsByHome()
    {
        $teams = [1 => '', 2 => ''];
        foreach ($this->matchTeams as $mt){
            $teams[($mt->home_team ? 1 : 2)] = $mt->team->name;
        }
        return $teams;
    }

    public function scoreByHome()
    {
        $teams = [1 => '', 2 => ''];
        foreach ($this->matchTeams as $mt){
            $teams[($mt->home_team ? 1 : 2)] = $mt->score;
        }
        return $teams;
    }

}
