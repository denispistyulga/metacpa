<?php

use yii\db\Migration;

/**
 * Handles the creation of table `metacpa`.
 */
class m200914_042136_create_metacpa_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%metacpa}}', [
            'id' => $this->primaryKey(),
            'campaign_name' => $this->string(100)->null(),
            'clicks' => $this->string(30)->null(),
            'leads' => $this->string(30)->null(),
            'conversion_rate' => $this->string(30)->null(),
            'id_compain' => $this->string(30)->null()

        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%metacpa}}');
    }
}
