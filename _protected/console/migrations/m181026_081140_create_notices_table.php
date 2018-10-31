<?php

use yii\db\Migration;

/**
 * Handles the creation of table `notices`.
 */
class m181026_081140_create_notices_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('notices', [
            'id' => $this->primaryKey(),
            'notice_title' => $this->string(255),
            'notice_description' => $this->string(255),
            'status' => $this->integer(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('notices');
    }
}
