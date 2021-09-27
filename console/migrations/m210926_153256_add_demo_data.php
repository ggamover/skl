<?php

use yii\db\Migration;

/**
 * Class m210926_153256_add_demo_data
 */
class m210926_153256_add_demo_data extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->batchInsert('team', ['id', 'name', 'location', 'logo'], [
             [16,'Зенит',       'Санкт-Петербург',  null],
             [17,'Спартак',     'Москва',           null],
             [18,'Рубин',       'Казань',           null],
             [19,'Локомотив',   'Москва',           null]
        ]);

        $this->batchInsert('match', ['id','date','note'], [
             [5,'2021-09-25 17:30:00.0',''],
             [6,'2021-09-24 15:00:00.0',''],
             [7,'2021-09-01 19:30:00.0',''],
             [8,'2021-09-10 13:00:00.0','']
        ]);

        $this->batchInsert('match_team', ['match_id','team_id','score','home_team'], [
            [5,16,2,1],
            [5,17,0,0],
            [6,18,1,1],
            [6,19,3,0],
            [7,16,1,0],
            [7,18,0,1],
            [8,17,5,1],
            [8,18,1,0]
        ]);

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->delete('match');
        $this->delete('team');
    }


}
