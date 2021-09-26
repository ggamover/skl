<?php


namespace backend\models;


use common\models\Team;

class Match extends \common\models\Match
{
    public $day;
    public $time;
    
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['date', 'day', 'time'], 'safe'],
            [['note'], 'string'],
            [['day', 'time', 'home_team'], 'required'],
            [['home_team'], 'integer'],
            [['home_team'], 'exist', 'skipOnError' => true,
                'targetClass' => Team::class, 'targetAttribute' => ['home_team' => 'id']],
        ];
    }

}