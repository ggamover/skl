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
        $this->batchInsert('team', ['name', 'location', 'logo'], [
            ['Зенит', null, 'Санкт-Петербург'],
            ['Спартак', null, 'Москва'],
            ['Рубин', null, 'Казань'],
            ['Локомотоив', null, 'Москва'],
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->delete('team');
    }


}
