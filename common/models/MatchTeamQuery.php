<?php

namespace common\models;

/**
 * This is the ActiveQuery class for [[MatchTeam]].
 *
 * @see MatchTeam
 */
class MatchTeamQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return MatchTeam[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return MatchTeam|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
