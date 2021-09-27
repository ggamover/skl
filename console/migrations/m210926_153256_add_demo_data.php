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
            ['Зенит', 'Санкт-Петербург',    null],
            ['Спартак', 'Москва',           null],
            ['Рубин', 'Казань',             null],
            ['Локомотив', 'Москва',         null],
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
