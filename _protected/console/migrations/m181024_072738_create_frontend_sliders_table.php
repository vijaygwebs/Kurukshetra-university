<?php

use yii\db\Migration;

/**
 * Handles the creation of table `frontend_sliders`.
 */
class m181024_072738_create_frontend_sliders_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('frontend_sliders', [
            'id' => $this->primaryKey(),
            'slider_name' => $this->string(255),
            'status' => $this->integer(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('frontend_sliders');
    }
}
