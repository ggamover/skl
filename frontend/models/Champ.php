<?php


namespace frontend\models;


use common\models\Team;
use yii\db\Expression;

class Champ
{
    static public function table()
    {
        return Team::find()->alias('t')
            ->select([
                't.name',
                new Expression('COUNT(mt.match_id) AS games'),
                new Expression('SUM(mt.score) AS scored'),
                new Expression('SUM(mt2.score) AS conceded'),
                new Expression('SUM(CASE'
	                    . ' WHEN mt.score > mt2.score THEN 3'
	                    . ' WHEN mt.score < mt2.score THEN 1'
                        . ' ELSE 0 END) AS points')
            ])
            ->leftJoin(['mt' => 'match_team'], 't.id = mt.team_id')
            ->leftJoin(['mt2' => 'match_team'], 'mt.match_id = mt2.match_id AND mt.team_id <> mt2.team_id')
            ->groupBy('t.id')
            ->orderBy([
                'points' => SORT_DESC,
                'scored' => SORT_DESC
            ])
            ->asArray()
            ->all();
    }
}