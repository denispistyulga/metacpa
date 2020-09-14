<?php

namespace common\models\admin\technical;

/**
 * This is the ActiveQuery class for [[Metacpa]].
 *
 * @see Metacpa
 */
class MetacpaQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return Metacpa[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return Metacpa|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
