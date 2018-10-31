<?php

use yii\db\Migration;

/**
 * Handles the creation of table `designations`.
 */
class m181029_070520_create_designations_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('designations', [
            'id' => $this->primaryKey(),
            'designation_name' => $this->string(255),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('designations');
    }
}
