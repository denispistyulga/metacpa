<?php

namespace common\models\admin\technical;

use Yii;

/**
 * This is the model class for table "wp_metacpa".
 *
 * @property int $id
 * @property string $campaign_name
 * @property string $clicks
 * @property string $leads
 * @property string $conversion_rate
 * @property string $id_compain
 */
class Metacpa extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%metacpa}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['campaign_name'], 'string', 'max' => 100],
            [['clicks', 'leads', 'conversion_rate', 'id_compain'], 'string', 'max' => 30],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'campaign_name' => 'Компания',
            'clicks' => 'Клики',
            'leads' => 'Лиды',
            'conversion_rate' => 'Конверсия',
            'id_compain' => 'ID компании',
        ];
    }

    /**
     * {@inheritdoc}
     * @return MetacpaQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new MetacpaQuery(get_called_class());
    }
}
